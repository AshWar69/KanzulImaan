<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BookImage;
use App\Models\Category;
use App\Models\Company;
use App\Models\Language;
use App\Models\Library;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LibraryController extends Controller
{
    public function index()
    {
        $company = Company::first();
        $banners = Banner::inRandomOrder()->get();
        $social = Social::get();
        $libraries = Library::paginate(25);
        $images = BookImage::get();
        $categories = Category::where('parent_id',0)->get();
        $pimage = [];
        foreach($images as $image){
            if(!isset($pimage[$image->book_id]))
            $pimage[$image->book_id] = $image->image;
        }

        return view('pages.library.library', compact('company','banners','social','libraries', 'categories','pimage'));
    }

    public function showBook($slug)
    {
        $company = Company::first();
        $banners = Banner::inRandomOrder()->get();
        $social = Social::get();
        $book = Library::where('slug',$slug)->first();
        $language = Language::where('book_id',$book->id)->get();
        $libraries = Library::get();
        $images = BookImage::get();
        $categories = Category::where('parent_id',0)->get();
        $pimage = [];
        foreach($images as $image){
            if(!isset($pimage[$image->book_id]))
            $pimage[$image->book_id] = $image->image;
        }

        return view('pages.library.single', compact('company','banners', 'categories','social','libraries','pimage','book','language','images'));
    }

    public function readBook(Request $request)
    {
        $company = Company::first();
        $banners = Banner::inRandomOrder()->get();
        $social = Social::get();
        $libraries = Library::paginate(25);
        $categories = Category::where('parent_id',0)->get();
        $images = BookImage::get();
        $pimage = [];
        foreach($images as $image){
            if(!isset($pimage[$image->book_id]))
            $pimage[$image->book_id] = $image->image;
        }
        $file = Language::find($request->id);

        return view('pages.library.read', compact('company', 'categories','banners','social','libraries','pimage','file'));
    }

    // ========================== Backend Section =============================
        public function showCategories()
        {
            $categories = Category::where('parent_id',0)->get();
            $opt_category = Category::all();

            return view('backend.pages.library.categories', compact('categories','opt_category'));
        }

        public function storeCategory(Request $request)
        {
            $cat = new Category();
            $cat->category_name = $request->category;
            if($cat->save())
                return response()->json(['type'=>'success']);
            else
                return response()->json(['type'=>'error']);
        }

        public function storeSubCategory(Request $request)
        {
            $cat = new Category();
            $cat->parent_id = $request->category_id;
            $cat->category_name = $request->category;
            if($cat->save())
                return response()->json(['type'=>'success']);
            else
                return response()->json(['type'=>'error']);
        }

        public function destroyCategory(Request $request)
        {
            $cat = Category::find($request->id);

            if($cat->delete())
                return response()->json(['type'=>'success']);
            else
                return response()->json(['type'=>'error']);
        }

        public function showLibrary()
        {
            $products = Library::select('libraries.*','category_name')->join('categories','libraries.category_id','=','categories.id')->get();
            $i=1;
            return view('backend.pages.library.lib_rep', compact('products','i'));
        }

        public function addBook()
        {
            $categories = Category::where('parent_id',0)->get();
            $level=1;
            return view('backend.pages.library.book', compact('categories','level'));
        }

        public function showBookLang($id)
        {
            $languages = Language::where('book_id',$id)->get();
            $i=1;
            return view('backend.pages.library.lang_rep', compact('languages','id','i'));
        }

        public function addBookLang($id)
        {
            $book = Library::find($id);

            return view('backend.pages.library.add_lang', compact('book'));
        }

        public function storeBook(Request $request)
        {
            $lib = new Library();
            $lib->category_id = $request->category;
            $lib->name = $request->name;
            $lib->slug = Str::slug($request->name);
            $lib->author = $request->author;
            $lib->publisher = $request->publisher;
            $lib->total_pages = $request->pages;
            $lib->type = $request->type;
            $lib->description = $request->description;
            if($lib->save())
                return response()->json(['type'=>'success', 'msg'=> ' Book Saved Successfully']);
            else
                return response()->json(['type'=>'error', 'msg'=> ' Some Error Occured']);
        }

        public function editBook($id)
        {
            $categories = Category::get();
            $data = Library::find($id);

            return view('backend.pages.library.edit_book', compact('categories','data'));
        }

        public function updateBook(Request $request)
        {
            $lib = Library::find($request->id);
            $lib->category_id = $request->category;
            $lib->name = $request->name;
            $lib->slug = Str::slug($request->name);
            $lib->author = $request->author;
            $lib->publisher = $request->publisher;
            $lib->total_pages = $request->pages;
            $lib->description = $request->description;
            if($lib->save())
                return response()->json(['type'=>'success', 'msg'=> ' Book Updated Successfully']);
            else
                return response()->json(['type'=>'error', 'msg'=> ' Some Error Occured']);
        }

        public function destroyBook($id)
        {
            $del = Library::find($id);
            $images = BookImage::where('book_id',$id)->get();
            $languages = Language::where('book_id',$id)->get();

            $num = 0; $n = 0;
            foreach($images as $img){
                unlink(base_path() . '/back/images/library_images/' . $img->image);
                $img->delete();
                $num++;
            }
            foreach($languages as $lang){
                if($del->type == 'audio'){
                    unlink(base_path() . '/back/files/library_audio/' . $lang->file);
                    $img->delete();
                    $n++;
                }
                else if($del->type == 'book'){
                    unlink(base_path() . '/back/files/library_pdfs/' . $lang->file);
                    $img->delete();
                    $n++;
                }
            }
            if($del->delete() || $num > 0 || $n > 0)
                return response()->json(['type'=>'success', 'msg'=> ' Book & Its Data Deleted Successfully']);
            else
                return response()->json(['type'=>'error', 'msg'=> ' Some Error Occured']);
        }

        public function showBookImage($id)
        {
            $products = BookImage::where('book_id',$id)->get();
            $i=1;
            return view('backend.pages.library.image_rep', compact('products','id','i'));
        }

        public function addBookImage($id)
        {

            return view('backend.pages.library.image', compact('id'));
        }

        public function storeBookImage(Request $request)
        {
            //dd($request);
            $lib = new BookImage();
            $lib->book_id = $request->id;
            $file = $request->file('file');

            $file_name = time() . rand(1, 999) . '.' . $file->getClientOriginalExtension();
            $path = base_path('back/images/library_images/');
            $file->move($path, $file_name);
            $lib->image = $file_name;

            if($lib->save())
                return response()->json(['type'=>'success', 'msg'=> ' Book Image Saved Successfully']);
            else
                return response()->json(['type'=>'error', 'msg'=> ' Some Error Occured']);
        }

        public function storeBookLanguage(Request $request)
        {
            $lib = new Language();
            $lib->book_id = $request->id;
            $lib->language = $request->lang;

            if($request->type == 'audio'){
                $file = $request->file('file');
                $file_name = time() . rand(1, 999) . '.' . $file->getClientOriginalExtension();
                $path = base_path('back/files/library_audio/');
                $file->move($path, $file_name);
                $lib->file = $file_name;
            }
            else if($request->type == 'book'){
                $file = $request->file('file');
                $file_name = time() . rand(1, 999) . '.' . $file->getClientOriginalExtension();
                $path = base_path('back/files/library_pdfs/');
                $file->move($path, $file_name);
                $lib->file = $file_name;
            }

            if($lib->save())
                return response()->json(['type'=>'success', 'msg'=> ' Data Saved Successfully']);
            else
                return response()->json(['type'=>'error', 'msg'=> ' Some Error Occured']);
        }
    // ========================== Backend Section =============================
}
