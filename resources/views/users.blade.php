@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col">
        <h4>Users</h4>
    </div>
</div>
<div class="row gy-3 gx-3">
    <div class="col">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <div class="row mb-2">
                    <div class="col"><a class="btn btn-primary" href="{{ url('/pengaturan/users/tambah') }}">Tambah User</a></div>
                </div>
                <div class="row gy-2">
                    <div class="col-md-4 text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                            <form class="d-flex align-items-center" method="GET"
                                    action="{{ route('user.index') }}" id="showForm" style="width: 8rem;">
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
                            <form method="GET" action="{{ route('user.index') }}">
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
                    @if (session('error'))
                    <script>
                      Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "{{ session('error') }}",
                        });
                    </script>
                    @endif
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>Nama Lengkap</th>
                                <th>level</th>
                                <th>bio</th>
                                <th style="width: 190px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->nama_lengkap }}</td>
                                <td>{{ $user->level }}</td>
                                <td>{{ $user->bio }}</td>
                                <td class="d-flex flex-column border-0">
                                    <a class="btn w-100 btn-primary m-1" href="{{ route('user.edit', $user->id_user) }}">Edit</a>
                                    <form action="{{ route('user.destroy', $user->id_user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger m-1 border w-100 border-danger" type="submit" onclick="return confirm('Yakin ingin menghapus surat ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    @if ($users->hasPages())
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $users->previousPageUrl() }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                            <li
                                                class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                        <li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $users->nextPageUrl() }}"
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
