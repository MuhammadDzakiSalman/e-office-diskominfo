@extends('layouts.main')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h4>Profile</h4>
    </div>
</div>
<div class="row gy-3 gx-3">
    <div class="col">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                @if (session('success'))
                    <script>
                      const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                        });
                        Toast.fire({
                        icon: "success",
                        title: "{{ session('success') }}"
                    });
                    </script>
                    @endif
                <div class="row gy-3">
                    {{-- <div class="col d-flex justify-content-center align-items-center col-12"><img class="img-fluid rounded-circle bg-primary" src="{{ asset('assets/img/photo-profile-1.png') }}" width="100"></div> --}}
                    <div class="col-xl-12 offset-xl-0 d-flex justify-content-center align-items-center col-12">
                        <div class="col-bio border-bottom">
                            <h5 class="text-center">{{ auth()->user()->nama_lengkap }}</h5>
                            <p class="text-center">{{ auth()->user()->bio }}</p>
                        </div>
                    </div>
                    <div class="col col-12">
                        <div class="d-flex justify-content-center align-items-center d-flex gap-2">
                            <a class="btn btn-primary" href="{{ route('profile.edit', auth()->user()->id_user) }}">Edit Profile</a>
                            <a class="btn btn-outline-primary border border-primary" href="{{ route('profile.edit.password', auth()->user()->id_user) }}">Ubah Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
