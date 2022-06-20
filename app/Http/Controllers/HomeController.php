<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver;

class HomeController extends Controller
{
    public function index()
    {

        $data = Setting::first();
        if ($data == null) {
            $data["site_photo"] = null;
            $data["home_title"] = null;
        }
        return view("home.index", ["data" => $data]);
    }

    public function getProducts($id, $name)
    {

        $products = Item::find($id)->products()->paginate(6);
        $site = Setting::first();

        if (
            $site == null
        ) {
            $site['site_name'] = null;
            $site['phone'] = null;
            $site['news'] = null;
        }

        return view("home.products", ["products" => $products, "item_name" => $name, "site" => $site]);
    }
}
