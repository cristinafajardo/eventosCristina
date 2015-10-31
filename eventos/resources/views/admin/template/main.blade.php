<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'Default') </title>
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    </head>
    <body>
    	<section>
            @yield('navbar')
        </section>
        <section>
            @yield('carousel')
        </section>
    	<footer>
    		@yield('footer')
    	</footer>
    	 <script src="{{ asset('plugins/jquery/js/jquery-2.1.4.js') }}"> </script>
    	 <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"> </script>
    </body>
</html>