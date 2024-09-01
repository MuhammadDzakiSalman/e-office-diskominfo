@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col">
        <h4>Edit Surat Keluar</h4>
    </div>
</div>
<div class="row gy-3 gx-3">
    <div class="col">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('surat.keluar.update', $surat_keluar->id_surat_keluar) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Input untuk No. Surat -->
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label mb-1" for="no_surat">No. Surat</label>
                                <input type="text" class="form-control" id="no_surat" name="no_surat_keluar" value="{{ $surat_keluar->no_surat_keluar }}">
                            </div>
                        </div>
                        <!-- Input untuk Judul Surat -->
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label mb-1" for="judul_surat">Judul Surat</label>
                                <input type="text" class="form-control" id="judul_surat" name="judul_surat_keluar" value="{{ $surat_keluar->judul_surat_keluar }}">
                            </div>
                        </div>
                        <!-- Input untuk Jenis Surat -->
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label mb-1" for="jenis_surat">Jenis Surat</label>
                                <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" value="{{ $surat_keluar->jenis_surat }}">
                            </div>
                        </div>
                        <!-- Input untuk Tujuan -->
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label mb-1" for="tujuan">Tujuan</label>
                                <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $surat_keluar->tujuan }}">
                            </div>
                        </div>
                        <!-- Input untuk Tanggal Keluar -->
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label mb-1" for="tgl_keluar">Tgl. Keluar</label>
                                <input type="date" class="form-control" id="tgl_keluar" name="tanggal_keluar" value="{{ $surat_keluar->tanggal_keluar }}">
                            </div>
                        </div>
                        <!-- Input untuk Berkas -->
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="berkas">Berkas</label>
                                <small>{{ $surat_keluar->berkas_surat_keluar }}</small>
                                <input id="berkas" class="form-control" type="file" name="berkas_surat_keluar"/>
                            </div>
                        </div>
                        <!-- Input untuk Keterangan -->
                        <div class="col col-12">
                            <div class="mb-2">
                                <label class="form-label mb-1" for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" rows="3" name="keterangan">{{ $surat_keluar->keterangan }}</textarea>
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
