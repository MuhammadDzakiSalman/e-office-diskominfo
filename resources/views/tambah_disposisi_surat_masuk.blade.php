@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col">
            <h4>Tambah Disposisi</h4>
        </div>
    </div>
    <form action="{{ route('surat.masuk.disposisi.store', $surat_masuk->id_surat_masuk) }}" method="POST">
        @csrf
        <div class="row gy-3 gx-3">
            <div class="col">
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label form-label mb-1" for="catatan">Catatan</label>
                                    <input type="text" class="form-control" id="catatan" name="catatan">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label form-label mb-1" for="intruksi">Intruksi</label>
                                    <input type="text" class="form-control" id="instruksi" name="instruksi">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label form-label mb-1" for="tujuan">Tujuan</label>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label form-label mb-1" for="pengisi">Pengisi</label>
                                    <input type="text" class="form-control" id="pengisi" name="pengisi">
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
