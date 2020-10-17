<script>
    @if(session('message'))
    $.toast({
        text: '{{ session('message') }}',
        icon: '{{ session('icon') }}',
        loader: true,        // Change it to false to disable loader
        loaderBg: '{{ session('loaderBg') }}',  // To change the background,
        position: 'bottom-right'
    })
    @endif

    @if ($errors->any())
    $.toast({
        heading: '@lang('validate_error')',
        text: [
            @foreach ($errors->all() as $error)
                '{{ $error }}',
                @endforeach
        ],
        icon: 'error',
        position: 'bottom-right',
        hideAfter: 10000   // in milli seconds
    })
    @endif
</script>
