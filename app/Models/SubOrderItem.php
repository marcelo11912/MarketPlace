<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubOrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_order_id',
        'producto_id',
        'price',
        'quantity'
    ];
}
