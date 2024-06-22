<?php

namespace App\Livewire;

use App\Helpers\CartMenagment;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Cart')]
class CartPage extends Component
{
    public $cart_items=[];
    public $grand_total;
    public function mount(){
        $this->cart_items=CartMenagment::getCartItemsFromCookie();
        $this->grand_total=CartMenagment::calculateGrandTotal($this->cart_items);
    }
    public function removeItem($product_id){
        $this->cart_items=CartMenagment::removeItemFromCart($product_id);
        $this->grand_total=CartMenagment::calculateGrandTotal($this->cart_items);
        $this->dispatch('update-cart-count',total_count:count($this->cart_items))->to(Navbar::class);
    }
    public function decreaseQty($product_id){
        $this->cart_items=CartMenagment::decrementQuantityCart($product_id);
        $this->grand_total=CartMenagment::calculateGrandTotal($this->cart_items);
    }
    public function increaseQty($product_id){
        $this->cart_items=CartMenagment::incrementQuantityCart($product_id);
        $this->grand_total=CartMenagment::calculateGrandTotal($this->cart_items);
    }
    public function render()
    {
        return view('livewire.cart-page');
    }
}
