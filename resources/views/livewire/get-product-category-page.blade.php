<div>

    @include('msg.message')

    <div  class="all-product-grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-top-dt">
                        
                        <div class="product-left-title">
                            <h2> ახალი პროდუქცია  </h2>
                        </div>

                        <div class="product-sort">
                            <form method="GET">
                                <div class="row">
                                    
                                    <div class="form-group mr-3">
                                        <select name='per_page' class="form-control">
                                            @foreach(showProductPerPage() as $value)
                                                <option value="{{ $value }}"> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mr-3">
                                        <select name='filter' class="form-control">
                                            @foreach(filterSortProduct() as $key => $value)
                                                <option value="{{ $key }}"> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" 
                                                class="btn btn bg-white hover-btn mr-3">
                                            <i class="fa fa-sort" aria-hidden="true"></i>
                                            დალაგება
                                        </button>

                                        <a class="btn btn bg-white hover-btn pull-bs-canvas-right">
                                        <i class="fa fa-filter" aria-hidden="true"></i>
                                            ფილტრაცია 
                                        </a>
                                    </div>

                                </div>
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <div class="product-list-view">
                <div class="row">

                    @forelse($suggestProductCategory as $product)

                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">

                                @if(\Carbon\Carbon::parse($product->created_at)->addDay() > \Carbon\Carbon::now())
                                    <div class="box">
                                        <div class="ribbon ribbon-top-left">
                                            <span> ახალი </span>
                                        </div>
                                    </div>
                                @endif


                                <a href="#" class="product-img">
                                    @if($product->image)
                                        <img    src="{{ Storage::url($product->image) }}" 
                                                alt="{{ $product->name }}"
                                                class="product-img-item">
                                    @else
                                        <img src="{{ asset('front/images/no-image.png') }}" alt="">
                                    @endif

                                    <div class="product-absolute-options">
                                        
                                        @if($product->showHideDiscountPercent())
                                            <span class="offer-badge-1 ml-7 mt-1">
                                                {{ $product->showHideDiscountPercent() }}
                                            </span>
                                        @endif

                                        <form wire:submit.prevent="addToWishlist({{ $product->product_id }})">
                                            @csrf
                                            <button wire:click.prevent="addToWishlist({{ $product->product_id }})" class="border-0">
                                                <span class="like-icon" title="wishlist"></span>
                                            </button>
                                        </form>

                                    </div>
                                </a>

                                <div class="product-text-dt">
                                    <p> მარაგშია 
                                        <span> ({{ $product->quantity }}) </span>
                                    </p>

                                    <h4> 
                                        <a href="{{ route('front.show.index', [
                                                        $product->product_id, 
                                                        Str::slug($product->name, '-')]) }}" class="text-black">
                                            {{ Str::limit($product->name, 30) }}
                                        </a> 
                                    </h4>
                                    
                                    <div class="product-price">

                                        {{ $product->priceWithDiscountAndWithoutDiscount() }}
                                
                                        <span   data-inverted="" 
                                                data-tooltip="ძველი ფასი: {{ $product->showOldPrice() }}" 
                                                data-position="top center">
                                            {{ $product->showOldPrice() }}
                                        </span>
                                    </div>

                                    <div class="qty-cart">
                                        <span class="cart-icon">

                                            <form wire:submit.prevent="addToCart({{ $product->product_id }})">
                                            @csrf
                                              
                                            <i  data-toggle="modal" 
                                                data-target="#show_{{ $loop->iteration }}" 
                                                class="cart-icon-style fa fa-eye" 
                                                title="სწრაფი ნახვა">
                                            </i>

                                            <i wire:click.prevent="addToCart({{ $product->product_id }})" 
                                                class="cart-icon-style fa fa-shopping-cart" 
                                                title="კალათაში დამატება"></i>
                                            </form>

                                            
                                        </span>
                                    </div>

                                    @include('livewire.partials.category_show_single_product')

                                </div>
                            </div>
                        </div>
                    @empty
                        <h4>
                            პროდუქცია არ მოიძებნა
                        </h4>
                    @endforelse


                    <div class="col-md-12">
                        <div class="more-product-btn">
                            <button class="show-more-btn hover-btn">
                                პროდუქცია ({{ count($suggestProductCategory) }})
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
