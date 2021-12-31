<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table= "countries";
    public $timestamp = true;
    protected $fillable = ['id', 'country_name'];

    public function manufacturers()
    {
        return $this->hasMany(Manufacturer::class, "country_id", "id");
    }
}
