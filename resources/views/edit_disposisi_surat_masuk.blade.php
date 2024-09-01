@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col">
            <h4>Edit Disposisi</h4>
        </div>
    </div>
    <form action="{{ route('disposisi.surat.masuk.update', $disposisi->id_disposisi) }}" method="POST">
        @csrf
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
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label form-label mb-1" for="catatan">Catatan{{ $disposisi->id_disposisi }}</label>
                                    <input type="text" class="form-control" id="catatan" name="catatan" value="{{ $disposisi->catatan }}">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label form-label mb-1" for="intruksi">Intruksi</label>
                                    <input type="text" class="form-control" id="instruksi" name="instruksi" value="{{ $disposisi->instruksi }}">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label form-label mb-1" for="tujuan">Tujuan</label>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $disposisi->tujuan }}">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label form-label mb-1" for="pengisi">Pengisi</label>
                                    <input type="text" class="form-control" id="pengisi" name="pengisi" value="{{ $disposisi->pengisi }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"><button class="btn btn-primary float-end" type="submit">Simpan</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
