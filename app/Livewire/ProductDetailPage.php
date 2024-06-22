<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Helpers\CartMenagment;
use App\Livewire\Partials\Navbar;

class ProductDetailPage extends Component
{
    public $slug;
    public $quantity = 1;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function incrementQty()
    {
        $this->quantity++;
    }
    public function decrementQty()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    // add to Cart 
    public function addToCart($product_id)
    {
        $total_count = CartMenagment::addItemToCartWithQty($product_id,$this->quantity);
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);
    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->firstOrFail();

        return view('livewire.product-detail-page', [
            'product' => $product,
        ]);
    }
}
