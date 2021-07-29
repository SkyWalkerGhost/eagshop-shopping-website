    <div class="col-lg-8 col-md-7">
        <div class="pdpt-bg">
                
            <div class="pdpt-title">
                <h4> შეკვეთები (<i class="fa fa-shopping-cart"></i> {{ count($orders) }}) </h4>
            </div>
            
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"> # </th>
                        <th scope="col"> სურათი </th>
                        <th scope="col"> სახელი </th>
                        <th scope="col"> ფასი </th>
                        <th scope="col"> რაოდენობა </th>
                        <th scope="col"> ჯამი </th>
                        <th scope="col"> <i class="fa fa-trash"></i> </th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($orders as $order)
                        @foreach($order->product as $product)
                        <tr>
                            <th scope="row"> {{ $loop->iteration }} </th>
                            
                            <td>
                                @if($product->image)
                                    <img    src="{{ Storage::url($product->image) }}" 
                                            alt="{{ $product->name }}" 
                                            style="width: 50px; height: 50px;">
                                @else
                                    <img src="{{ asset('front/images/no-image.png') }}" 
                                        style="width: 50px; height: 50px;" alt="">
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('front.show.index', 
                                    [$product->product_id, Str::slug($product->name, '-')]) }}" class="text-black">
                                    {{ Str::limit($product->name, 30) }}
                                </a>
                            </td>

                            <td> 
                                <div class="text-red font-weight-bold font-size-3">
                                    {{ $product->priceWithDiscountAndWithoutDiscount() }} 
                                </div>
                            </td>

                                @foreach($order->cart as $cart)
                                <td>
                                    <span   data-inverted="" 
                                            data-tooltip="შეკვეთილი პროდუქციის რაოდენობა: {{ $cart->quantity }}" 
                                            data-position="top center"
                                            class="ml-5">
                                        <i class="fa fa-shopping-cart"></i>
                                        {{ $cart->quantity }}
                                    </span>
                                </td>

                                <td>
                                    <b> ₾{{ $cart->product_total_price }} </b>
                                </td>
                                @endforeach

                            <td>
                                <form wire:submit.prevent="removeFromOrder({{ $order->order_id }})" action="POST">
                                    @csrf
                                
                                    <button wire:click.prevent="removeFromOrder({{ $order->order_id }})" 
                                            type="button" 
                                            class="btn btn bg-dark text-white hover-btn rounded mb-1 border-0">

                                            <span   data-inverted="" 
                                                    data-tooltip="პროდუქციის შეკვეთებიდან წაშლა" 
                                                    data-position="top center">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @empty
                        <td> 
                            <b> პროდუქცია არ არის დამატებული შეკვეთებში </b>
                        </td>
                    @endforelse

                </tbody>
            </table>




        </div>
    </div>

    <div class="col-lg-4 col-md-5">
        <div class="pdpt-bg">
            <div class="pdpt-title">
                <h4> შეკვეთის შედეგი </h4>
            </div>
     
            <div class="total-checkout-group">
                <div class="cart-total-dil">
                    <h4> პროდუქციის რაოდენობა: </h4>
                    <span> {{ count($orders) }} </span>
                </div>
            </div>
      
            <div class="main-total-cart">
                <h2> გადასახდელი თანხა </h2>
                <span>
                    @php
                        $total = 0;
                    @endphp

                    @foreach($orders as $order)
                        @foreach($order->cart as $cart)
                     
                        @php
                            $total += $cart->product_total_price;
                        @endphp

                        @endforeach
                    @endforeach

                    ₾{{ $total }}
                
                </span>
            </div>
          
        </div>


        <div class="checkout-safety-alerts">
            <p>
                <i class="uil uil-sync"></i> 
                100% დაბრუნების გარანტია 
            </p>
        </div>
    </div>



