@extends('layouts.app')

	@section('siteTitle', 'პროდუქტების გვერდი')
	
	@section('content')

	@include('msg.message')

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

	<div class="wrapper">

		<div class="gambo-Breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="{{ route('front.index') }}">
										<i class="fa fa-home"></i>
										მთავარი
									</a>
								</li>
								<li class="breadcrumb-item">
									<a href="#"> პროდუქტი </a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									{{ $productView->name }}
								</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>


		<div class="all-product-grid">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="product-dt-view">
							<div class="row">
								
								<div class="col-lg-4 col-md-4">

									@if($productView->image)
								        <img    src="{{ Storage::url($productView->image) }}" 
								                alt="{{ $productView->name }}"
								                class="product-img-item">
								    @else
								        <img src="{{ asset('front/images/product/img-1.jpg') }}" alt="">
								    @endif

								</div>

								<div class="col-lg-8 col-md-8">
									<div class="product-dt-right">
										<h2 class="text-black"> {{ $productView->name }} </h2>
										<div class="no-stock">
											<p class="pd-no"> Product ID 
												<span> {{ $productView->product_id }} </span>
											</p>
											<p class="stock-qty"> მარაგშია 
												<span> ({{ $productView->quantity }}) </span>
											</p>
											<p class="stock-qty"> ნანახია 
												<span> (<i class="fa fa-eye"></i> {{ number_format($getProductView) }})-ჯერ </span>
											</p>
										</div>
										
										<div class="product-group-dt">
											<ul>

												<li>
													<div class="main-price">
														<span class="text-red font-weight-bold">
															@if($productView->action_percent == ProductStatus::ACTION_PERCENT_ZERO)
						                                        ₾ {{ $productView->price }} 
						                                    @else
																ფასდაკლება
						                                        ₾ {{ $productView->discount }} 
						                                    @endif
														</span>
													</div>
												</li>

												@if($productView->action_percent !== ProductStatus::ACTION_PERCENT_ZERO) 
													<li>
														<div class="main-price">
															ახალი ფასი
															<span title="ძველი ფასი">
																{{ $productView->action_price }}
																<sup> 
																	-{{ $productView->action_percent }}% 
																</sup>
															</span>
														</div>
													</li>
			                                    @endif

			                                    @if($productView->action_percent !== ProductStatus::ACTION_PERCENT_ZERO) 
													<li>
														<div class="main-price mrp-price">
															ძველი ფასი
															<span title="ძველი ფასი">
																{{ $productView->price }}
															</span>
														</div>
													</li>
			                                    @endif


											</ul>
											
										
											@livewire('single-product-view-add-to-cart', 
												['cart_id' => $productView->product_id])
										</div>

									</div>

								</div>
							</div>
						</div>
					</div>
				</div>



				<div class="row">

					<div class="col-lg-4 col-md-12">
						<div class="pdpt-bg">
							<div class="pdpt-title">
								<h4> შეაფასე პროდუქტი </h4>
							</div>


						@if(Auth::guard('shop_user')->check())

							@livewire('add-review-to-product', 
								['review_id' => $productView->product_id])
						@else
							<div class="card border-0 text-center">
								<div class="card-body">
									<ul class="ordr-crt-share">
										<li>
											<h4>
												შეფასების გასაკეთებლად საჭიროა
											</h4>
											<a href="{{ route('auth.shop_login') }}" 
												class="add-cart-btn hover-btn p-2">
												ავტორიზაცია
											</a>
											
										</li>

										<li class="mt-3 mb-3">
											<b> ან </b>
										</li>

										<li>
											<a href="{{ route('auth.shop_user_register') }}" 
												class="order-btn hover-btn p-2">
												რეგისტრაცია
											</a>
										</li>
									</ul>
								</div>
							</div>
						@endif

						</div>
					</div>

					<div class="col-lg-8 col-md-12">
						<div class="pdpt-bg">
							<div class="pdpt-title">
								<h4> შეფასებები 
									<span title="შეფასების რაოდენობა">
										({{ count($productReviews) }})
									</span> / 
									
									@if(count($productReviews) == 0)
										<span title="პროდუქციის რეიტინგი არ არის">
											( <i class="fa fa-star"></i> 0 )
										</span>
									@else
										<span title="პროდუქციის რეიტინგი">
											( <i class="fa fa-star"></i> 
											{{ round($productReviews->sum('star') / count($productReviews), 1) }}) 
										</span>
									@endif
								</h4>
							</div>
						
							<div class="pdpt-body scrollstyle_4">
								<div class="pdct-dts-1">

									@forelse($productReviews as $review)
									<div class="pdct-dt-step">
										<h4> {{ $review->user_name }} </h4>
										<p> {{ $review->review_name }} </p>
									</div>
									@empty
										<h4 class="mt-3"> ამ პროდუქციის შეფასებები არ არის </h4>
									@endforelse

								</div>
							</div>
						</div>
					</div>

				</div>


			</div>
		</div>

		<div class="section145">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="main-title-tt">
							<div class="main-title-left">
								<h2> მსგავსი პროდუქცია </h2>
							</div>
						</div>
					</div>

					@foreach($suggestCategory as $product)
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
                                    <img src="{{ asset('front/images/product/img-1.jpg') }}" alt="">
                                @endif

                                <div class="product-absolute-options">
                                    
                                    @if($product->action_percent !== ProductStatus::ACTION_PERCENT_ZERO)
                                        <span class="offer-badge-1 ml-7 mt-1">
                                            {{ $product->action_percent }}%  off
                                        </span>
                                    @endif
                                    
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
                                    @if($product->action_percent == ProductStatus::ACTION_PERCENT_ZERO)
                                        ₾ {{ $product->price }} 
                                    @else
                                        ₾ {{ $product->action_price }} 
                                    @endif

                                    @if($product->action_percent !== ProductStatus::ACTION_PERCENT_ZERO) 
                                        <span title="ძველი ფასი"> 
                                            {{ $product->price }}
                                        </span>
                                    @endif
                                </div>

							</div>
						</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>


	</div>

@endsection