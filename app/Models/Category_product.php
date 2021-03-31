<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_product extends Model
{
    public $table = "category_product";

    protected $fillable =['category_id','product_id'];
}
