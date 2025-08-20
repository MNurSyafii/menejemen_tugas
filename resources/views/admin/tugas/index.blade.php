@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <a href="{{route('tugasCreate')}}" class="btn btn-primary btn-sm">
                Tambah Data
            </a>
            <a href="{{route('tugasExcel')}}" class="btn btn-success btn-sm">
                Excel
            </a>
            <a href="{{route('tugasPdf')}}" class="btn btn-danger btn-sm">
                PDF
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="bg-primary text-white">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tugas</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>
                                                <i class="fas fa-cog"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tugas as $data)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$data->user->nama}}</td>
                                                <td>{{$data->tugas}}</td>
                                                <td>{{$data->tanggal_mulai}}</td>
                                                <td>{{$data->tanggal_selesai}}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalTugasShow{{$data->id}}">
                                                        <i class="fas fa-eye"></i>
                                                    </button>

                                                    <a href="{{route('tugasEdit', $data->id)}}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalTugasDestroy{{$data->id}}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('admin/tugas/modal')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
        </div>
    </div>
@endsection