<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getPrice()
    {
        $price = $this->price / 100;

        return number_format($price, 2, ',',' ');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
