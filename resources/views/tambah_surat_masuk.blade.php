@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col">
        <h4>Tambah Surat Masuk</h4>
    </div>
</div>
<div class="row gy-3 gx-3">
    <div class="col">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <form action="{{ route('surat.masuk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="formGroupExampleInput">No. Surat</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" name="no_surat_masuk">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="formGroupExampleInput">Judul Surat</label>
                                <input type="text" class="form-control" id="formGroupExampleInput-2" name="judul_surat_masuk">
                                </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="formGroupExampleInput">Jenis Surat</label>
                                <input type="text" class="form-control" id="formGroupExampleInput-4" name="jenis_surat">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="formGroupExampleInput">Asal Surat</label>
                                <input type="text" class="form-control" id="formGroupExampleInput-5" name="asal_surat">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="formGroupExampleInput">Tgl. Masuk</label>
                                <input type="date" class="form-control" id="formGroupExampleInput-1" name="tanggal_masuk">
                            </div>
                        </div>
                        {{-- <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="formGroupExampleInput">Tgl. Diterima</label>
                                <input type="date" class="form-control" id="formGroupExampleInput-1" name="tanggal_diterima">
                            </div>
                        </div> --}}
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="formGroupExampleInput">Berkas</label>
                                <input id="formGroupExampleInput-3" class="form-control" type="file" name="berkas_surat_masuk"/>
                            </div>
                        </div>
                        <div class="col col-12">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="exampleFormControlTextarea1">Keterangan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"><button class="btn btn-primary float-end" type="submit">Simpan</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
