<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Producto extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
       
       'category_id','slug',  'name', 'description', 'price', 'cover_img','shop_id'
    ];
    //Relacion
    public function shops(){
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
