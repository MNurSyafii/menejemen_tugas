<div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$data->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel{{$data->id}}">Hapus {{$title}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">Nama</div>
          <div class="col-6">: {{$data->nama}}</div>
          <div class="col-6">Email</div>
          <div class="col-6">: {{$data->email}}</div>
          <div class="col-6">Jabatan</div>
          <div class="col-6">: {{$data->jabatan}}</div>
          <div class="col-6">Status</div>
          <div class="col-6">: {{$data->is_tugas ? 'Sudah di tugaskan' : 'Belum di tugaskan'}}</div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="{{route('user')}}"  type="button"  class="btn btn-secondary"  data-bs-dismiss="modal">Tutup</a href="{{route('user')}}">
        <form action="{{ route('userDestroy', $data->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
