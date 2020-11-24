<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/global.css') }}" rel="stylesheet" />
        
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            @yield('content')
        </div>
        <script src="Libs/bootstrap-4.5.2/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="Libs/bootstrap-4.5.2/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="Libs/font-awesome-5.13/all.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
