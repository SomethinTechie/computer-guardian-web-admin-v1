<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    </head>
    <body class="antialiased">
        <script>
localStorage.removeItem('lun');
localStorage.removeItem('cun');

@if(auth()->user())
    localStorage.setItem("lun", "{{ base64_encode(auth()->user()->id * 9194548854) }}");
    location.replace("/home")
    @endif
</script>
