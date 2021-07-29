<div>
	@include('msg.message')
	<div class="row">
			
		<div class="col-md-12">
			<div class="main-title-tt">
				<div class="main-title-left">
				<span> კაცი & ქალი </span>
				<h2> მაისურები, ჰუდები </h2>
				</div>
				<a href="{{ route('front.category.index', ProductStatus::PRODUCT_CATEGORY_TSHIRT) }}" class="see-more-btn"> ყველას ნახვა </a>
			</div>
		</div>

		<div class="col-md-12 mb-5">
			<div class="owl-carousel featured-slider owl-theme owl-loaded owl-drag">

				<div class="owl-stage-outer">

					<div class="owl-stage" style="transform: translate3d(-885px, 0px, 0px); transition: all 0.25s ease 0s; width: 2360px;">

						@foreach($suggestProducts as $product)
							<div class="owl-item" style="width: 285px; margin-right: 10px;">
								<div class="item">
									<div class="product-item">

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
					                        	<a href="{{ route('front.show.index', 
					                        		[$product->product_id, Str::slug($product->name, '-')]) }}" class="text-black">
					                        		{{ Str::limit($product->name, 30) }}
					                        	</a> 
					                        </h4>
					                        
					                        <div class="product-price">

					                        	{{ $product->priceWithDiscountAndWithoutDiscount() }}
					                    
				                            	<span 	data-inverted="" 
				                            			data-tooltip="ძველი ფასი: {{ $product->showOldPrice() }}" 
				                            			data-position="top center">
				                                    {{ $product->showOldPrice() }}
				                                </span>
					                        </div>

					                        <div class="qty-cart">
					                            <span class="cart-icon">

					                                <form wire:submit.prevent="addToCart({{ $product->product_id }})">
						                            @csrf
							                          
									      			<i wire:click.prevent="addToCart({{ $product->product_id }})" 
									      				class="cart-icon-style fa fa-shopping-cart" 
									      				title="კალათაში დამატება"></i>
						                        	</form>
					                                
					                            </span>
					                        </div>

										</div>
									</div>
								</div>
							</div>
						@endforeach

					</div>
				</div>

				<div class="owl-nav">
					<button type="button" role="presentation" class="owl-prev">
						<i class="uil uil-angle-left"></i>
					</button>
					<button type="button" role="presentation" class="owl-next">
						<i class="uil uil-angle-right"></i>
					</button>
				</div>

			</div>
		</div>



		<div class="col-md-12">
			<div class="main-title-tt">
				<div class="main-title-left">
				<span> აქსესუარები </span>
				<h2> ჭიქები, ბრელოკები, კალმები </h2>
				</div>
				<a href="{{ route('front.category.index', ProductStatus::PRODUCT_CATEGORY_TSHIRT) }}" class="see-more-btn"> ყველას ნახვა </a>
			</div>
		</div>

		<div class="col-md-12">
			<div class="owl-carousel featured-slider owl-theme owl-loaded owl-drag">

				<div class="owl-stage-outer">

					<div class="owl-stage" style="transform: translate3d(-885px, 0px, 0px); transition: all 0.25s ease 0s; width: 2360px;">

						@foreach($productAccessories as $product)
							<div class="owl-item" style="width: 285px; margin-right: 10px;">
								<div class="item">
									<div class="product-item">

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
					                        	<a href="{{ route('front.show.index', 
					                        		[$product->product_id, Str::slug($product->name, '-')]) }}" class="text-black">
					                        		{{ Str::limit($product->name, 30) }}
					                        	</a> 
					                        </h4>
					                        
					                        <div class="product-price">

					                        	{{ $product->priceWithDiscountAndWithoutDiscount() }}
					                    
				                            	<span 	data-inverted="" 
				                            			data-tooltip="ძველი ფასი: {{ $product->showOldPrice() }}" 
				                            			data-position="top center">
				                                    {{ $product->showOldPrice() }}
				                                </span>
					                        </div>

					                        <div class="qty-cart">
					                            <span class="cart-icon">

					                                <form wire:submit.prevent="addToCart({{ $product->product_id }})">
						                            @csrf
							                          
									      			<i wire:click.prevent="addToCart({{ $product->product_id }})" 
									      				class="cart-icon-style fa fa-shopping-cart" 
									      				title="კალათაში დამატება"></i>
						                        	</form>
					                                
					                            </span>
					                        </div>

										</div>
									</div>
								</div>
							</div>
						@endforeach

					</div>
				</div>

				<div class="owl-nav">
					<button type="button" role="presentation" class="owl-prev">
						<i class="uil uil-angle-left"></i>
					</button>
					<button type="button" role="presentation" class="owl-next">
						<i class="uil uil-angle-right"></i>
					</button>
				</div>

			</div>
		</div>

	</div>
</div>