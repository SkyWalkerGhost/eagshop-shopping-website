@extends('layouts.app')

	@section('siteTitle', 'პროდუქტების გვერდი')
	
	@section('content')

	<div id="category_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
		<div class="modal-dialog category-area" role="document">
			<div class="category-area-inner">
				<div class="modal-header">
					<button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
						<i class="uil uil-multiply"></i>
					</button>
				</div>
				<div class="category-model-content modal-content">
					<div class="cate-header">
						<h4>Select Category</h4>
					</div>
					<ul class="category-by-cat">
						
						<li>
							<a href="shop_grid.html" class="single-cat-item">
								<div class="icon">
									<img src="{{ asset('front/images/category/icon-1.svg') }}" alt="">
								</div>
								<div class="text">Fruits and Vegetables</div>
							</a>
						</li>

					</ul>
					<a href="shop_grid.html" class="morecate-btn"><i class="uil uil-apps"></i>More Categories</a>
				</div>
			</div>
		</div>
	</div>

	<div id="search_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
		<div class="modal-dialog search-ground-area" role="document">
			<div class="category-area-inner">
				<div class="modal-header">
					<button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
						<i class="uil uil-multiply"></i>
					</button>
				</div>
				<div class="category-model-content modal-content">
					<div class="search-header">
						<form action="#">
							<input type="search" placeholder="Search for products...">
							<button type="submit"><i class="uil uil-search"></i>
							</button>
						</form>
					</div>
					<div class="search-by-cat">
						
						<a href="#" class="single-cat">
							<div class="icon">
								<img src="{{ asset('front/images/category/icon-1.svg') }}" alt="">
							</div>
							<div class="text">Fruits and Vegetables</div>
						</a>

					</div>
				</div>
			</div>
		</div>
	</div>

	@livewire('header-cart-item-wishlist-and-cart-quantity')
	
	{{-- @include('front.components.header') --}}

	<div class="wrapper">
		
		<div class="container">
			<div class="section145">
	            <div class="container">
	                <div class="row">
	                    
	                    @include('front.components.category')

	                </div>
	            </div>
	        </div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12 mt-5">
					
					@livewire('get-product')

				</div>
			</div>
		</div>

	</div>

@endsection