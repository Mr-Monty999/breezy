<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\directoryExists;

class SettingController extends Controller
{

    public function index()
    {
        $data = null;
        if (Setting::count() <= 0) {
            $data = [
                "site_name" => null,
                "phone" => null,
                "news" => null,
                "home_title" => null,
                "vistors_count" => null
            ];
        } else
            $data = Setting::first();

        return view("settings.index")->with("data", $data);
    }



    public function update(Request $request)
    {
        $imagesPath  = base_path();

        if (file_exists(public_path()))
            $imagesPath = public_path();


        $setting = Setting::first();
        $photo = $request->file("site_photo");
        $photoPath = $setting->site_photo;
        $oldPhoto = $imagesPath . $setting->site_photo;

        if ($setting->site_photo != null && file_exists($oldPhoto))
            unlink($oldPhoto);


        if ($request->hasFile("site_photo")) {
            $photoPath = "/images/home." . $photo->getClientOriginalExtension();
            $photo->move($imagesPath . "/images", "home." . $photo->getClientOriginalExtension());
        }


        if (!$setting->exists()) {
            $setting = Setting::create([
                "site_name" => $request->site_name,
                "phone" => $request->phone,
                "news" => $request->news,
                "home_title" => $request->home_title,
                "site_photo" => $photoPath
            ]);
        } else {

            $setting->update([
                "site_name" => $request->site_name,
                "phone" => $request->phone,
                "news" => $request->news,
                "home_title" => $request->home_title,
                "site_photo" => $photoPath
            ]);
        }



        return redirect()->back()->with("success", "تم الحفظ بنجاح");
    }
}
