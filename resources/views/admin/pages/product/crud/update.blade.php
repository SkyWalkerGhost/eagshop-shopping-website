<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update_{{ $loop->iteration }}">
  <i class="fa fa-pencil icon-size"></i>
</button>

<!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="update_{{ $loop->iteration }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> 
                        <i class="fa fa-pencil"></i>
                        პროდუქციის რედაქტირება - {{ $product->name }} 
                    </h5>
                </div>

            <div class="modal-body">
                {!! Form::open(['action' => ['Admin\ProductController@update', $product->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">

                        <div class="col-md-8">
                            <div class="input-group form-float">
                           
                                <div class="form-line">
                                    <label> 
                                        <i class="fa fa-align-center icon-size"></i> 
                                            პროდუქციის სახელი 
                                    </label>
                                    <input type="text" name="name" class="form-control" placeholder="სახელი" value="{{ $product->name }}">
                                </div>
                                @error('name') 
                                    <span class="text-danger font-weight-bold"> 
                                        {{ $message }} 
                                    </span> 
                                @enderror
                            </div>


                        </div>

                        <div class="col-md-4">
                            <label> კატეგორია (<span class="text-danger"> 
                                {{ $product->category }} </span>) 
                            </label>
                            <select name="category" class="form-control show-tick">
                                
                                <option> -- კატეგორია -- </option>

                                <option selected value="{{ $product->category }}"> 
                                    {{ $product->category }} 
                                </option>

                                @foreach($categories as $category)
                                    <option value="{{ $category->name }}"> 
                                        {{ $category->name }} 
                                    </option>
                                @endforeach
                            </select>
                            @error('category') 
                                <span class="text-danger font-weight-bold"> 
                                    {{ $message }} 
                                </span> 
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="input-group form-float">
                           
                                <div class="form-line">
                                    <label> 
                                        <i class="fa fa-align-center icon-size"></i> 
                                            პროდუქციის რაოდენობა 
                                    </label>
                                    <input type="number" name="quantity" class="form-control" placeholder="რაოდენობა" value="{{ $product->quantity }}">
                                </div>
                            </div>
                            @error('quantity') 
                                <span class="text-danger font-weight-bold"> 
                                    {{ $message }} 
                                </span> 
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="input-group form-float">
                                <div class="form-line">
                                    <label> ₾ პროდუქციის ფასი </label>
                                    <input type="text" name="price" class="form-control" placeholder="ფასი ლარში" value="{{ $product->price }}">
                                </div>
                            </div>
                            @error('price') 
                                <span class="text-danger font-weight-bold"> 
                                    {{ $message }} 
                                </span> 
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label> აქცია % (<span class="text-danger"> 
                                არჩეული პროცენტი - {{ $product->action_percent }}% </span>) 
                            </label>

                            <select name="action_percent" class="form-control show-tick">
                                <option value=""> -- აქცია -- </option>
                                
                                <option selected value="{{ $product->action_percent }}"> 
                                        {{ $product->action_percent }} %
                                </option>

                                <option value="0"> 0% </option>
                                <option value="10"> 10% </option>
                                <option value="20"> 20% </option>
                                <option value="50"> 50% </option>
                                <option value="60"> 60% </option>
                            </select>
                            @error('action_percent') 
                                <span class="text-danger font-weight-bold"> 
                                    {{ $message }} 
                                </span> 
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label> ზომა (ტანსაცმლის შემთხვევაში) </label>
                            <select name="size" class="form-control show-tick">
                                <option value=""> -- აირჩიე ზომა -- </option>
                                <option value="XS"> XS </option>
                                <option value="S"> S </option>
                                <option value="M"> M </option>
                                <option value="L"> L </option>
                                <option value="XL"> XL </option>
                                <option value="XLL"> XLL </option>
                            </select>
                            @error('size') 
                                <span class="text-danger font-weight-bold"> 
                                    {{ $message }} 
                                </span> 
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="input-group form-float">
                                <div class="form-line">
                                    <label> 
                                        <i class="fa fa-picture-o"></i> 
                                        პროდუქციის სურათი  
                                    </label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            @error('image') 
                                <span class="text-danger font-weight-bold"> 
                                    {{ $message }} 
                                </span> 
                            @enderror
                        </div>
                        
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"> დახურვა </button>
                            <button type="submit" class="btn btn-primary waves-effect"> განახლება </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>