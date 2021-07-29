{!! Form::open(['action' => ['Admin\ProductController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">

        <div class="col-md-8">
            <div class="input-group form-float">
           
                <div class="form-line">
                    <label> 
                        <i class="fa fa-align-center icon-size"></i> 
                            პროდუქციის სახელი 
                    </label>
                    <input type="text" name="name" class="form-control" placeholder="სახელი" value="{{ old('name') }}">
                </div>
                @error('name') 
                    <span class="text-danger font-weight-bold"> 
                        {{ $message }} 
                    </span> 
                @enderror
            </div>


        </div>

        <div class="col-md-4">
            <label> პროდუქციის კატეგორია </label>
            <select name="category" class="form-control show-tick">
                <option value=""> -- კატეგორია -- </option>
                @foreach($categories as $category)
                    <option value="{{ $category->name }}"> {{ $category->name }} </option>
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
                    <input type="number" name="quantity" class="form-control" placeholder="რაოდენობა" value="{{ old('quantity') }}">
                </div>
                @error('quantity') 
                    <span class="text-danger font-weight-bold"> 
                        {{ $message }} 
                    </span> 
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-group form-float">
                <div class="form-line">
                    <label> ₾ პროდუქციის ფასი </label>
                    <input type="text" name="price" class="form-control" placeholder="ფასი ლარში" value="{{ old('price') }}">
                </div>
                @error('price') 
                    <span class="text-danger font-weight-bold"> 
                        {{ $message }} 
                    </span> 
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <label> აქცია % </label>
            <select name="action_percent" class="form-control show-tick">
                <option value=""> -- აქცია -- </option>
                <option selected value="0"> 0% </option>
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
                        პროდუქციის სურათ(ებ)ი  
                    </label>
                    <input type="file" name="image" class="form-control">
                </div>
                @error('image') 
                    <span class="text-danger font-weight-bold"> 
                        {{ $message }} 
                    </span> 
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <button class="btn btn-primary waves-effect" type="submit"> 
                <i class="fa fa-plus-circle"></i> დამატება 
            </button>
        </div>
    </div>
{!! Form::close() !!}