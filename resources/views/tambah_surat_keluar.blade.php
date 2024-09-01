@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col">
            <h4>Tambah Surat Keluar</h4>
        </div>
    </div>
    <div class="row gy-3 gx-3">
        <div class="col">
            <div class="card border-0 shadow">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('surat.keluar.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-2"><label class="form-label mb-1" for="no_surat">No. Surat</label>
                                    <input type="text" class="form-control" id="no_surat" name="no_surat_keluar">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label mb-1" for="judul_surat">Judul Surat</label>
                                    <input type="text" class="form-control" id="judul_surat" name="judul_surat_keluar">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label mb-1" for="jenis_surat">Jenis Surat</label>
                                    <input type="text" class="form-control" id="jenis_surat" name="jenis_surat">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label mb-1" for="tujuan">Tujuan</label>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label mb-1" for="tgl_keluar">Tgl. Keluar</label>
                                    <input type="date" class="form-control" id="tgl_keluar" name="tanggal_keluar">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label class="form-label mb-1" for="berkas">Berkas</label>
                                    <input id="berkas" class="form-control" type="file" name="berkas_surat_keluar" />
                                </div>
                            </div>
                            <div class="col col-12">
                                <div class="mb-2">
                                    <label class="form-label mb-1" for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"><button class="btn btn-primary float-end" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
