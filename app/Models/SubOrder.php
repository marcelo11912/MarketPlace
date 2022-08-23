<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_number',
        'order_id',
        'seller_id',
        'status',
        'item_count',
        'total',
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
            $latest_order = SubOrder::orderBy('created_at', 'DESC')->first();
            if (!is_null($latest_order)) {
                $order_number = $latest_order->id;
            } else {
                $order_number = 1;
            }
            $model->order_number = str_pad($order_number + 1, 8, "0", STR_PAD_LEFT);
        });
    }
    public function items()
    {
        return $this->belongsToMany(Producto::class, 'sub_order_items', 'sub_order_id', 'producto_id')->withPivot('price', 'quantity');
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
