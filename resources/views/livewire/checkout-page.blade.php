<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Checkout</h1>
    <form wire:submit.prevent="placeOrder">
        <div class="grid grid-cols-12 gap-4">
            <div class="md:col-span-12 lg:col-span-8 col-span-12">
                <!-- Card -->
                <div class="bg-white rounded-xl shadow p-4 sm:p-7">
                    <!-- Shipping Address -->
                    <div class="mb-6">
                        <h2 class="text-xl font-bold underline text-gray-700 mb-2">Shipping Address</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-1" for="first_name">First Name</label>
                                <input class="w-full rounded-lg border py-2 px-3 @error('first_name') border-red-500 @enderror" 
                                       wire:model='first_name' id="first_name" type="text">
                                @error('first_name') 
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-1" for="last_name">Last Name</label>
                                <input class="w-full rounded-lg border py-2 px-3 @error('last_name') border-red-500 @enderror" 
                                       wire:model='last_name' id="last_name" type="text">
                                @error('last_name') 
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 mb-1" for="phone">Phone</label>
                            <input class="w-full rounded-lg border py-2 px-3 @error('phone') border-red-500 @enderror" 
                                   wire:model='phone' id="phone" type="text">
                            @error('phone') 
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 mb-1" for="street_address">Address</label>
                            <input class="w-full rounded-lg border py-2 px-3 @error('street_address') border-red-500 @enderror" 
                                   wire:model='street_address' id="street_address" type="text">
                            @error('street_address') 
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 mb-1" for="city">City</label>
                            <input class="w-full rounded-lg border py-2 px-3 @error('city') border-red-500 @enderror" 
                                   wire:model='city' id="city" type="text">
                            @error('city') 
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block text-gray-700 mb-1" for="state">State</label>
                                <input class="w-full rounded-lg border py-2 px-3 @error('state') border-red-500 @enderror" 
                                       wire:model='state' id="state" type="text">
                                @error('state') 
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-1" for="zip_code">ZIP Code</label>
                                <input class="w-full rounded-lg border py-2 px-3 @error('zip_code') border-red-500 @enderror" 
                                       wire:model='zip_code' id="zip_code" type="text">
                                @error('zip_code') 
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-lg font-semibold mb-4">Select Payment Method</div>
                    <ul class="grid w-full gap-6 md:grid-cols-2">
                        <li>
                            <input wire:model='payment_method' class="hidden peer" id="payment_cod" type="radio" value="cod" />
                            <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100" for="payment_cod">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">Cash on Delivery</div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                </svg>
                            </label>
                        </li>
                        <li>
                            <input wire:model='payment_method' class="hidden peer" id="payment_stripe" type="radio" value="stripe" />
                            <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100" for="payment_stripe">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">Stripe</div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                </svg>
                            </label>
                        </li>
                    </ul>
                </div>
                <!-- End Card -->
            </div>

            <div class="md:col-span-12 lg:col-span-4 col-span-12">
                <div class="bg-white rounded-xl shadow p-4 sm:p-7">
                    <div class="text-xl font-bold underline text-gray-700 mb-2">ORDER SUMMARY</div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>Subtotal</span>
                        <span>{{ Number::currency($grand_total, 'UZS') }}</span>
                    </div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>Taxes</span>
                        <span>{{ Number::currency(0, 'UZS') }}</span>
                    </div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>Shipping Cost</span>
                        <span>{{ Number::currency(0, 'UZS') }}</span>
                    </div>
                    <hr class="bg-slate-400 my-4 h-1 rounded">
                    <div class="flex justify-between mb-2 font-bold">
                        <span>Grand Total</span>
                        <span>{{ Number::currency($grand_total, 'UZS') }}</span>
                    </div>
                </div>
                <button type="submit" class="bg-green-500 mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-green-600">Place Order</button>
                <div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7">
                    <div class="text-xl font-bold underline text-gray-700 mb-2">BASKET SUMMARY</div>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">
                        @foreach ($cart_items as $ci)
                            <li class="py-3 sm:py-4" wire:key='{{ $ci['product_id'] }}'>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        @if (isset($ci['images']) && is_array($ci['images']) && count($ci['images']) > 0)
                                            @php
                                                $imageUrl = url('storage', $ci['images'][0]);
                                            @endphp
                                            <img class="h-16 w-16 mr-4" src="{{ $imageUrl }}" alt="{{ $ci['name'] }}">
                                        @else
                                            <img class="h-16 w-16 mr-4" src="/path/to/default/image.jpg" alt="{{ $ci['name'] }}">
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate">{{ $ci['name'] }}</p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">Quantity: {{ $ci['quantity'] }}</p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900">{{ Number::currency($ci['total_amount'], 'UZS') }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
