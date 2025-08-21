<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mojokertoan News | Login</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/getbootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.min.css') }}">
</head>

<body>

    @yield('auth-layout')

    <script src="{{ asset('vendor/getbootstrap/bootstrap.js') }}"></script>
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
