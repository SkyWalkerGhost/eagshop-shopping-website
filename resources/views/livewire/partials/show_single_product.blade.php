<div wire:ignore.self  class="modal fade bd-example-modal-lg" data-backdrop="static" id="show_{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content border-radius-12">
       		<div class="modal-header">
	        	<h5 class="modal-title" id="staticBackdropLabel"> 
	        		პროდუქციის დეტალები
	        	</h5>
	        
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
	      	</div>

	      	<div class="modal-body">
	      		<div class="row">
	      			<div class="col-md-6 col-lg-6">
	      				@if($product->image)
                            <img    src="{{ Storage::url($product->image) }}" 
                                    alt="{{ $product->name }}"
                                    class="product-img-item">
                        @else
                            <img src="{{ asset('front/images/product/img-1.jpg') }}" alt="">
                        @endif
	      			</div>

		      		<div class="col-md-6 col-lg-6 text-align-left">
		      			
		      			<h2> 
		      				<a href="#" class="text-hover">
		      					{{ $product->name }}
		      				</a>
		      			</h2>
		      			
		      			<p class="mb-3"> Product ID: 
		      				<span> 
		      					{{ $product->product_id }} 
		      				</span>
		      			</p>
		      			
		      			<p class="mb-3">
		      				<i class="fa fa-star"></i>
		      				<i class="fa fa-star"></i>
		      				<i class="fa fa-star"></i>
		      				<i class="fa fa-star"></i>
		      				<i class="fa fa-star"></i>
		      				({{ count($product->reviews) }} შეფასება)
		      			</p>

		      			<p class="ml-1">
		      				<div class="cart-radio">
                                <ul class="kggrm-now">
                                    @if($product->size !== ProductStatus::PRODUCT_CLOTHE_SIZE)
                                        <li>
                                            <label for="a1" title='ზომა'>
                                            	{{ $product->size }} 
                                            </label>
                                        </li>
                                    @endif
                                </ul>
                            </div>
		      			</p>

		      			<p class="mb-3">
		      				<span class="font-size-3 font-weight-bold text-black">
		      					ფასი:
		      				</span>
		      				<span class="font-size-3 new-price font-weight-bold">
		      					@if($product->action_percent == ProductStatus::ACTION_PERCENT_ZERO)
                                	₾ {{ $product->price }} 
	                            @else
	                                ₾ {{ $product->action_price }} 
	                            @endif
		      				</span>

		      				<span class="font-size-3 old-price font-weight-bold">
	                            @if($product->action_percent !== ProductStatus::ACTION_PERCENT_ZERO)
	                                <span title="ძველი ფასი"> 
	                                    <del> {{ $product->price }} </del>
	                                </span>
	                            @endif
		      				</span>
		      			</p>
		      			
		      			<p class="mb-3">
		      				<span class="font-size-3 font-weight-bold text-black">
		      					კატეგორია:
		      				</span>
		      				<span class="font-size-5 badge"> 
		      					<button class="btn-block btn btn bg-grey text-grey border-0 button-danger-hover">
		      						{{ $product->category }}
		      					</button>
		      				</span>
		      			</p>

		      			<p class="mb-3">
		      				<span class="font-size-3 font-weight-bold text-black">
		      					მარაგშია:
		      				</span>
		      				<span class="font-size-3"> 
		      					({{ $product->quantity }})
		      				</span>
		      			</p>

		      			<p>
		      				<form wire:submit.prevent="addToCart({{ $product->product_id }})">
                            @csrf
	                            <button wire:click.prevent="addToCart({{ $product->product_id }})" class="btn-block btn btn-danger bg-cart-danger border-0 button-danger-hover">
			      					<i class="fa fa-shopping-cart"></i>
			      					კალათაში დამატება 
			      				</button>
                        	</form>
                        	
                        	<br/>

		      				<form wire:submit.prevent="addToWishlist({{ $product->product_id }})">
		      					@csrf
			      				<button wire:click.prevent="addToWishlist({{ $product->product_id }})" class="btn-block btn btn bg-grey text-grey border-0 button-danger-hover">
			      					<i class="fa fa-heart"></i>
			      					სურვილების სიაში დამატება
			      				</button>
			      			</form>
		      			</p>

		      		</div>

	      		</div>
	      	</div>

    	</div>
  	</div>
</div>