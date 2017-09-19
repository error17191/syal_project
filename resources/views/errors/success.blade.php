@if(Session::has('success'))
    <script>
        new PNotify({
            text: '{{Session::get('success')}}',
            styling: 'brighttheme',
            type: 'success',
            hide: false
        });
    </script>
@endif