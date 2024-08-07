<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Template Mazer</title>

    <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/helpers/helpers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}">

    @yield('css')
</head>

<body>
    <div id="app">
        <div id="sidebar">
            @include('layouts.sidebar')
        </div>

        <div id="main" class='layout-navbar navbar-fixed'>
            <header>
                @include('layouts.navbar')
            </header>
            <div id="main-content">
                <div class="page-heading">
                    @yield('content')
                </div>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Mazer</p>
                    </div>

                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @include('layouts.modal.modal-logout')

    <script src="{{asset('assets/static/js/initTheme.js')}}"></script>
    <script src="{{asset('assets/static/js/components/dark.js')}}"></script>
    <script src="{{asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <script src="{{asset('assets/compiled/js/app.js')}}"></script>

    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/helpers/helpers.js') }}"></script>

    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>

    <script>
        @if (session('success'))
            toast("{{ session('success') }}", 'success');
        @endif

        @if (session('error'))
            toast("{{ session('error') }}", 'error');
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toast("{{ $error }}", 'error');
            @endforeach
        @endif

        function toast(text, type){
            backgroundColor = '#28ab55';

            if(type === 'error'){
                backgroundColor = '#dc3545';
            }

            Toastify({
                text: text,
                duration: 3000,
                close: true,
                backgroundColor: backgroundColor,
            }).showToast()
        }
    </script>

    @yield('js')
</body>

</html>
