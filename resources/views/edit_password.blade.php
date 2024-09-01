@extends('layouts.main')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h4>Ubah Password</h4>
    </div>
</div>
<div class="row gy-3 gx-3">
    <div class="col col-12">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <form action="{{ route('profile.update.password', auth()->user()->id_user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="password">Password Baru</label>
                                <input type="password" class="form-control" id="password" name="password">
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
