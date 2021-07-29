<div>
    <ul class="ordr-crt-share">
        <li>
            <form wire:submit.prevent="addToCart({{ $cart_id }})">
                @csrf
                
                <ul class="gty-wish-share">
                    
                    <li>
                        <div class="qty-product">
                            <div class="quantity buttons_added">
                                <button wire:click.prevent='decrement' 
                                        type="button" 
                                        class="minus minus-btn"> 
                                    - 
                                </button>
                                
                                <input  wire:model.defer='quantity' 
                                        type="number" 
                                        step="1" 
                                        value="{{ $quantity }}" 
                                        class="input-text qty text">

                                <input  wire:model.defer='cart_id' 
                                        type="hidden" 
                                        value="{{ $cart_id }}">
                                
                                <button wire:click.prevent='increment' 
                                        type="button" 
                                        class="plus plus-btn"> 
                                        + 
                                </button>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="qty-product">
                            <div class="quantity buttons_added">
                                <button wire:click.prevent="addToCart({{ $cart_id }})" 
                                        class="add-cart-btn hover-btn">
                                        <i class="uil uil-shopping-cart-alt"></i>
                                        კალათაში დამატება 
                                </button>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="qty-product">
                            <div class="quantity buttons_added">
                                <form wire:submit.prevent="addToWishlist({{ $cart_id }})">
                                    @csrf
                                    <button wire:click.prevent="addToWishlist({{ $cart_id }})" 
                                            class="order-btn hover-btn">
                                        <i class="fa fa-heart"></i>
                                        სურვილების სიაში დამატება
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>

                </ul>
            </form>
        </li>
    </ul>
</div>
