@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <a href="{{route('user')}}" class="btn btn-primary btn-sm">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
        <div class="row">
        <div class="col">
            <form action="{{route('userUpdate', $user->id)}}" method="post">
    @csrf

    <div class="form-group mb-3">
        <label>Nama</label>
        <input type="text" id="nama" class="form-control @error ('nama') is-invalid @enderror" name="nama" placeholder="masukan nama" value="{{ old('nama', $user->nama)}}">
        @error('nama')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label>Email</label>
        <input type="email" name="email" placeholder="masukan email" class="form-control @error('email') is-invalid  @enderror" value="{{ old('email', $user->email) }}">
        @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group mb-3">
    <label>Jabatan</label>
    <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
        <option value="">-- Pilih Jabatan --</option>
        <option value="Admin" {{ $user->jabatan == 'Admin' ? 'selected' : '' }}>Admin</option>
        <option value="Karyawan" {{ $user->jabatan == 'Karyawan'  ? 'selected' : ''   }}>Karyawan</option>
    </select>
    @error('jabatan')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
    </div>


    <div class="form-group mb-3">
        <label>Password</label>
        <input type="password" name="password" placeholder="masukan passowrd" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label>Konfirmasi Password</label>
        <input type="password" placeholder="masukan ulang password" name="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
        </div>
    </div>

    </div>
@endsection