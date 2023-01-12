<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Company;
use App\Models\Social;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function showCompanies()
    {
        $companies = Company::get();
        $i = 1;

        return view('backend.pages.org_report', compact('companies', 'i'));
    }

    public function storeCompany(Request $request)
    {
        if (Company::count() == 0) {
            $prod = new Company();
            $prod->company_name = $request->name;
            $prod->address = $request->address;
            $prod->email = $request->email;
            $prod->mobile = $request->mobile;
            $prod->city = $request->city;
            $prod->country = $request->country;
            $prod->state = $request->state;

            $file = $request->file('image');

            $file_name = time() . rand(1, 999) . '.' . $file->getClientOriginalExtension();
            $path = base_path('public/back/images/company_images/');
            $file->move($path, $file_name);

            $prod->image = $file_name;

            if ($prod->save())
                return redirect('ManageOrganisation');
            else
                return redirect()->back();
        }
    }

    public function editCompany($id)
    {
        $data = Company::find($id);
        return view('backend.pages.editOrg', compact('data'));
    }

    public function updateCompany(Request $request)
    {

            $prod = Company::find($request->id);
            $prod->company_name = $request->name;
            $prod->address = $request->address;
            $prod->email = $request->email;
            $prod->mobile = $request->mobile;
            $prod->city = $request->city;
            $prod->country = $request->country;
            $prod->state = $request->state;

            $file = $request->file('image');

            $file_name = time() . rand(1, 999) . '.' . $file->getClientOriginalExtension();
            $path = base_path('public/back/images/company_images/');
            $file->move($path, $file_name);

            $prod->image = $file_name;

            if ($prod->save())
                return redirect('ManageOrganisation');
            else
                return redirect()->back();

    }

    public function showBanners()
    {
        $banners = Banner::get();
        $i = 1;

        return view('backend.pages.banner_report', compact('banners', 'i'));
    }

    public function storeBanner(Request $request)
    {
            $prod = new Banner();
            $prod->heading = $request->heading;
            $prod->subheading = $request->subheading;
            $prod->link = $request->link;
            $prod->button = $request->button;

            $file = $request->file('image');

            $file_name = time() . rand(1, 999) . '.' . $file->getClientOriginalExtension();
            $path = base_path('public/back/images/banner_images/');
            $file->move($path, $file_name);

            $prod->image = $file_name;

            if ($prod->save())
                return redirect('ManageBanner');
            else
                return redirect()->back();
    }

    public function editBanner($id)
    {
        $data = Banner::find($id);
        return view('backend.pages.editBanner', compact('data'));
    }

    public function updateBanner(Request $request)
    {

            $prod = Banner::find($request->id);
            $prod->heading = $request->heading;
            $prod->subheading = $request->subheading;
            $prod->link = $request->link;
            $prod->button = $request->button;

            $file = $request->file('image');

            $file_name = time() . rand(1, 999) . '.' . $file->getClientOriginalExtension();
            $path = base_path('public/back/images/banner_images/');
            $file->move($path, $file_name);

            $prod->image = $file_name;

            if ($prod->save())
                return redirect('ManageBanner');
            else
                return redirect()->back();

    }

    public function destroyBanner($id)
    {
        $delete = Banner::find($id);
        unlink(base_path() . '/public/back/images/banner_images/'.$delete->image);

        if ($delete->delete()) {
            echo "Deleted";
        } else
            echo "Error Occured";
    }

    public function showSocials()
    {
        $socials = Social::get();
        $i = 1;

        return view('backend.pages.social_report', compact('socials', 'i'));
    }

    public function storeSocial(Request $request)
    {
            $prod = new Social();
            $prod->platform = $request->platform;
            $prod->link = $request->link;

            if ($prod->save())
                return redirect('ManageSocialPlatform');
            else
                return redirect()->back();
    }

    public function editSocial($id)
    {
        $data = Social::find($id);
        return view('backend.pages.editSocial', compact('data'));
    }

    public function updateSocial(Request $request)
    {
            $prod = Social::find($request->id);
            $prod->platform = $request->platform;
            $prod->link = $request->link;

            if ($prod->save())
                return redirect('ManageSocialPlatform');
            else
                return redirect()->back();

    }

    public function destroySocial($id)
    {
        $delete = Social::find($id);

        if ($delete->delete()) {
            echo "Deleted";
        } else
            echo "Error Occured";
    }
}
