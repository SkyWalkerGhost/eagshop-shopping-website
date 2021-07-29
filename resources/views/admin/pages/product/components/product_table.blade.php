<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th> # </th>
                <th> სურათი </th>
                <th> სახელი </th>
                <th> კატეგორია </th>
                <th> რაოდენობა </th>
                <th> ფასი </th>
                <th> აქციის % </th>
                <th> ზომა </th>
                <th> მოქმედება </th>
            </tr>
        </thead>
        
        <tbody>

            @forelse($products as $product)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> 
                    <img src="{{ Storage::url($product->image) }}" style="width: 40px; height: 40px;">
                </td>
                
                <td> 
                    <a href="#" title="{{ $product->name }}">
                        {{ Str::limit($product->name, 25) }}
                    </a>  
                </td>
                <td> <i class="fa fa-tag"></i> {{ $product->category }} </td>
                <td> {{ number_format($product->quantity) }} </td>
                
                <td> 
                    <span class="badge bg-green" title="ერთეულის ფასი: ({{ $product->price }})"> 
                        {{ $product->price }}
                        <sub> ₾ </sub>
                    </span> 
                    
                    <span class="badge bg-info" title="მთლიანი ფასი: ({{ $product->price_in_total }})"> 
                        ({{ number_format($product->price_in_total) }})
                        <sub> ₾ </sub> 
                    </span> 

                </td>
                
                <td> 
                    <span class="badge bg-info">
                        {{ $product->action_percent }}%
                    </span>
                </td>
                
                <td> {{ $product->size ?? '' }} </td>

                <td>
                    @include('admin.pages.product.partials.show_product_item')
                    @include('admin.pages.product.crud.update')
                    @include('admin.pages.product.crud.delete')
                </td>

            </tr>
            @empty
                <tr>
                    <td> პროდუქტები არ მოიძებნა </td>
                </tr>
            @endforelse
        </tbody>

        <tfoot>
            <tr>
                <th> # </th>
                <th> სურათი </th>
                <th> სახელი </th>
                <th> კატეგორია </th>
                <th> რაოდენობა </th>
                <th> ფასი </th>
                <th> აქციის % </th>
                <th> ზომა </th>
                <th> მოქმედება </th>
            </tr>
        </tfoot>


    </table>

</div>

{{ $products->links() }}