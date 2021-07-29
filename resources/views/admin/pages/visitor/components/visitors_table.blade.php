<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th> # </th>
                <th> IP </th>
                <th> Browser </th>
                <th> Platform </th>
                <th> Phone </th>
                <th> Desktop </th>
                <th> Country </th>
                <th> City </th>
                <th> Action </th>
            </tr>
        </thead>
        
        <tbody>

            @forelse($visitorData as $visitor)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $visitor->user_ip }} </td>
                <td> <i class="fa fa-globe"></i> {{ $visitor->browser }} </td>
                <td> <i class="fa fa-laptop"></i> {{ $visitor->platform }} </td>
                <td> <i class="fa fa-mobile"></i> {{ $visitor->is_phone }} </td>
                <td> <i class="fa fa-desktop"></i> {{ $visitor->is_desktop }} </td>
                <td> {{ $visitor->country }} </td>
                <td> {{ $visitor->city }} </td>

                <td>
                    @include('admin.pages.visitor.components.partials.show')
                    @include('admin.pages.visitor.components.crud.delete')
                </td>

            </tr>
            @empty
                <tr>
                    <td> პროდუქტები არ მოიძებნა </td>
                </tr>
            @endforelse
        </tbody>

        <tfoot>
            <tr>
                <th> # </th>
                <th> IP </th>
                <th> Browser </th>
                <th> Platform </th>
                <th> Phone </th>
                <th> Desktop </th>
                <th> Country </th>
                <th> City </th>
                <th> Action </th>
            </tr>
        </tfoot>


    </table>

</div>

{{ $visitorData->links() }}