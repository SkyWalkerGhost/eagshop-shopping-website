<div class="user-dt">
    
    <div class="user-img">
    	
    	@if(Auth::guard('shop_user')->user()->photo_path)
        	<img src="{{ Storage::url(auth()->guard('shop_user')->user()->photo_path) }}" 
        		alt="{{ auth()->guard('shop_user')->user()->name }}" />
        @else
        	<img src="{{ asset('front/images/avatar/img-5.jpg') }}" alt="{{ auth()->guard('shop_user')->user()->name }}" />
        @endif

        <div class="img-add">
            <label for="file" class="avatar" data-toggle="modal" data-target="#upload_avatar">
            	<i class="fa fa-camera"></i>
            </label>
			@livewire('upload-avatar')
        </div>
    </div>


    <h4> {{ Auth::guard('shop_user')->user()->name }} </h4>
    <p>
    	@if(auth()->guard('shop_user')->user()->phone1)
        	{{ auth()->guard()->user()->phone1 }}
        	{{ auth()->guard()->user()->phone2 }}
        @else
        	დაამატე მობილურის ნომერი
        @endif
        <a href="#" data-toggle="modal" data-target="#update_phone">
        	<i class="fa fa-phone"></i>
        </a>

        @livewire('update-phone-number')
    </p>
    <div class="earn-points">
        <img src="{{ asset('front/images/Dollar.svg') }}" alt="" /> ქულები :
        <span>20</span>
    </div>
</div>