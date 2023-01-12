<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Company;
use App\Models\Social;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $company = Company::first();
        $banners = Banner::inRandomOrder()->get();
        $social = Social::get();

        return view('pages.index', compact('company','banners','social'));
    }
}
