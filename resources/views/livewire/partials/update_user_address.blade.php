<div wire:ignore.self
    class="modal fade"
    id="update_{{ $loop->iteration }}"
    data-backdrop="static"
    tabindex="-1"
    role="dialog"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <i class="uil uil-location-point"></i>
                    მისამართის დამატება 
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent='updateAddress({{ $address->id }})' method="POST">
                    @csrf
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> ქუჩის მისამართი </label>
                                <input  wire:model.defer='street_address' 
                                        type="text"
                                        value="{{ $address->street_address }}" 
                                        placeholder="შეიყვანეთ თქვენი მისამართი" 
                                        class="form-control">
                            @error('street_address') 
                                <span class="text-danger font-weight-bold"> 
                                    {{ $message }} 
                                </span> 
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> მიუთითე ქალაქი </label>
                                <select wire:model.defer='city' class="form-control">
                                    <option selected> არჩეული ქ. {{ $address->city }} </option>
                                    <option value="თბილისი"> თბილისი </option>
                                    <option value="ბათუმი"> ბათუმი </option>
                                    <option value="ქუთაისი"> ქუთაისი </option>
                                </select>
                                @error('city') 
                                    <span class="text-danger font-weight-bold"> 
                                        {{ $message }} 
                                    </span> 
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> პირადი ნომერი </label>
                                <input  wire:model.defer='id_card_number' 
                                        type="text" 
                                        placeholder="პირადი ნომერი: XXXXXXXXXXX" 
                                        class="form-control">
                                @error('id_card_number') 
                                    <span class="text-danger font-weight-bold"> 
                                        {{ $message }} 
                                    </span> 
                                @enderror
                            </div>
                        </div>
                    
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            დახურვა
                        </button>

                        <button wire:click.prevent='updateAddress({{ $address->id }})' 
                                class="btn btn bg-danger text-white hover-btn">
                            დამატება
                        </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>