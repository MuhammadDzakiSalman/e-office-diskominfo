<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

@include('layouts.partials.head')

<body class="bg-body">
    <div class="wrapper">
        @include('layouts.partials.sidebar')
        <div class="main">
            <main class="content">
                <div class="container-fluid px-3">
                    @include('layouts.partials.navbar')
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
