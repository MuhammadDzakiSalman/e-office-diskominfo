@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col">
        <h4>Users</h4>
    </div>
</div>
<div class="row gy-3 gx-3">
    <div class="col">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <form action="{{ route('user.create') }}" method="POST" id="userForm">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="level">Level</label>
                                <select aria-label="Default select example" class="form-select" id="level" name="level">
                                    <option value="" selected="" disabled>Pilih level...</option>
                                    @foreach(\App\Models\User::getLevels() as $level)
                                        <option value="{{ $level }}">{{ ucfirst($level) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                <small id="passwordMismatch" class="text-danger" style="display: none;">Password tidak sama.</small>
                            </div>
                        </div>
                        <div class="col col-12">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="bio">Bio</label>
                                <textarea class="form-control" id="bio" rows="3" name="bio"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary float-end" type="submit" id="submitButton" disabled>Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('userForm');
        const submitButton = document.getElementById('submitButton');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm_password');
        const passwordMismatchText = document.getElementById('passwordMismatch');

        form.addEventListener('input', function () {
            const inputs = form.querySelectorAll('input, select, textarea');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value) {
                    isValid = false;
                }
            });

            if (isValid && isPasswordMatch()) {
                submitButton.removeAttribute('disabled');
            } else {
                submitButton.setAttribute('disabled', 'disabled');
            }
        });

        function isPasswordMatch() {
            const passwordInputValue = passwordInput.value;
            const confirmPasswordInputValue = confirmPasswordInput.value;
            return passwordInputValue === confirmPasswordInputValue;
        }

        confirmPasswordInput.addEventListener('input', function () {
            if (confirmPasswordInput.value) {
                if (!isPasswordMatch()) {
                    passwordMismatchText.style.display = 'inline';
                    submitButton.setAttribute('disabled', 'disabled');
                } else {
                    passwordMismatchText.style.display = 'none';
                    if (passwordInput.value) {
                        submitButton.removeAttribute('disabled');
                    }
                }
            } else {
                passwordMismatchText.style.display = 'none';
            }
        });

        passwordInput.addEventListener('input', function () {
            if (confirmPasswordInput.value) {
                if (!isPasswordMatch()) {
                    passwordMismatchText.style.display = 'inline';
                    submitButton.setAttribute('disabled', 'disabled');
                } else {
                    passwordMismatchText.style.display = 'none';
                    if (confirmPasswordInput.value) {
                        submitButton.removeAttribute('disabled');
                    }
                }
            } else {
                passwordMismatchText.style.display = 'none';
            }
        });
    });
</script>

@endsection
