@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            @if (auth()->user()->is_tugas == true)
            <a href="{{route('tugasPdf')}}" class="btn btn-danger btn-sm">
                PDF
            </a>      
            @endif
            
        </div>
        <div class="card-body">
            @if (auth()->user()->is_tugas == true)
                <div class="row">
                <div class="col-6">
                    Nama
                </div>
                <div class="col-6">
                    : {{$tugas->user->nama}}
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    Email
                </div>
                <div class="col-6">
                    : {{$tugas->user->email}}
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    Tugas
                </div>
                <div class="col-6">
                    : {{$tugas->tugas}}
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    Tanggal Mulai
                </div>
                <div class="col-6">
                    : {{$tugas->tanggal_mulai}}
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    Tanggal Selesai
                </div>
                <div class="col-6">
                    : {{$tugas->tanggal_selesai}}
                </div>
            </div>
            @else
            <div class="col-6">
                Status
            </div>
                <div class="col-6">
                    :
                    <span class="badge badge-danger">
                    Belum Ditugaskan
                </span>
                </div>
            @endif
            
        </div>
    </div>
@endsection