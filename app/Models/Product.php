<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table= "products";
    public $timestamp = true;
    protected $fillable = [
        'id', 
        'product_name',
        'price',
        'unit_id',
        'category_id',
        'manufacturer_id',
        'description',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(CalculationUnit::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class,"product_ingredients")
                    ->withPivot("value");
    }

    public function product_detail()
    {
        return $this->hasMany(ProductIngredient::class, 'product_id', 'id');
    }
}
