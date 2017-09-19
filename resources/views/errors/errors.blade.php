@if($errors->any())
<script>
    new PNotify({
        text: '@foreach($errors->all() as $error)- {{$error}}</br>@endforeach',
        styling: 'fontawesome',
        type: 'error',
        hide: true,
        delay: 8000,
        mouse_reset: true,
        remove: true

    });
</script>
@endif