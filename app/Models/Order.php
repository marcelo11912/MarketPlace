<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
            $latest_order = Order::orderBy('created_at', 'DESC')->first();
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
        return $this->belongsToMany(Producto::class, 'order_items', 'order_id', 'producto_id')->withPivot('price', 'quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subOrders()
    {
        return $this->hasMany(SubOrder::class);
    }

    public function generateSubOrders()
    {
        $items = $this->items;
        foreach ($items->groupBy('shop_id') as $shopId => $productos) {
            $shop = Shop::find($shopId);
            $subOrders = $this->subOrders()->create([
                'order_id' => $this->id,
                'seller_id' => $shop->user_id,
                'item_count' => $productos->count(),
                'total' => $productos->sum('pivot.price'),
            ]);

            foreach ($productos as $product) {
                $subOrders->items()->attach($product->id, [
                    'price' => $product->pivot->price,
                    'quantity' => $product->pivot->quantity,
                ]);
            }
        }
    }
}
