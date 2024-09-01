@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col">
        <h4>Laporan Surat Keluar</h4>
    </div>
</div>
<div class="row gy-3 gx-3">
    <div class="col">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <div class="row mb-3 gy-2">
                    <div class="col-12 col-md-4">
                        <a href="{{ route('laporan.surat.keluar.downloadPDF', ['date' => Request::input('filter_tgl')]) }}" class="btn btn-outline-primary w-100 border border-primary" type="button">Download PDF</a>
                    </div>
                    <div class="col-md-4">
                        <form class="d-flex align-items-center gap-2" method="GET" action="{{ route('laporan.surat.keluar') }}">
                            <input type="date" name="filter_tgl" class="form-control" id="filter_tgl" placeholder="Filter Tanggal" value="{{ Request::input('filter_tgl') }}">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                            <form class="d-flex align-items-center" method="GET"
                                action="{{ route('laporan.surat.keluar') }}" id="showForm" style="width: 8rem;">
                                <label for="showData" class="form-label mb-0">Show&nbsp;</label>
                                <select id="showData" name="show" class="d-inline-block form-select form-select-sm"
                                    onchange="document.getElementById('showForm').submit()">
                                    <option value="10" {{ Request::input('show', 10) == 10 ? 'selected' : '' }}>10
                                    </option>
                                    <option value="25" {{ Request::input('show') == 25 ? 'selected' : '' }}>25
                                    </option>
                                    <option value="50" {{ Request::input('show') == 50 ? 'selected' : '' }}>50
                                    </option>
                                    <option value="100" {{ Request::input('show') == 100 ? 'selected' : '' }}>100
                                    </option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                            <form method="GET" action="{{ route('laporan.surat.keluar') }}">
                                <label class="form-label">
                                    <input type="search" name="search" class="form-control form-control-sm"
                                        aria-controls="dataTable" placeholder="Search"
                                        value="{{ Request::input('search') }}">
                                </label>
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Surat</th>
                                <th>Judul Surat</th>
                                <th>Tujuan</th>
                                <th>Jenis Surat</th>
                                <th>Tgl. Keluar</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surat_keluar as $surat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $surat->no_surat_keluar }}</td>
                                <td>{{ $surat->judul_surat_keluar }}</td>
                                <td>{{ $surat->tujuan }}</td>
                                <td>{{ $surat->jenis_surat }}</td>
                                <td>{{ $surat->tanggal_keluar }}</td>
                                <td>{{ $surat->keterangan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                            Showing {{ $surat_keluar->firstItem() }} to {{ $surat_keluar->lastItem() }} of
                            {{ $surat_keluar->total() }} entries
                        </p>
                    </div>
                    @if ($surat_keluar->hasPages())
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item {{ $surat_keluar->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $surat_keluar->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>
                                    @foreach ($surat_keluar->getUrlRange(1, $surat_keluar->lastPage()) as $page => $url)
                                        <li
                                            class="page-item {{ $page == $surat_keluar->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                                    <li class="page-item {{ $surat_keluar->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $surat_keluar->nextPageUrl() }}"
                                            aria-label="Next">
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
