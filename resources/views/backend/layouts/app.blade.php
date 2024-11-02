<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    <title>{{ $meta['title'] }} - {{ env('APP_NAME') }}</title>
    @yield('css')
</head>
<body id="app">
    <section class="header">
        @include('backend.layouts.header')
    </section>
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if(session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <section class="footer">
        @include('backend.layouts.footer')
    </section>
    @yield('js')
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js ')}}"></script>
    <script src="{{ asset('assets/backend/js/custom.js ')}}"></script>
</body>
</html>