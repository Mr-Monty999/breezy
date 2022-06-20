<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(5);
        $items = Item::all();

        return view("products.index")->with("products", $products)->with("items", $items);
    }




    public function store(Request $request)
    {
        $request->validate([
            "product_name" => "required",
            "product_price" => "required",
            "item_id" => "required"
        ]);
        if (Product::where("product_name", $request->product_name)->exists()) {
            return redirect()->back()->with("error", "هذا الصنف موجود فعلا");
        }
        $product = Product::create([
            "product_name" => $request->product_name,
            "product_price" => $request->product_price,
            "item_id" => $request->item_id
        ]);

        return redirect()->back()->with("success", "تمت الاضافة بنجاح");
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $items = Item::all();
        return view("products.edit", ["product" => $product, "items" => $items]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "product_name" => "required",
            "product_price" => "required",
            "item_id" => "required"
        ]);
        $productName = Product::where("product_name", $request->product_name);
        $product = Product::find($id);

        if ($productName->exists() && $request->product_name != $product->product_name) {
            return redirect()->back()->with("error", "هذا الصنف موجود فعلا");
        }





        // return $request;
        $product->update([
            "product_name" => $request->product_name,
            "product_price" => $request->product_price,
            "item_id" => $request->item_id
        ]);

        return redirect()->back()->with("success", "تم التعديل بنجاح");
    }


    public function delete($id)
    {
        $item = Product::find($id);
        $item->delete();
        return redirect()->back()->with("success", "تم الحذف بنجاح");
    }
}
