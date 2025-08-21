<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MojokertoanNews | @yield('title', 'Page')</title>
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.min.css') }}">

    {{-- Global CSS --}}
    <link rel="stylesheet" href="{{ asset('vendor/css/global.css') }}">
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>



    <div id="app">
        @include('layouts.partials.sidebar')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('main')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2025 &copy; Sogol</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://github.com/sogolbrik">GlgDev</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>



    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
    <script src="{{ asset('vendor/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

    @if (session('success-message'))
        <script>
            Swal.fire({
                position: "top-end",
                title: "{!! session('success-message') !!}",
                icon: "success",
                showConfirmButton: false,
                toast: true,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endif

    @if (session('error-message'))
        <script>
            Swal.fire({
                position: "top-end",
                title: "{!! session('error-message') !!}",
                icon: "error",
                showConfirmButton: false,
                toast: true,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endif
</body>

</html>
