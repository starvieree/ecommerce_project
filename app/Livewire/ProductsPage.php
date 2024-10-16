<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Products Page - DCodeMania')]

class ProductsPage extends Component
{

    use WithPagination;

    public function render()
    {
        $categories = Category::where('is_active', 1)->get(['id', 'name', 'slug']);
        $brands = Brand::where('is_active', 1)->get(['id', 'name', 'slug']);
        $productQuery = Product::query()->where('is_active', 1);

        return view('livewire.products-page', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $productQuery->paginate(6)
        ]);
    }
}
