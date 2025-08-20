{{-- Delete --}}
<div class="modal fade" id="modalTugasDestroy{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$data->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel{{$data->id}}">Hapus {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-6">Nama</div>
          <div class="col-6">: {{$data->user->nama}}</div>
          <div class="col-6">Email</div>
          <div class="col-6">: {{$data->user->email}}</div>
          <div class="col-6">Jabatan</div>
          <div class="col-6">: {{$data->user->jabatan}}</div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <form action="{{ route('tugasDestroy', $data->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>

    </div>
  </div>
</div>


{{-- Show --}}
<div class="modal fade" id="modalTugasShow{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$data->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel{{$data->id}}">Detail {{$title}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">Nama</div>
          <div class="col-6">: {{$data->user->nama}}</div>
          <div class="col-6">Email</div>
          <div class="col-6">: {{$data->user->email}}</div>
          <div class="col-6">Jabatan</div>
          <div class="col-6">: {{$data->user->jabatan}}</div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="{{route('tugas')}}" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</a href="{{route('tugas')}}">
      </div>
    </div>
  </div>
</div>