<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        $categories = Category::whereNull('parent_id')->orderBy('id','DESC')->get();
        return view('livewire.shop.categories', compact('categories'));
    }
}
