<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ["product_name", "product_price", "item_id"];

    public function item()
    {
        return $this->belongsTo(Item::class, "item_id");
    }
}
