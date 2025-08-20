@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('tugas') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('tugasStore') }}" method="post">
                    @csrf

                    {{-- Nama --}}
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="">-- Pilih Nama --</option>
                            @foreach ($user as $data)
                                <option value="{{ $data->id }}" {{ old('user_id') == $data->id ? 'selected' : '' }}>
                                    {{ $data->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Tugas --}}
                    <div class="form-group mb-3">
                        <label>Tugas</label>
                        <textarea name="tugas" cols="30" rows="5" class="form-control @error('tugas') is-invalid @enderror">{{ old('tugas') }}</textarea>
                        @error('tugas')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Tanggal Mulai</label>
                        <input type="date" 
                               name="tanggal_mulai" 
                               class="form-control @error('tanggal_mulai') is-invalid @enderror" 
                               value="{{ old('tanggal_mulai') }}">
                        @error('tanggal_mulai')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Tanggal Selesai</label>
                        <input type="date" 
                               name="tanggal_selesai" 
                               class="form-control @error('tanggal_selesai') is-invalid @enderror" 
                               value="{{ old('tanggal_selesai') }}">
                        @error('tanggal_selesai')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
