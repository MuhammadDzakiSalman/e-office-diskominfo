@extends('layouts.main')
@section('content')
<div class="row gy-3 gx-3">
    <div class="col">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <div class="row mb-2">
                    @if(auth()->check() && auth()->user()->level !== 'user')
                    <div class="col">
                        <a class="btn btn-primary float-end" href="{{ route('tambah.dispoisi.surat.masuk', $suratMasuk->id_surat_masuk) }}">Tambah Disposisi</a>
                    </div>
                    @endif
                </div>
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Catatan</th>
                                <th>Intruksi</th>
                                <th>Tujuan</th>
                                <th>Pengisi</th>
                                @if(auth()->user()->level !== 'user')
                                <th style="width: 10px;">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suratMasuk->disposisi as $disposisi)
                            <tr>
                                <td>{{ $disposisi->catatan }}</td>
                                <td>{{ $disposisi->instruksi }}</td>
                                <td>{{ $disposisi->tujuan }}</td>
                                <td>{{ $disposisi->pengisi }}</td>
                                @if(auth()->user()->level !== 'user')
                                <td class="d-flex flex-column border-0">
                                    <a class="btn w-100 btn-primary m-1" href="{{ route('disposisi.surat.masuk.edit', $disposisi->id_disposisi) }}">Edit</a>
                                    <form action="{{ route('disposisi.surat.masuk.destroy', $disposisi->id_disposisi) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn w-100 btn-outline-danger m-1 border border-danger"
                                            type="submit"
                                            onclick="return confirm('Yakin ingin menghapus surat ini?')">Hapus</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
