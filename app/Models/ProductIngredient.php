<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    use HasFactory;
    protected $table= "product_ingredients";
    public $timestamp = true;
    protected $fillable = ['id', 'product_id', 'ingredient_id', 'unit_id', 'value'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function unit()
    {
        return $this->belongsTo(CalculationUnit::class);
    }
}
