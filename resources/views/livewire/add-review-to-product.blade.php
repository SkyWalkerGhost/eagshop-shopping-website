<div>
    <div class="card border-0">
        <div class="card-body">
            <form wire:submit.prevent='addReview({{ $review_id }})'>  
                @csrf

                <div class="form-group">
                    <select wire:model.defer='star' class="form-control">
                        <option selected="selected"> შეაფასე პროდუქტი </option>
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                        <option value="4"> 4 </option>
                        <option value="5"> 5 </option>
                    </select>
                    @error('star')
                        <span class="text-red font-weight-bold"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea   wire:model.defer='review_name' 
                                class="form-control" 
                                placeholder="შეაფასე ეს პროდუქტი"></textarea>
                    @error('review_name')
                        <span class="text-red font-weight-bold"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button wire:click.prevent='addReview({{ $review_id }})' class="add-cart-btn hover-btn">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        შეფასება
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
