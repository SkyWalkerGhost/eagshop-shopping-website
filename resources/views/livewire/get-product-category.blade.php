<div>
    <div class="body table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th> # </th>
                    <th> სურათი </th>
                    <th> კატეგორია </th>
                    <th> % </th>
                    <th> რაოდენობა </th>
                    <th> რედაქტირება </th>
                    <th> წაშლა </th>
                </tr>
            </thead>

            <tbody>

                @forelse($categories as $category)
                <tr>
                    <th scope="row"> {{ $loop->iteration }} </th>

                    <td>
                        <img src="{{ Storage::url($category->image) }}" style="width: 50px; height: 50px;">
                    </td>

                    <td>
                        <i class="fa fa-tag"></i>
                        {{ $category->name }}
                    </td>

                    <td style="width: 50%;">
                        <div class="progress" style="height: 10px;">
                            <div    class="progress-bar bg-success" 
                                    role="progressbar" 
                                    style="width: {{ $category->product_category_count }}%" 
                                    aria-valuenow="25" 
                                    aria-valuemin="0" 
                                    aria-valuemax="100">
                            </div>
                        </div>
                    </td>

                    <td> {{ number_format($category->product_category_count) }} </td>
                    
                    <td> 
                        @include('livewire.partials.update_category')
                    </td>

                    <td>
                        <form wire:submit.prevent="delete({{ $category->id }})">
                            @csrf                            
                            <button wire:click.prevent='delete({{ $category->id }})' 
                                    class="btn btn-danger waves-effect">
                                <i class="fa fa-trash icon-size"></i> წაშლა 
                            </button> 
                        </form>
                    </td>

                </tr>
                
                @empty
                    <tr>
                        <td>
                            პროდუქციის კატეგორიები არ მოიძებნა
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>
        
        <a wire:click="loadMoreCategory" class="btn btn-primary waves-effect" style="cursor: pointer;">
            მაჩვენე მეტი
        </a>

    </div>
</div>
