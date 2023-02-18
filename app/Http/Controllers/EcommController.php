<?php

namespace App\Http\Controllers;

use App\Exceptions\DuplicateEntry;
use App\Mail\SendOrderMail;
use App\Models\Cart;
use App\Models\Company;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Social;
use App\Models\UserDetail;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class EcommController extends Controller
{
    public function showQuranStore()
    {
        $company = Company::first();
        $social = Social::get();
        $products = Product::get();
        $img = ProductImage::get();
        $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        $cartItems = Cart::join('products', 'carts.product_id', '=', 'products.id')->select('*', 'carts.id as cart_id')->where('carts.user_id', Auth::user()->id)->get();

        $pimage = [];
        foreach ($img as $image) {
            if (!isset($pimage[$image->pid]))
                $pimage[$image->pid] = $image->image;
        }

        return view('pages.ecomm.shop', compact('products', 'pimage', 'cartCount', 'cartItems', 'company','social'));
    }

    public function showSingleProduct($id)
    {
        $company = Company::first();
        $social = Social::get();
        $id = Crypt::decrypt($id);
        $product = Product::find($id);
        $images = ProductImage::where('pid', $id)->get();
        $related_products = Product::get();
        $img = ProductImage::get();
        $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        $cartItems = Cart::join('products', 'carts.product_id', '=', 'products.id')->select('*', 'carts.id as cart_id')->where('carts.user_id', Auth::user()->id)->get();

        $pimage = [];
        foreach ($img as $image) {
            if (!isset($pimage[$image->pid]))
                $pimage[$image->pid] = $image->image;
        }

        return view('pages.ecomm.shopDetail', compact('product', 'images', 'related_products', 'pimage', 'cartCount', 'cartItems','company','social'));
    }

    public function removeCartItems($id)
    {
        $cart = Cart::find($id);
        if ($cart->delete())
            return back();
        else
            return back();
    }

    public function changeQuantity(Request $request)
    {
        $c = count($request->cid);
        $quan = $request->quantity;
        $cid = $request->cid;

        for ($i = 0; $i < $c; $i++) {
            $cart = Cart::find($cid[$i]);
            $cart->quantity = $quan[$i];
            //$quan = $request->quantity;
            if ($cart->save())
                echo "Product Quantity Updated";
            else
                echo "Error Occured";
        }
        // if ($cart->save())
        //     return response()->json(['success' => "Quantity Updated Successfully"]);
        // else
        //     return response()->json(['error' => "Some Error Occured"]);
    }

    public function viewCart()
    {
        $company = Company::first();
        $social = Social::get();
        $img = ProductImage::get();
        $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        $cartItems = Cart::join('products', 'carts.product_id', '=', 'products.id')->select('*', 'carts.id as cart_id')->where('carts.user_id', Auth::user()->id)->get();

        $pimage = [];
        foreach ($img as $image) {
            if (!isset($pimage[$image->pid]))
                $pimage[$image->pid] = $image->image;
        }

        return view('pages.ecomm.cart', compact('pimage', 'cartCount', 'cartItems', 'company','social'));
    }

    public function viewCheckout()
    {
        $company = Company::first();
        $social = Social::get();
        $img = ProductImage::get();
        $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        $cartItems = Cart::join('products', 'carts.product_id', '=', 'products.id')->select('*', 'carts.id as cart_id')->where('carts.user_id', Auth::user()->id)->get();

        $pimage = [];
        foreach ($img as $image) {
            if (!isset($pimage[$image->pid]))
                $pimage[$image->pid] = $image->image;
        }

        return view('pages.ecomm.checkout', compact('pimage', 'cartCount', 'cartItems','company','social'));
    }

    public function AddToCart(Request $request)
    {
        try {
            $add = new Cart();

            $add->product_id = $request->pid;
            $add->user_id = $request->user_id;
            $add->quantity = $request->quantity;

            if ($add->save())
                return back()->with(['success' => 'Product Added To Cart Successfully']);
            else
                return back()->with(['error' => 'Some Error Occured']);
        } catch (\Exception $e) {
            throw new DuplicateEntry();
        }
    }

    public function placeOrder(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        //date("Ymdhis").1;
        $details = UserDetail::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'first_name' => $request->billing_first_name, 'last_name' => $request->billing_last_name,
                'phone' => $request->billing_phone, 'email' => $request->billing_email,
                'add1' => $request->billing_address_1, 'add2' => $request->billing_address_2,
                'city' => $request->billing_city, 'postal' => $request->billing_postcode
            ]
        );
        $date = new DateTime();

        // $details->user_id = Auth::user()->id;
        // $details->first_name = $request->billing_first_name;
        // $details->last_name = $request->billing_last_name;
        // $details->phone = $request->billing_phone;
        // $details->email = $request->billing_email;
        // $details->add1 = $request->billing_address_1;
        // $details->add2 = $request->billing_address_2;
        // $details->city = $request->billing_city;
        // $details->postal = $request->billing_postcode;

        $c = count($request->pid);
        $pid = $request->pid;
        $quan = $request->quantity;
        $price = $request->price;
        $cart_id = $request->cart_id;

        $oid = $date->format("Ymdhis");

        $order = new Order();

        $order->order_date = $date;
        $order->payment_mode = $request->payment_method;
        if ($request->payment_id)
            $order->payment_id = $request->payment_id;
        $order->order_no = $oid;
        $order->total = $request->total_amount;
        $order->status = "Confirmed";
        $order->user_id = Auth::user()->id;
        $order->save();

        for ($i = 0; $i < $c; $i++) {
            $order_details = new OrderDetail();
            $order_details->product_id = $pid[$i];
            $order_details->quantity = $quan[$i];
            $order_details->price = $price[$i];
            $order_details->order_id = $order->id;
            $stat = $order_details->save();

            $cart = Cart::find($cart_id[$i]);
            $cart->delete();
        }
        if ($stat) {
            $link = 'OrderReceived/order_no=' . Crypt::encrypt($order->id);
            Mail::to($request->billing_email)->send(new SendOrderMail($order->id));
            return response()->json(['success' => "Order Placed Successfully", 'type' => 'success', 'order_id' => $order->id, 'link' => $link]);
            //return redirect('OrderReceived/order_no='.Crypt::encrypt($order->id)); //return response()->json(['success' => "Order Placed Successfully", 'id' => $order->id]);
        } else
            return response()->json(['error' => "Error Occured"]);
    }

    public function orderReceived($id)
    {
        $company = Company::first();
        $id = Crypt::decrypt($id);
        $orders = Order::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $user_details = UserDetail::where('user_id', Auth::user()->id)->first();
        $cartCount = Cart::where('user_id', Auth::user()->id)->count();

        return view('pages.ecomm.order_received', compact('orders', 'cartCount', 'user_details','company','social'));
    }

    public function showProducts()
    {
        $products = Product::get();
        $i = 1;

        return view('backend.pages.ecommerce.products', compact('products', 'i'));
    }

    public function storeProduct(Request $request)
    {
        $prod = new Product();
        $prod->product_name = $request->name;
        $prod->price = $request->price;
        $prod->description = $request->description;
        $prod->format = $request->format;
        $prod->language = $request->lang;
        $prod->author = $request->author;
        $prod->size = $request->size;
        $prod->pages = $request->pages;
        $prod->publication = $request->publication;
        $prod->save();

        $images = $request->file('images');

        foreach ($images as $im) {
            $files = $im->getClientOriginalExtension();

            foreach ($request->images as $file) {
                $file_name = time() . rand(1, 999) . '.' . $file->getClientOriginalExtension();
                $path = base_path('back/images/product_images/');
                $pimage = new ProductImage();
                $pimage->pid = $prod->id;
                $pimage->image = $file_name;

                try {
                    $file->move($path, $file_name);
                    $pimage->save();
                } catch (Exception $e) {
                    //return redirect('CulturalActivities');
                }
            }
        }
        return redirect('admin/ProductsShowcase');
    }

    public function editProduct($id)
    {
        $data = Product::find($id);
        return view('backend.pages.ecommerce.edit_product',compact('data'));
    }

    public function updateProduct(Request $request)
    {
        $prod = Product::find($request->id);
        $prod->product_name = $request->name;
        $prod->price = $request->price;
        $prod->description = $request->description;
        $prod->format = $request->format;
        $prod->language = $request->lang;
        $prod->author = $request->author;
        $prod->size = $request->size;
        $prod->pages = $request->pages;
        $prod->publication = $request->publication;
        if($prod->save())
            return redirect('admin/ProductsShowcase');
        else
            return redirect()->back();
    }

    public function destroyProduct($id)
    {
        $delete = Product::find($id);
        $images = ProductImage::where('pid', $id)->get();

        $num = 0;
        foreach ($images as $img) {
            unlink(base_path() . '/back/images/product_images/' . $img->image);
            $img->delete();
            $num++;
            echo $num;
        }

        if ($num > 0) {
            $delete->delete();
            echo "Deleted";
        } else
            echo "Error Occured";
    }

    public function viewOrder()
    {
        $orders = Order::get();
        $i = 1;

        return view("backend.pages.ecommerce.orders", compact("orders", 'i'));
    }

    public function OrderDetails($id)
    {
        $oid = Crypt::decrypt($id);
        //echo $oid;
        $orders = Order::where('id', $oid)->first();
        $user_details = UserDetail::where('user_id', $orders->user_id)->first();

        return view("backend.pages.ecommerce.orderDetail", compact('orders', 'user_details'));
    }

    public function DirectAddcart(Request $request)
    {
        try{
        $add = new Cart();

        $add->product_id = $request->pid;
        $add->user_id = $request->user_id;
        $add->quantity = $request->quantity;

        if ($add->save())
            return response()->json(['message' => 'Product Added To Cart Successfully', 'type' => 'success']);
        else
            return response()->json(['message' => 'Some Error Occured', 'type' => 'error']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Item Already Added In Your Cart', 'type' => 'error']);//throw new DuplicateEntry();
        }
    }
}
