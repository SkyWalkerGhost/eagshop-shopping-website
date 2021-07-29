<div>

    <div class="pdpt-title">
        <h4> სურვილების სია (<i class="uil uil-heart"></i> {{ count($myWishlist) }}) </h4>
    </div>

    @forelse($myWishlist as $wishlist)
        
        @foreach($wishlist->product as $product)
            <div class="cart-item">
                <div class="cart-product-img">
                    
                    @if($product->image)
                        <img    src="{{ Storage::url($product->image) }}" 
                                alt="{{ $product->name }}"
                                class="product-img-item">
                    @else
                        <img src="{{ asset('front/images/no-image.png') }}" alt="">
                    @endif

                    @if($product->showHideDiscountPercent())
                        <span class="offer-badge">
                            {{ $product->showHideDiscountPercent() }}
                        </span>
                    @endif

                </div>

                <div class="cart-text">
                    <h4>
                        <a href="{{ route('front.show.index', 
                            [$product->product_id, Str::slug($product->name, '-')]) }}" class="text-black">
                            {{ Str::limit($product->name, 30) }}
                        </a>
                    </h4>

                    <div class="cart-item-price">
                        
                        {{ $product->priceWithDiscountAndWithoutDiscount() }}

                        <span   data-inverted="" 
                            data-tooltip="ძველი ფასი: {{ $product->showOldPrice() }}" 
                            data-position="top center">
                            {{ $product->showOldPrice() }}
                        </span>

                    </div>

                    <div class="float-right">
                        <form wire:submit.prevent="removeFromWishlist({{ $wishlist->wishlist_id }})" action="POST">
                        @csrf
                    
                        <button wire:click.prevent="removeFromWishlist({{ $wishlist->wishlist_id }})" 
                                type="button" 
                                class="btn btn bg-dark text-white p-2 hover-btn rounded mb-1 border-0">

                                <span   data-inverted="" 
                                        data-tooltip="პროდუქციის სურვილების სიიდან წაშლა" 
                                        data-position="top center">
                                    <i class="fa fa-trash"></i>
                                </span>
                        </button>
                    </form>

                    <form wire:submit.prevent="addToCart({{ $wishlist->wishlist_id }})" action="POST">
                        @csrf
                    
                        <button wire:click.prevent="addToCart({{ $wishlist->wishlist_id }})" 
                                type="button" 
                                class="btn btn bg-dark text-white p-2 hover-btn rounded">

                                <span   data-inverted="" 
                                        data-tooltip="კალათაში გადატანა" 
                                        data-position="top center">
                                    <i class="fa fa-shopping-cart"></i>
                                </span>
                        </button>
                    </form>

                    </div>
                </div>


            </div>
        @endforeach
    
    @empty
        <h4 class="p-3"> სურვილების სიაში პროდუქცია დამატებული არ არის </h4>
    @endforelse 
</div>
