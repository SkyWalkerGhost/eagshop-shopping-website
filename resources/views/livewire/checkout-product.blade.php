<div class="col-lg-8 col-md-7">
    <div id="checkout_wizard" class="checkout accordion left-chck145">
        <div class="checkout-step">
            <div class="checkout-card" id="headingOne">
                    @forelse($myAddress as $address)
                        <ul>
                            <li>
                                <input type="checkbox" name="">
                                {{ $address->city }}, {{ $address->street_address }}
                            </li>
                        </ul>
                    @empty
                        <h4> მისამართები არ არის </h4>
                    @endforelse
            </div>
    
        </div>
    
    </div>
</div>

<div class="col-lg-4 col-md-5">
    <div class="pdpt-bg mt-0">
        <div class="pdpt-title">
            <h4> შეკვეთის შედეგი </h4>
        </div>
        <div class="right-cart-dt-body">
            <div class="cart-item border_radius">
                <div class="cart-product-img">
                    <img src="images/product/img-11.jpg" alt="" />
                    <div class="offer-badge">4% OFF</div>
                </div>
                <div class="cart-text">
                    <h4>Product Title Here</h4>
                    <div class="cart-item-price">
                        $15 <span>$18</span>
                    </div>
                    <button type="button" class="cart-close-btn">
                        <i class="uil uil-multiply"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="total-checkout-group">
            <div class="cart-total-dil">
                <h4>Gambo Super Market</h4>
                <span>$15</span>
            </div>
            <div class="cart-total-dil pt-3">
                <h4>Delivery Charges</h4>
                <span>$1</span>
            </div>
        </div>
        <div class="cart-total-dil saving-total">
            <h4>Total Saving</h4>
            <span>$3</span>
        </div>
        <div class="main-total-cart">
            <h2>Total</h2>
            <span>$16</span>
        </div>
        <div class="payment-secure">
            <i class="uil uil-padlock"></i>Secure checkout
        </div>
    </div>
    <a href="#" class="promo-link45">Have a promocode?</a>
    <div class="checkout-safety-alerts">
        <p><i class="uil uil-sync"></i>100% Replacement Guarantee</p>
        <p><i class="uil uil-check-square"></i>100% Genuine Products</p>
        <p><i class="uil uil-shield-check"></i>Secure Payments</p>
    </div>
</div>



