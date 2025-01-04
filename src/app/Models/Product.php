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

    public function getDetail()
    {
        $txt = 'ID:' . $this->id . ' ' . $this->name . '(' . $this->price .  '円' . ') ' . $this->description;
        return $txt;
    }

    public function seasons()
    {
        return $this->hasOne('App\Models\season');
    }

    public function reviews()
    {
        return $this->belongsToMany(Season::class);
    }
}
