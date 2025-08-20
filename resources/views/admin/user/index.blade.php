@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <a href="{{route('userCreate')}}" class="btn btn-primary btn-sm">
                Tambah Data
            </a>
            <a href="{{route('userExcel')}}" class="btn btn-success btn-sm">
                Excel
            </a>
            <a href="{{route('userPdf')}}" class="btn btn-danger btn-sm">
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
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                            <th>Status</th>
                                            <th>
                                                <i class="fas fa-cog"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $data)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$data->nama}}</td>
                                                <td>{{$data->email}}</td>
                                                <td>
                                                    @if ($data->jabatan == 'Admin')
                                                        <span class="badge badge-info">
                                                            {{$data->jabatan}}
                                                        </span>
                                                        @else
                                                        <span class="badge badge-primary">
                                                            {{$data->jabatan}}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->is_tugas == False)
                                                        <span class="badge badge-danger">
                                                            Belum di tugaskan
                                                        </span>
                                                        @else
                                                        <span class="badge badge-success">
                                                            Sudah di tugaskan
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('userEdit', $data->id)}}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$data->id}}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                    @include('admin/user/modal')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
        </div>
    </div>
@endsection