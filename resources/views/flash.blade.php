@if(session()->has('flash_message'))
    <script>
        swal({
            title: '{{ session('flash_message.title') }}',
            text: '{{ session('flash_message.message') }}',
            type: '{{ session('flash_message.type') }}',
            showConfirmButton: false,
            timer: 2000,
        })
    </script>
@endif