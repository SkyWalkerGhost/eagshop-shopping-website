<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#show_{{ $loop->iteration }}">
    <i class="fa fa-eye icon-size"></i>
</button>

<div class="modal fade bd-example-modal-lg" id="show_{{ $loop->iteration }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"> 
                    პროდუქციის დეტალები - {{ $product->name }} </h5>
            </div>
        
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"> # პროდუქციის ID </th>
                            <th scope="col"> რაოდენება </th>
                            <th scope="col"> ერთეულის ფასი </th>
                            <th scope="col"> ფასი ჯამში </th>
                            <th scope="col"> აქციის პროცენტი </th>
                            <th scope="col"> ფასდაკლება </th>
                            <th scope="col"> ახალი ფასი </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th scope="row"> {{ $product->product_id }} </th>
                            <td> {{ number_format($product->quantity) }} </td>
                            
                            <td> 
                                <span class="badge bg-green">
                                    {{ $product->price }} 
                                    <sub> ₾ </sub>
                                </span>
                            </td>
                            
                            <td> {{ number_format($product->price_in_total) }} 
                                <sub> ₾ </sub> 
                            </td>
                            
                            <td>
                                <span class="badge bg-info">
                                    {{ $product->action_percent }}%
                                </span>
                            </td>
                            
                            <td> 
                                <span class="badge bg-red">
                                    - {{ $product->discount }} 
                                    <sub> ₾ </sub>
                                </span> 
                            </td>

                            <td> 
                                <span class="badge bg-blue">
                                    {{ $product->action_price }} 
                                    <sub> ₾ </sub>
                                </span> 
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    დახურვა
                </button>
            </div>
        </div>
    </div>
</div>
