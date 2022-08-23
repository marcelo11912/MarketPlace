<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{
    use Translatable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function posts()
    {
        return $this->hasMany(Voyager::modelClass('Post'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    public function hasChildren(){

        $children = Category::where('parent_id', $this->id)->get();
        if($children->isNotEmpty()){
            return true;
        }else{
            return false;
        }
    }

    public function children(){
        return $children = Category::where('parent_id', $this->id)->get();
    }
}
