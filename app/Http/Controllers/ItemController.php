<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::paginate(5);
        return view("items.index")->with("items", $items);
    }



    public function store(Request $request)
    {
        $request->validate([
            "item_name" => "required",
            "item_photo" => "image"
        ]);

        if (Item::where("item_name", $request->item_name)->count() > 0) {
            return redirect()->back()->with("error", "عفوا هذا الصنف موجود بالفعل");
        }

        $imagesPath  = base_path();

        if (file_exists(public_path()))
            $imagesPath = public_path();

        $item = Item::create(
            [
                "item_name" => $request->item_name,
            ]
        );
        $id = $item->id;
        $photoPath = null;
        $photo = $request->file("item_photo");
        if ($request->hasFile("item_photo")) {
            $photoPath = "/images/$id." . $photo->getClientOriginalExtension();
            $photo->move($imagesPath . "/images", "$id." . $photo->getClientOriginalExtension());
        }
        $item->item_photo = $photoPath;
        $item->save();

        return redirect()->back()->with("success", "تمت الاضافة بنجاح");
    }


    public function edit($id)
    {
        $item = Item::find($id);
        return view("items.edit")->with("item", $item);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            "item_name" => "required",
            "item_photo" => "image"
        ]);
        $imagesPath  = base_path();

        if (file_exists(public_path()))
            $imagesPath = public_path();

        $item = Item::find($id);
        $search = Item::where("item_name", $request->item_name);

        $photoPath = $item->item_photo;
        $photo = $request->file("item_photo");

        $oldPhoto = $imagesPath . $item->item_photo;

        if ($item->item_photo != null && file_exists($oldPhoto))
            unlink($oldPhoto);

        if ($request->hasFile("item_photo")) {
            $photoPath = "/images/" . $id . "." . $photo->getClientOriginalExtension();
            $photo->move($imagesPath . "/images", $id . "." . $photo->getClientOriginalExtension());
        }

        if ($search->exists() && $item->item_name != $request->item_name) {
            return redirect()->back()->with("error", "هذا الصنف موجود بالفعل");
        }
        $item->update(
            [

                "item_name" => $request->item_name,
                "item_photo" => $photoPath
            ]
        );

        return redirect()->back()->with("success", "تم التعديل بنجاح");
    }


    public function delete($id)
    {
        $item = Item::find($id);
        $imagesPath  = base_path();

        if (file_exists(public_path()))
            $imagesPath = public_path();

        $oldPhoto = $imagesPath . $item->item_photo;

        if ($item->item_photo != null && file_exists($oldPhoto))
            unlink($oldPhoto);

        $item->delete();
        return redirect()->back()->with("success", "تم الحذف بنجاح");
    }
}
