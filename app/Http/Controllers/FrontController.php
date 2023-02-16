<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BookImage;
use App\Models\Category;
use App\Models\Company;
use App\Models\Library;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function index()
    {
        $company = Company::first();
        $banners = Banner::inRandomOrder()->get();
        $social = Social::get();

        return view('pages.index', compact('company','banners','social'));
    }

    public function search(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = Library::select('name')
                        ->where('name', 'LIKE', '%'.$query.'%')
                        ->get();

        return response()->json($filter_data);
    }

    public function searchResult(Request $request)
    {
        $company = Company::first();
        $banners = Banner::inRandomOrder()->get();
        $social = Social::get();
        $images = BookImage::get();
        $categories = Category::where('parent_id',0)->get();
        $pimage = [];
        foreach($images as $image){
            if(!isset($pimage[$image->book_id]))
            $pimage[$image->book_id] = $image->image;
        }

        $query = Str::slug($request->qsearch);
        $filter_data = Library::where('slug', $query)->paginate(25);

        //dd($filter_data);
        return view('pages.library.search_result', compact('company','banners','social','filter_data', 'categories','pimage'));
        //return response()->json($filter_data);
    }
}
