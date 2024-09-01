<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

@include('layouts.partials.head')

<body class="bg-primary">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row d-flex justify-content-center w-100">
            <div class="col-sm-11 col-md-8 col-xl-5 d-flex justify-content-center align-items-center">
                <div class="card mb-5 w-100 border-0 shadow">
                    <div class="card-body d-flex flex-column align-items-center px-5 py-4">
                        <div class="row mb-2">
                            <div class="col">
                                <h3 class="mb-3 fw-normal">Login</h3>
                            </div>
                        </div>
                        <form class="text-center w-100" action="{{ route('login') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <input class="form-control" type="text" name="username" placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <div class="mb-3"><input class="form-control" type="password" name="password" id="password" placeholder="Password"></div>
                            </div>
                            <div class="mb-3 d-flex">
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="show_password"><label class="form-check-label" for="show_password">Lihat password</label></div>
                            </div>
                            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Login</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('show_password').addEventListener('change', function() {
            var passwordInput = document.getElementById('password');
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
