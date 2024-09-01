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
                    <div class="row mb-2">
                        <div class="col">
                            @if(auth()->user()->level !== 'user')
                            <a class="btn btn-primary" href="{{ url('/surat/surat-masuk/tambah') }}">Tambah Data</a>
                            @endif
                        </div>
                    </div>
                    <div class="row gy-2">
                        <div class="col-md-4">
                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                <form class="d-flex align-items-center" method="GET"
                                    action="{{ route('surat.masuk.index') }}" id="showForm" style="width: 8rem;">
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
                                <form method="GET" action="{{ route('surat.masuk.index') }}">
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
                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid"
                        aria-describedby="dataTable_info">
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
                                    <th>Berkas</th>
                                    <th>Keterangan</th>
                                    @if(auth()->user()->level !== 'user')
                                        <th style="width: 10px;">Aksi</th>
                                    @endif
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
                                        <td>
                                            {{ $surat->berkas_surat_masuk }} <a href="{{ asset('storage/surat_masuk/' . $surat->berkas_surat_masuk) }}"
                                                download="{{ $surat->berkas_surat_masuk }}"
                                                class="btn btn-outline-primary border border-primary"><svg
                                                    class="icon icon-tabler icon-tabler-download"
                                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                    <path d="M7 11l5 5l5 -5"></path>
                                                    <path d="M12 4l0 12"></path>
                                                </svg></a>
                                        </td>
                                        <td>{{ $surat->keterangan }}</td>
                                        <td class="d-flex flex-column border-0">
                                            @if(auth()->user()->level !== 'user')
                                            <a class="btn w-100 btn-primary m-1" href="{{ route('surat.masuk.edit', $surat->id_surat_masuk) }}">Edit</a>
                                            <a class="btn w-100 btn-info m-1" href="{{ route('surat.masuk.disposisi', $surat->id_surat_masuk) }}">Disposisi</a>
                                            <form action="{{ route('surat.masuk.destroy', $surat->id_surat_masuk) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn w-100 btn-outline-danger m-1 border border-danger"
                                                    type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus surat ini?')">Hapus</button>
                                            </form>
                                            @endif
                                        </td>
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
