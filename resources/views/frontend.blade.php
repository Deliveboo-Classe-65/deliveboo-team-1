<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Deliveboo</title>

    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
   <script src="{{ asset('js/frontend.js') }}" defer></script>
   <script>
    const isLogged = {!! Auth::user() ? 'true' : 'false' !!}

   </script>
</head>
<body>
    <div id="app">
       
       
    </div>
</body>

</html>
