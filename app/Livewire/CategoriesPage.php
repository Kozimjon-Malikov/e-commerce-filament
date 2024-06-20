<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Category')]
class CategoriesPage extends Component
{
    public function render()
    {
        $categories=Category::where('is_active',1)->latest()->get();
        return view('livewire.categories-page',compact('categories'));
    }
}
