@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col">
        <h4>Dashboard</h4>
    </div>
</div>
<div class="row gx-3 gy-3 my-3">
    <div class="col-lg-6 col-12">
        <div class="card h-100 border-0 shadow text-light bg-primary">
            <div class="card-body">
                <h5 class="card-title mb-1">Total Surat Masuk</h5>
                <p class="card-text">{{ $totalSuratMasuk }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="card h-100 border-0 shadow text-light bg-info">
            <div class="card-body">
                <h5 class="card-title mb-1">Total Surat Keluar</h5>
                <p class="card-text">{{ $totalSuratKeluar }}</p>
            </div>
        </div>
    </div>
    <div class="col col-12 mt-5">
        <div class="card border-0 shadow h-100">
            <div class="card-header py-3">
                <h5 class="mb-0">Surat Masuk Hari Ini</h5>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Surat</th>
                                <th>Judul Surat</th>
                                <th>Jenis Surat</th>
                                <th>Asal Surat</th>
                                <th>Tgl. Masuk</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suratMasuk as $surat_masuk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $surat_masuk->no_surat_masuk }}</td>
                                    <td>{{ $surat_masuk->judul_surat_masuk }}</td>
                                    <td>{{ $surat_masuk->jenis_surat }}</td>
                                    <td>{{ $surat_masuk->asal_surat }}</td>
                                    <td>{{ $surat_masuk->tanggal_masuk }}</td>
                                    <td>{{ $surat_masuk->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                            Showing {{ $suratMasuk->firstItem() }} to {{ $suratMasuk->lastItem() }} of {{ $suratMasuk->total() }} entries
                        </p>
                    </div>
                    @if ($suratMasuk->hasPages())
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item {{ $suratMasuk->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $suratMasuk->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                @foreach ($suratMasuk->getUrlRange(1, $suratMasuk->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $suratMasuk->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                                <li class="page-item {{ $suratMasuk->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $suratMasuk->nextPageUrl() }}" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col col-12">
        <div class="card border-0 shadow h-100">
            <div class="card-header py-3">
                <h5 class="mb-0">Surat Keluar Hari Ini</h5>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Surat</th>
                                <th>Judul Surat</th>
                                <th>Jenis Surat</th>
                                <th>Tujuan</th>
                                <th>Tgl. Keluar</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suratKeluar as $surat_keluar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $surat_keluar->no_surat_keluar }}</td>
                                    <td>{{ $surat_keluar->judul_surat_keluar }}</td>
                                    <td>{{ $surat_keluar->jenis_surat }}</td>
                                    <td>{{ $surat_keluar->tujuan }}</td>
                                    <td>{{ $surat_keluar->tanggal_keluar }}</td>
                                    <td>{{ $surat_keluar->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                            Showing {{ $suratKeluar->firstItem() }} to {{ $suratKeluar->lastItem() }} of {{ $suratKeluar->total() }} entries
                        </p>
                    </div>
                    @if ($suratKeluar->hasPages())
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item {{ $suratKeluar->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $suratKeluar->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                @foreach ($suratKeluar->getUrlRange(1, $suratKeluar->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $suratKeluar->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                                <li class="page-item {{ $suratKeluar->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $suratKeluar->nextPageUrl() }}" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
