@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col">
        <h4>Surat Masuk</h4>
    </div>
</div>
<div class="row gy-3 gx-3">
    <div class="col">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <form action="{{ route('surat.masuk.update', $surat_masuk->id_surat_masuk) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="no_surat">No. Surat</label>
                                <input type="text" class="form-control" id="no_surat" name="no_surat_masuk" value="{{ $surat_masuk->no_surat_masuk }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="judul_surat">Judul Surat</label>
                                <input type="text" class="form-control" id="judul_surat" name="judul_surat_masuk" value="{{ $surat_masuk->judul_surat_masuk }}">
                                </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="jenis_surat">Jenis Surat</label>
                                <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" value="{{ $surat_masuk->jenis_surat }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="asal_surat">Asal Surat</label>
                                <input type="text" class="form-control" id="asal_surat" name="asal_surat" value="{{ $surat_masuk->asal_surat }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="tgl_masuk">Tgl. Masuk</label>
                                <input type="date" class="form-control" id="tgl_masuk" name="tanggal_masuk" value="{{ $surat_masuk->tanggal_masuk }}">
                            </div>
                        </div>
                        {{-- <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="tgl_diterima">Tgl. Diterima</label>
                                <input type="date" class="form-control" id="tgl_diterima" name="tanggal_diterima" value="{{ $surat_masuk->tanggal_diterima }}">
                            </div>
                        </div> --}}
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="berkas">Berkas</label>
                                <small>{{ $surat_masuk->berkas_surat_masuk }}</small>
                                <input id="berkas" class="form-control" type="file" name="berkas_surat_masuk"/>
                            </div>
                        </div>
                        <div class="col col-12">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" rows="3" name="keterangan">{{ $surat_masuk->keterangan }}</textarea>
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
