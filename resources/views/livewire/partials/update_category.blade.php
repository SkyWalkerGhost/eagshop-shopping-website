<button type="button" 
        class="btn btn-primary waves-effect m-r-20" 
        data-toggle="modal" 
        data-target="#edit_{{ $loop->iteration }}">
        <i class="fa fa-edit icon-size"></i> რედ.
</button>

<div    wire:ignore.self 
        class="modal fade" 
        id="edit_{{ $loop->iteration }}"
        data-backdrop="static"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true" 
        tabindex="-1" 
        role="dialog">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel"> 
                    კატეგორიის განახლება 
                </h4>
            </div>

            <div class="modal-body">
                <form   wire:submit.prevent="update({{ $category->id }})" 
                        method="POST">
                    @csrf

                    <div class="row">

                        @if(Session::has('success'))
                            <script> toastr.success("{{ session('success') }}"); </script>
                        @endif

                        @if(Session::has('info'))
                            <script> toastr.info("{{ session('info') }}"); </script>
                        @endif
                        
                        <div class="col-md-6 mb-1">

                            <div class="form-group">
                                <div class="form-line">
                                    <input  wire:model.defer='name' 
                                            type="text" 
                                            class="form-control"
                                            value="{{ $category->name }}" 
                                            placeholder="კატეგორიის სახელი">
                                </div>
                                @error('name') 
                                    <span class="text-danger font-weight-bold"> 
                                        {{ $message }} 
                                    </span> 
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6 mb-1">
                            <div class="form-group">
                                <div class="form-line disabled">
                                    <input  type="text" 
                                            class="form-control"
                                            placeholder="{{ $category->name }}"
                                            disabled
                                            style="background: #e9ecef; text-indent: 10px;">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            
                            <div class="form-line">
                                <div    x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false; progress = 0"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                                            
                                    <input wire:model.defer='image' type="file" class="form-control">

                                    <div x-show="isUploading">
                                        <div class="progress mb-1">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated progress-sm bg-primary" x-bind:style="`width: ${progress}%`"></div>
                                        </div>
                                        <div class="font-weight-bold" wire:loading wire:target="image"> 
                                            მიმდინარეობს ატვირთვა... 
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            @error('image') 
                                <span class="text-danger font-weight-bold"> 
                                    {{ $message }} 
                                </span> 
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <button wire:click.prevent="update({{ $category->id }})"
                                type="button" 
                                class="btn btn-primary waves-effect">
                            <i class="fa fa-edit"></i>
                            განახლება
                        </button>

                        <button type="button" 
                                class="btn btn-danger waves-effect" 
                                data-dismiss="modal"> 
                            <i class="fa fa-times"></i>
                            დახურვა 
                        </button>
                        </div>
                    
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>