<header class="header clearfix">
	<div class="top-header-group">
	    <div class="top-header">
	        
	        <div class="res_main_logo">
	            <a href="{{ route('front.index') }}">
	            	<img src="{{  asset('front/images/dark-logo-1.svg') }}" alt="" />
	            </a>
	        </div>
	        
	        <div class="main_logo" id="logo">
	            
	            <a href="{{ route('front.index') }}"> 
	            	<img src="{{ asset('front/images/logo.svg') }}" alt="" />
	            </a>

	            <a href="{{ route('front.index') }}"> 
	            	<img class="logo-inverse" src="{{ asset('front/images/dark-logo.svg') }}" alt="" />
	            </a>

	        </div>

	        <div class="search120">
	            <div class="ui search">
	                <div class="ui left icon input swdh10">
	                	<input class="prompt srch10" type="text" placeholder="ძიება ..." /> 
	                	<i class="uil uil-search-alt icon icon1"></i>
	                </div>
	            </div>
	        </div>

	        <div class="header_right">
	            <ul>
	                <li>
	                    <a href="#" class="offer-link">
	                    	<i class="uil uil-phone-alt"></i> 
	                    	+ 995 571 051 269 
	                    </a>
	                </li>

	                <li>
	                    <a href="faq.html" class="offer-link">
	                    	<i class="uil uil-question-circle"></i>
	                    	დახმარება
	                    </a>
	                </li>

	                <li>
	                    <a href="dashboard_my_wishlist.html" class="option_links" title="Wishlist">
	                    	<i class="uil uil-heart icon_wishlist"></i>
	                    	<span class="noti_count1">3</span>
	                    </a>
	                </li>

	                @if(Auth::guard('shop_user')->check())
            
			            <li class="ui dropdown">
		                    <a href="#" class="opts_account"> 
		                    	<img src="{{ asset('front/images/avatar/img-5.jpg') }}" alt="" /> 
		                    	<span class="user__name"> 
		                    		{{ Auth::guard('shop_user')->user()->name }}
		                    	</span> 
		                    	<i class="uil uil-angle-down"></i> 
		                    </a>

		                    <div class="menu dropdown_account">
		                        
		                        <div class="night_mode_switch__btn">
		                            <a href="#" id="night-mode" class="btn-night-mode">
		                                <i class="uil uil-moon"></i> Night mode 
		                                <span class="btn-night-mode-switch"> 
		                                	<span class="uk-switch-button"></span> 
		                                </span>
		                            </a>
		                        </div>

		                        <a href="dashboard_overview.html" class="item channel_item"> 
		                        	<i class="uil uil-apps icon__1"></i> 
		                        	პროფილი 
		                        </a>

		                        <a href="{{ route('front.account.cart') }}" class="item channel_item"> 
		                        	<i class="uil uil-shopping-cart-alt icon__1"></i> 
		                        	კალათა
		                        </a>

		                        <a href="{{ route('front.account.wishlist') }}" class="item channel_item"> 
		                        	<i class="uil uil-heart icon__1"></i> 
		                        	სურვილების სია 
		                        </a>

		                        <a href="dashboard_my_addresses.html" class="item channel_item"> 
		                        	<i class="uil uil-location-point icon__1"></i> 
		                        	ჩემი მისამართი 
		                        </a>

		                        <a href="#" class="item channel_item"> 
		                        	<form action="{{ route('auth.logout_shop_user') }}" method="POST">
		                        		@csrf
		                        		<button class="bg-none border-0">
		                        			<i class="uil uil-lock-alt icon__1"></i>
		                        			გასვლა
		                        		</button>
		                        	</form>
		                        </a>
		                    </div>

	                	</li>

			        @else

			            <li class="ui dropdown">
		                    <a href="#" class="opts_account"> 
		                    	<img src="{{ asset('front/images/avatar/img-5.jpg') }}" alt="" /> 
		                    	<span class="user__name"> 
		                    		ავტორიზაცია
		                    	</span> 
		                    	<i class="uil uil-angle-down"></i> 
		                    </a>

		                    <div class="menu dropdown_account">
		                        
		                        <div class="night_mode_switch__btn">
		                            <a href="#" id="night-mode" class="btn-night-mode">
		                                <i class="uil uil-moon"></i> Night mode 
		                                <span class="btn-night-mode-switch"> 
		                                	<span class="uk-switch-button"></span> 
		                                </span>
		                            </a>
		                        </div>

		                        <a href="{{ route('auth.shop_login') }}" class="item channel_item"> 
		                        	<i class="uil uil-apps icon__1"></i> 
		                        	ავტორიზაცია 
		                        </a>

		                        <a href="{{ route('auth.shop_user_register') }}" class="item channel_item"> 
		                        	<i class="uil uil-gift icon__1"></i> 
		                        	რეგისტრაცია 
		                        </a>

		                    </div>

	                	</li>
			            
			        @endif

	            </ul>
	        </div>
	    </div>
	</div>
	<div class="sub-header-group">
	    <div class="sub-header">
	        <div class="ui dropdown">
	            <a href="#" class="category_drop hover-btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i><span class="cate__icon">Select Category</span></a>
	        </div>
	        <nav class="navbar navbar-expand-lg navbar-light py-3">
	            <div class="container-fluid">
	                <button class="navbar-toggler menu_toggle_btn" type="button" data-target="#navbarSupportedContent">
	                	<i class="uil uil-bars"></i>
	                </button>

	                <div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu" id="navbarSupportedContent">
	                    
	                    <ul class="navbar-nav main_nav align-self-stretch">
	                        
	                        <li class="nav-item">
	                        	<a href="{{ route('front.index') }}" class="nav-link active" title="მთავარი გვერდი">
	                        		<i class="fa fa-home"></i>
	                        		მთავარი 
	                    		</a>
	                    	</li>


	                        <li class="nav-item">
	                        	<a href="contact_us.html" class="nav-link" title="Contact"> 
	                        		<i class="fa fa-map-marker" aria-hidden="true"></i>
									კონტაქტი 
	                        	</a>
	                        </li>

	                        <li class="nav-item">
	                        	<a href="contact_us.html" class="nav-link" title="Contact"> 
	                        		<i class="fa fa-paper-plane" aria-hidden="true"></i>
									მიტანის მეთოდი 
	                        	</a>
	                        </li>

	                    </ul>
	                </div>
	            </div>
	        </nav>
	        <div class="catey__icon">
	            <a href="#" class="cate__btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i></a>
	        </div>

	        <div class="header_cart order-1">
        	    <a href="#" class="cart__btn hover-btn pull-bs-canvas-left" title="Cart">
			        <i class="uil uil-shopping-cart-alt"></i>
			        <span> კალათა </span>
			        <i class="uil uil-angle-down"></i>
			    </a>
	        </div>

	        <div class="search__icon order-1">
	            <a href="#" class="search__btn hover-btn" data-toggle="modal" data-target="#search_model" title="Search"><i class="uil uil-search"></i></a>
	        </div>
	    </div>
	</div>
</header>