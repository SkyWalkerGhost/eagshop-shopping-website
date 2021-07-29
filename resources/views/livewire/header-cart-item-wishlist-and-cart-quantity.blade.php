<div>
    <div wire:ignore.self class="bs-canvas bs-canvas-left position-fixed bg-cart h-100">
        <div class="bs-canvas-header side-cart-header p-3 ">
            <div class="d-inline-block  main-cart-title"> 
                ჩემი კალათა <span> ({{ count($itemsInCart) }} პროდუქტი) </span>
            </div>
            <button type="button" class="bs-canvas-close close" aria-label="Close">
                <i class="uil uil-multiply"></i>
            </button>
        </div>

        <div class="bs-canvas-body">

            <div class="side-cart-items">
                
                @forelse($itemsInCart as $cart)
                    
                    @foreach($cart->product as $product)
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


                            <div class="qty-group">
                                <div class="quantity buttons_added">

                                    <span data-inverted="" data-tooltip="ამ პროდუქციის რაოდენობა კალათაში: ({{ $cart->quantity }})" data-position="top center">
                                        <i class="fa fa-shopping-cart"></i>
                                        ({{ $cart->quantity }})
                                    </span>

                                </div>

                                <div class="cart-item-price">
                                    {{ $product->priceWithDiscountAndWithoutDiscount() }}

                                    <span title="ძველი ფასი: {{ $product->showOldPrice() }}">
                                        {{ $product->showOldPrice() }}
                                    </span>
                                </div>
                            </div>

                            <form wire:submit.prevent="removeProduct({{ $cart->cart_id }})" action="POST">
                                @csrf
                                
                                <button wire:click.prevent="removeProduct({{ $cart->cart_id }})" 
                                        type="button" 
                                        class="cart-close-btn">
                                    <i class="fa fa-trash" title="პროდუქციის კალათიდან წაშლა"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                @empty
                    <h4 class="mt-5 p-5">
                        <i class="fa fa-shopping-cart"></i>
                        პროდუქცია კალათაში არ მოიძებნა
                    </h4>
                @endforelse

            </div>

        </div>

        <div class="bs-canvas-footer">
            
            <div class="cart-total-dil saving-total ">
                <h4> პროდუქტი </h4>
                <span> {{ count($itemsInCart) }} </span>
            </div>
        </div>
    </div>

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
                    {{ Form::open(['action' => ['PageController@search'], 'method' => 'GET' ]) }}
                        <div class="ui search">
                            <div class="ui left icon input swdh10">
                                <input name="name" class="prompt srch10" type="text" placeholder="ძიება ...">
                                <i class="uil uil-search-alt icon icon1"></i>
                            </div>
                        </div>
                    {{ Form::close() }}
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

                        @if(Auth::guard('shop_user')->check())
                            <li>
                                <a  href="{{ route('front.account.wishlist') }}"
                                    class="option_links" 
                                    title="Wishlist">
                                    <i class="uil uil-heart icon_wishlist"></i>
                                    <span class="noti_count1">
                                        {{ $wishlistQuantity }}
                                    </span>
                                </a>
                            </li>
                
                            <li class="ui dropdown">
                                <a href="#" class="opts_account">
                                    @if(Auth::guard('shop_user')->user()->photo_path) 
                                        <img src="{{ Storage::url(auth()->guard('shop_user')->user()->photo_path) }}" alt="" />
                                    @else 
                                        <img src="{{ asset('front/images/avatar/img-5.jpg') }}" alt="" /> 
                                    @endif
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

                                    <a href="{{ route('front.account.dashboard') }}" class="item channel_item"> 
                                        <i class="uil uil-apps icon__1"></i> 
                                        პროფილი 
                                    </a>

                                    <a href="{{ route('front.account.order') }}" class="item channel_item"> 
                                        <i class="uil uil-box"></i> 
                                        შეკვეთები
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
                        <span> კალათა ({{ count($itemsInCart) }}) </span>
                        <i class="uil uil-angle-down"></i>
                    </a>
                </div>

                <div class="search__icon order-1">
                    <a href="#" class="search__btn hover-btn" data-toggle="modal" data-target="#search_model" title="Search"><i class="uil uil-search"></i></a>
                </div>
            </div>
        </div>
    </header>

</div>
