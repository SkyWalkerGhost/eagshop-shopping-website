<div class="col-md-12">
    <div class="main-title-tt">
        <div class="main-title-left">
            <h2> კატეგორიები </h2>
        </div>
    </div>
</div>

<div class="col-md-12">
	<div class="owl-carousel cate-slider owl-theme">
	    
	    @foreach($categories as $category)
	        <div class="card bg-dark text-white border-0 cursor-pointer">
	        	<a href="{{ route('front.category.index', $category->name) }}" class="text-white"> 
				  	<img src="{{ Storage::url($category->image) }}" 
				  		class="card-img category-slider" 
				  		alt="{{ $category->name }}">
				  	
				  	<div class="card-img-overlay border-radius-12">
				    	<h5 class="card-title text-center mt-1 font-size-4"> 
				    		{{ $category->name }} 
				    	</h5>
				    	<p class="card-title text-center text-white font-size-3"> {{ $category->product_category_count }} პროდუქცია 
				    	</p>
				  	</div>
			  	</a>
			</div>
	    @endforeach

	</div>
</div>