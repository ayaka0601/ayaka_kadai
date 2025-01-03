<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'season_id',
        'image',
        'description'
    ];

    protected $table = 'products';

    public function getData()
    {
        $products = DB::table($this->table)->get();
        return $products;
    }
}
