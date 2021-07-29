<div>
    <a  href="#"
        class="add-address hover-btn"
        data-toggle="modal"
        data-target="#create_user_address"> 
        <i class="uil uil-location-point"></i>
        დაამატე ახალი მისამართი 
    </a>

    @include('livewire.partials.create_user_address')


    @forelse($myAddress as $address)
        <div class="address-item">
            <div class="address-icon1">
                <i class="uil uil-home-alt"></i>
            </div>

            <div class="address-dt-all">
                <h4> {{ $address->city }} </h4>
                
                <p>
                    {{ $address->street_address }}
                </p>

                <ul class="action-btns">
                    
                    <li>
                        <a  href="#" class="action-btn"
                            class="add-address hover-btn"
                            data-toggle="modal"
                            data-target="#update_{{ $loop->iteration }}"> 
                            <i class="fa fa-edit"></i>
                        </a>

                        @include('livewire.partials.update_user_address')
                    </li>

                    <li>
                        <form wire:submit.prevent='removeAddress({{ $address->id }})'>
                            @csrf
                            <a wire:click.prevent='removeAddress({{ $address->id }})' class="action-btn">
                                <i class="fa fa-trash"></i>
                            </a>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    @empty
        მისამართები არ არის დამატებული
    @endforelse

</div>
