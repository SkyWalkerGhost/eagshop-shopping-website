<div class="bs-canvas bs-canvas-right position-fixed bg-cart h-100">
    <div class="bs-canvas-header side-cart-header p-3">
        
        <div class="d-inline-block main-cart-title">
        	<i class="fa fa-filter"></i>
        	ფილტრაცია
        </div>
        
        <button type="button" class="bs-canvas-close close" aria-label="Close">
            <i class="uil uil-multiply"></i>
        </button>
    </div>

    <form method="GET">
	    <div class="bs-canvas-body filter-body">
	        <div class="filter-items">
	            
	            <div class="filtr-cate-title">
	                <h4> კატეგორიები </h4>
	            </div>
	            
	            <div class="filter-item-body scrollstyle_4">
	                <div class="cart-radio">
	                    <ul class="cte-select">
	                    		
	                    	@foreach($categories as $category)
		                        <li>
		                            <a href="{{ route('front.category.index', $category->name) }}">
		                            	<label for="c1"> 
		                            		{{ $category->name }} 
		                            		({{ $category->product_category_count }}) 
		                            	</label>
		                            </a>
		                        </li>
	                        @endforeach

	                    </ul>
	                </div>
	            </div>
	        </div>

	        <div class="filter-items">
	            <div class="filtr-cate-title">
	                <h4> ფასი </h4>
                    <div class="range-wrap mt-4">
						<div class="range-value" id="rangeV"></div>
						<input 	id="range" 
								name="price_range" 
								type="range" 
								min="0" 
								max="1000" 
								value="{{ request()->price_range ?? 20 }}" 
								step="5">
					</div>
	            </div>
	        </div>

	        <div class="filter-items">
	            
	            <div class="filtr-cate-title">
	                <h4> ფასდაკლება </h4>
	            </div>

	            <div class="offer-item-body scrollstyle_4">
	                <div class="brand-list">
	                    
	                    @foreach($getProductByPercent as $percent)
	                    	@if($percent->action_percent !== 0)
			                    <div class="custom-control custom-checkbox pb2">
			                        <div class="form-check">
									  	<input 	type="radio" 
									  			name="percent" 
									  			class="form-check-input" 
									  			value="{{ $percent->action_percent }}" 
									  			id="exampleRadios1">
									  	
									  	<label class="form-check-label" for="exampleRadios1">
									    	{{ $percent->action_percent }}% 
									    	<span class="webproduct"> 
												({{ number_format($percent->percentOfProduct) }}) 
											</span>
									  	</label>
									</div>
			                    </div>
		                    @endif
	                    @endforeach
	                   
	                </div>
	            </div>

	            <button type="submit" class="btn btn bg-dark text-white hover-btn mt-3 btn-block">
	            	გაფილტვრა
	            </button>
	        </div>
	    </div>

	    @csrf
    </form>

</div>