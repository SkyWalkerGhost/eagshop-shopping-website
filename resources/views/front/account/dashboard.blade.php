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
		                        <li class="breadcrumb-item active" aria-current="page">
		                            ანგარიში
		                        </li>
		                    </ol>
		                </nav>
		            </div>
		        </div>
		    </div>
		</div>
		
		<div class="dashboard-group">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		                @include('front.account.components.user_profile')
		            </div>
		        </div>
		    </div>
		</div>

		<div class="container">
		    <div class="row">
		        
		        <div class="col-lg-3 col-md-4">
		            @include('front.account.components.sidebar')
		        </div>
		        
		        <div class="col-lg-9 col-md-8">
		            <div class="dashboard-right">
		                <div class="row">
		                    <div class="col-md-12">
		                        <div class="main-title-tab">
		                            <h4><i class="uil uil-apps"></i>Overview</h4>
		                        </div>
		                        <div class="welcome-text">
		                            <h2>Hi! John Doe</h2>
		                        </div>
		                    </div>
		                    <div class="col-lg-6 col-md-12">
		                        <div class="pdpt-bg">
		                            <div class="pdpt-title">
		                                <h4>My Rewards</h4>
		                            </div>
		                            <div class="ddsh-body">
		                                <h2>6 Rewards</h2>
		                                <ul>
		                                    <li>
		                                        <a
		                                            href="#"
		                                            class="small-reward-dt hover-btn"
		                                            >Won $2</a
		                                        >
		                                    </li>
		                                    <li>
		                                        <a
		                                            href="#"
		                                            class="small-reward-dt hover-btn"
		                                            >Won 40% Off</a
		                                        >
		                                    </li>
		                                    <li>
		                                        <a
		                                            href="#"
		                                            class="small-reward-dt hover-btn"
		                                            >Caskback $1</a
		                                        >
		                                    </li>
		                                    <li>
		                                        <a href="#" class="rewards-link5"
		                                            >+More</a
		                                        >
		                                    </li>
		                                </ul>
		                            </div>
		                            <a href="#" class="more-link14"
		                                >Rewards and Details
		                                <i class="uil uil-angle-double-right"></i
		                            ></a>
		                        </div>
		                    </div>
		                    <div class="col-lg-6 col-md-12">
		                        <div class="pdpt-bg">
		                            <div class="pdpt-title">
		                                <h4>My Orders</h4>
		                            </div>
		                            <div class="ddsh-body">
		                                <h2>2 Recently Purchases</h2>
		                                <ul class="order-list-145">
		                                    <li>
		                                        <div class="smll-history">
		                                            <div class="order-title">
		                                                2 Items
		                                                <span
		                                                    data-inverted=""
		                                                    data-tooltip="2kg broccoli, 1kg Apple"
		                                                    data-position="top center"
		                                                    >?</span
		                                                >
		                                            </div>
		                                            <div class="order-status">
		                                                On the way
		                                            </div>
		                                            <p>$22</p>
		                                        </div>
		                                    </li>
		                                </ul>
		                            </div>
		                            <a href="#" class="more-link14"
		                                >All Orders
		                                <i class="uil uil-angle-double-right"></i
		                            ></a>
		                        </div>
		                    </div>
		                    <div class="col-lg-12 col-md-12">
		                        <div class="pdpt-bg">
		                            <div class="pdpt-title">
		                                <h4>My Wallet</h4>
		                            </div>
		                            <div class="wllt-body">
		                                <h2>Credits $100</h2>
		                                <ul class="wallet-list">
		                                    <li>
		                                        <a href="#" class="wallet-links14"
		                                            ><i class="uil uil-card-atm"></i
		                                            >Payment Methods</a
		                                        >
		                                    </li>
		                                    <li>
		                                        <a href="#" class="wallet-links14"
		                                            ><i class="uil uil-gift"></i>3
		                                            offers Active</a
		                                        >
		                                    </li>
		                                    <li>
		                                        <a href="#" class="wallet-links14"
		                                            ><i class="uil uil-coins"></i>Points
		                                            Earning</a
		                                        >
		                                    </li>
		                                </ul>
		                            </div>
		                            <a href="#" class="more-link14"
		                                >Rewards and Details
		                                <i class="uil uil-angle-double-right"></i
		                            ></a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

	</div>

@endsection