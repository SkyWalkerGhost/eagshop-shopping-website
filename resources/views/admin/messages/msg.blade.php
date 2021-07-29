@if(count($errors) > 0)
    @foreach($errors->all() as $error_message)
        {{ $error_message }}
    @endforeach
@endif

@if(Session::has('success'))
    <script> toastr.success("{{ session('success') }}"); </script>
@endif

@if(Session::has('info'))
    <script> toastr.info("{{ session('info') }}"); </script>
@endif