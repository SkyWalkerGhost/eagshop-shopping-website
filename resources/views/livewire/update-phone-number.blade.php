<div>
<!-- Modal -->
    <div wire:ignore.self class="modal fade" id="update_phone" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> დაამატე მობილურის ნომერი </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form wire:submit.prevent='phone'>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                    </div>
                                    <input wire:model.defer='phone1' type="number" class="form-control" placeholder="მობილურის ნომერი" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                    @error('phone1') 
                                        <span class="text-danger font-weight-bold"> 
                                            {{ $message }} 
                                        </span> 
                                    @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                    </div>
                                    <input wire:model.defer='phone2' type="number" class="form-control" placeholder="მობილურის ნომერი" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                    @error('phone2') 
                                        <span class="text-danger font-weight-bold"> 
                                            {{ $message }} 
                                        </span> 
                                    @enderror
                            </div>

                            <div class="col-md-12">
                                <button wire:clicl.prevent='phone' 
                                        class="btn btn-dark hover-btn border-0 float-right"> 
                                    განახლება 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
