<div>
    @include('msg.message')
    <div wire:ignore.self class="modal fade" id="upload_avatar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> ავატარის შეცვლა </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form wire:submit.prevent="store" method="POST">
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <div    x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false; progress = 0"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    
                                    <input  wire:model.defer='photo_path' 
                                            type="file" 
                                            class="form-control w-100 h-50">

                                    <div x-show="isUploading">
                                        <div class="progress mb-1">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated progress-sm bg-primary" x-bind:style="`width: ${progress}%`"></div>
                                        </div>
                                        <div class="font-weight-bold" wire:loading wire:target="photo_path"> 
                                            მიმდინარეობს ატვირთვა... 
                                        </div>
                                    </div>
                                </div>
                                    @error('photo_path') 
                                        <span class="text-danger font-weight-bold"> 
                                            {{ $message }} 
                                        </span> 
                                    @enderror
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group float-right">
                                <button wire:click.prevent="store" 
                                        class="add-cart-btn hover-btn mt-3"> 
                                    <i class="fa fa-plus-circle"></i> 
                                    დამატება 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
