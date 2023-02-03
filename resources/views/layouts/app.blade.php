<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kenneth McKenzie') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    @if($general)
    <link href="https://fonts.googleapis.com/css2?family={{$general->main_font}}&family={{$general->secondary_font}}" rel="stylesheet">

    <style>
        body{
            background-color: #f7f7f7;
        }
        .primary-color{
            color: {{$general->primary_color}};
        }

        .secondary-color{
            color: {{$general->secondary_color}};
        }

        .third-color{
            color: {{$general->third_color}};
        }

        .primary-background{
            background-color: {{$general->primary_color}};
        }

        .secondary-background{
            background-color: {{$general->secondary_color}};
        }

        .third-background{
            background-color: {{$general->third_color}};
        }

        .main-font{
            font-family: {{$general->main_font}};
        }

        .secondary-font{
            font-family: {{$general->secondary_font}};
        }
    </style>

    @endif

</head>

<body class="h-screen antialiased leading-none secondary-font secondary-color">

    <div class="flex flex-col justify-between min-h-screen">

        @include('partials.header')
        <div class="main mb-auto pt-8">        
            @yield('content')
            <div class="text-center text-2xl p-9 text-red-500">
                @include('partials.messages')
            </div> 
        </div>

        @include('partials.footer')

    </div>

    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
        CKEDITOR.replace( 'article-ckeditor2' );
    </script>
</body>

</html>