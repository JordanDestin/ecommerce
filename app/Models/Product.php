<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'price', 'quantite','image', 'description',
    ];

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
