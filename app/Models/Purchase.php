<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_item',
        'subtotal',
    ];

    public function detailPurchase() {
        return $this->hasMany(DetailPurchase::class);
    }
}
