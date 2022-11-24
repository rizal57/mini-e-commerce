<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_item',
        'subtotal',
        'transaction_id',
        'order_id',
        'payment_type',
        'payment_code',
        'pdf_url',
        'transaction_status',
    ];

    public function detailPurchase() {
        return $this->hasMany(DetailPurchase::class);
    }
}
