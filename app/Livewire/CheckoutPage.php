<?php

namespace App\Livewire;

use App\Helpers\CartMenagment;
use App\Models\Address;
use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Component;
use  App\Models\User;

#[Title('checkout')]
class CheckoutPage extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $street_address;
    public $zip_code;
    public $payment_method;
    public $city;
    public $state;
    public function placeOrder()
    {
        $cart_items = CartMenagment::getCartItemsFromCookie();
        $line_items = [];
        foreach ($cart_items as $item) {
            $line_items[] = [
                'price_data' => ['currency' => 'UZS'],
                'unit_amount' => $item['unit_amount'] * 100,
                'product_data' => ['name' => $item['name']],
                'quantity' => $item['quantity'],
            ];
        }
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->grand_total = CartMenagment::calculateGrandTotal($cart_items);
        $order->payment_method = $this->payment_method;
        $order->payment_status = 'pending';
        $order->status = 'new';
        $order->currency = 'UZS';
        $order->shipping_amount = 0;
        $order->shipping_method = 'none';
        $order->notes = 'Order List by' . auth()->user()->name;
        $address = new Address();
        $address->first_name = $this->first_name;
        $address->last_name = $this->last_name;
        $address->phone = $this->phone;
        $address->street_address = $this->street_address;
        $address->city = $this->city;
        $address->zip_code = $this->zip_code;
        $address->state = $this->state;
        $order->save();
        $address->order_id = $order->id;
        $address->save();
        $order->items()->createMany($cart_items);
        CartMenagment::clearCartItems();
        return redirect()->route('success');
    }
    public function render()
    {

        $cart_items = CartMenagment::getCartItemsFromCookie();
        $grand_total = CartMenagment::calculateGrandTotal($cart_items);
        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'grand_total' => $grand_total
        ]);
    }
}
