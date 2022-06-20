<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{

    public function privacy()
    {
        $admin = Admin::first();
        return view("admin.index", ["admin" => $admin]);
    }

    public function login()
    {


        if (Admin::count() <= 0) {
            Admin::create(
                [
                    "username" => "admin",
                    "password" => Hash::make("admin")
                ]
            );
        }


        return view("dashboard.login");
    }
    public function attemptLogin(Request $request)
    {
        $login = [
            "username" =>  trim($request->username),
            "password" => trim($request->password)
        ];

        if (Auth::guard("admin")->attempt($login, true)) {
            return redirect()->route("dashboard.index");
        } else {
            return redirect()->back()->with("error", "عفوا الرجاء التحقق من البيانات !");
        }
    }
    public function dashboard()
    {
        $data = Setting::first();
        if ($data == null) {
            $data["vistors_count"] = null;
        }
        return view("dashboard.index", ["data" => $data]);
    }

    public function logout()
    {
        Auth::guard("admin")->logout();
        return redirect()->route("dashboard.login");
    }



    public function update(Request $request)
    {
        $data = Admin::first()->update([
            "username" => trim($request->username),
            "password" => Hash::make(trim($request->password))
        ]);

        return redirect()->back()->with("success", "تم الحفظ بنجاح");
    }
}
