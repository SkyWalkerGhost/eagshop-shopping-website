@if(count($errors) > 0)

    @foreach($errors->all() as $error_message)

        <script type="text/javascript">

            Toast.fire({
                icon: 'error',
                title: '{{ $error_message }}'
            })

        </script>

    @endforeach
    
@endif


{{-- @if(Session::has('error'))
    
    <script type="text/javascript">

        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}'
        })

    </script>

@endif


@if(Session::has('info'))
    
    <script type="text/javascript">

        Toast.fire({
            icon: 'info',
            title: '{{ session('info') }}'
        })

    </script>

@endif --}}


{{-- @if(Session::has('success'))

    <script type="text/javascript">
            

        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        })

    </script>

@endif --}}

<script type="text/javascript">
    window.addEventListener('swal', function(message){
        Toast.fire(message.detail);
    })
</script>


{{-- 
@if(Session::has('info'))
    <script> toastr.info("{{ session('info') }}"); </script>
@endif --}}