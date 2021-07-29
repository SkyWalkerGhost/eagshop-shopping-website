<div>
    <form wire:submit.prevent="store" method="POST">
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
                        <input wire:model.defer='name' type="text" class="form-control" placeholder="კატეგორიის სახელი">
                    </div>
                    @error('name') 
                        <span class="text-danger font-weight-bold"> 
                            {{ $message }} 
                        </span> 
                    @enderror
                </div>

            </div>

            <div class="col-md-6">
                
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
                <button wire:click.prevent="store" class="btn btn-primary waves-effect ml-3"> 
                    <i class="fa fa-plus-circle"></i>
                    დამატება 
                </button>
            </div>
        
        </div>
    </form>
</div>