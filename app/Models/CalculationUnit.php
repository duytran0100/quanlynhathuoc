<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculationUnit extends Model
{
    use HasFactory;
    protected $table= "calculation_units";
    public $timestamp = true;
    protected $fillable = ['id', 'unit_name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'unit_id', "id");
    }

    public function prod_ingredient()
    {
        return $this->hasMany(ProductIngredient::class, "unit_id", "id");
    }
}
