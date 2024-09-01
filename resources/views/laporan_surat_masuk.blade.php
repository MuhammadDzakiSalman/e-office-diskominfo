@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col">
        <h4>Laporan Surat Masuk</h4>
    </div>
</div>
<div class="row gy-3 gx-3">
    <div class="col">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <div class="row mb-3 gy-2">
                    <div class="col-12 col-md-4">
                        <a href="{{ route('laporan.surat.masuk.downloadPDF', ['date' => Request::input('filter_tgl')]) }}" class="btn btn-outline-primary w-100 border border-primary" type="button">Download PDF</a>
                    </div>
                    <div class="col-md-4">
                        <form class="d-flex align-items-center gap-2" method="GET" action="{{ route('laporan.surat.masuk') }}">
                            <input type="date" name="filter_tgl" class="form-control" id="filter_tgl" placeholder="Filter Tanggal" value="{{ Request::input('filter_tgl') }}">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                            <form class="d-flex align-items-center" method="GET"
                                action="{{ route('laporan.surat.masuk') }}" id="showForm" style="width: 8rem;">
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
                        {{-- <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div> --}}
                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                            <form method="GET" action="{{ route('laporan.surat.masuk') }}">
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
                                <th>Jenis Surat</th>
                                <th>Asal Surat</th>
                                <th>Tgl. Masuk</th>
                                {{-- <th>Tgl. Diterima</th> --}}
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surat_masuk as $surat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $surat->no_surat_masuk }}</td>
                                <td>{{ $surat->judul_surat_masuk }}</td>
                                <td>{{ $surat->jenis_surat }}</td>
                                <td>{{ $surat->asal_surat }}</td>
                                <td>{{ $surat->tanggal_masuk }}</td>
                                {{-- <td>{{ $surat->tanggal_diterima }}</td> --}}
                                <td>{{ $surat->keterangan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                            Showing {{ $surat_masuk->firstItem() }} to {{ $surat_masuk->lastItem() }} of
                            {{ $surat_masuk->total() }} entries
                        </p>
                    </div>
                    @if ($surat_masuk->hasPages())
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item {{ $surat_masuk->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $surat_masuk->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>
                                    @foreach ($surat_masuk->getUrlRange(1, $surat_masuk->lastPage()) as $page => $url)
                                        <li
                                            class="page-item {{ $page == $surat_masuk->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                                    <li class="page-item {{ $surat_masuk->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $surat_masuk->nextPageUrl() }}"
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
