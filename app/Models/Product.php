<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'merk',
        'price',
        'stock',
        'weight',
        'diskon',
        'condition',
        'description',
        'gambar',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function detailPurchase() {
        return $this->hasMany(DetailPurchase::class);
    }
}
