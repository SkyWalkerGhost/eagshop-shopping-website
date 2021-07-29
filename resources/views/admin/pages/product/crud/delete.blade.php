<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_{{ $loop->iteration }}">
  <i class="fa fa-trash icon-size"></i>
</button>

<div class="modal fade" id="delete_{{ $loop->iteration }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> 
                        <i class="fa fa-trash"></i>
                        გსურთ ამ პროდუქციის წაშლა - {{ $product->name }} ? 
                    </h5>
                </div>

            <div class="modal-body">
                {!! Form::open(['action' => ['Admin\ProductController@destroy', $product->id], 'method' => 'POST' ]) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::button('გაუქმება', ['type' => 'submit', 
                                                'class' => 'btn btn-info', 
                                                'data-dismiss' => 'modal']) !!}
                {!! Form::button('წაშლა', ['type' => 'submit', 'class' => 'btn btn-danger border-0']) !!}
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>