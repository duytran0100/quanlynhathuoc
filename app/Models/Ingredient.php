<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $table= "ingredients";
    public $timestamp = true;
    protected $fillable = ['id', 'ingredient_name'];

    public function products()
    {
        return $this->hasMany(Product::class,'product_ingredients')->withPivot("value");
    }
}
