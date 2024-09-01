@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col">
        <h4>Edit Users</h4>
    </div>
</div>
<div class="row gy-3 gx-3">
    <div class="col">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <form action="{{ route('user.update', $users->id_user) }}" method="POST" id="userForm">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $users->username }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $users->nama_lengkap }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="level">Level</label>
                                <select aria-label="Default select example" class="form-select" id="level" name="level">
                                    <option value="" disabled>Pilih level...</option>
                                    @foreach(\App\Models\User::getLevels() as $level)
                                        <option value="{{ $level }}" @if($level === $users->level) selected @endif>{{ ucfirst($level) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col col-12">
                            <div class="mb-2">
                                <label class="form-label form-label mb-1" for="bio">Bio</label>
                                <textarea class="form-control" id="bio" rows="3" name="bio">{{ $users->bio }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary float-end" type="submit" id="submitButton">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
