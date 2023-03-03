@extends('layout.app')
@section('body')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Kurir</h5>
            <div class="card-body">
                <div class="col-md-12">
                    <a href="#">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#ModalDriver"
                        >
                          Tambah Kurir
                        </button>
                    </a>
                    <p></p>
                    <table id="myTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Plat Nomor</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$row->nik}}</td>
                                    <td>{{$row->nama_lengkap}}</td>
                                    <td>{{$row->plat_nomor}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>
                                      <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EditModalDriver{{$row->nik}}" data-nik="{{ $row->nik }}"><i class="tf-icons bx bx-edit"></i></a>
                                      <button type="button" onclick="return del('{{ $row->nik }}')" class="btn btn-danger btn-flat" data-toggle="tooltip" title='Delete'>
                                        <i class="tf-icons bx bx-trash"></i>
                                      </button>

                                      <div class="modal fade" id="EditModalDriver{{$row->nik}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel1">Edit Kurir</h5>
                                              <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                              ></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admin/editdriver')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col mb-5">
                                                        <div class="col mb-3">
                                                            <label for="formFile" class="form-label">Foto</label>
                                                            <input type="file" name="image" id="image" class="form-control" />
                                                        </div>
                                                        @if ($row->foto != null)
                                                            <div>
                                                                <input type="hidden" name="imageOld" id="imageOld" value="{{$row->foto}}">
                                                                <img src="{{ URL::to('/') }}/images/{{$row->foto}}" class="rounded" width="50%">
                                                            </div>
                                                        @endif
                                                        <div class="col mb-3">
                                                          <label for="nik" class="form-label">NIK</label>
                                                          <input type="text" name="nik" id="nik" class="form-control" placeholder="000001" required value="{{$row->nik}}" />
                                                        </div>
                                                        <div class="col mb-3">
                                                          <label for="nama_driver" class="form-label">Nama Kurir</label>
                                                          <input type="text" name="nama_driver" id="nama_driver" class="form-control" placeholder="Type Here" required value="{{$row->nama_lengkap}}" />
                                                        </div>
                                                        <div class="col mb-3">
                                                          <label for="plat_nomor" class="form-label">Plat Nomor</label>
                                                          <input type="text" name="plat_nomor" id="plat_nomor" class="form-control" placeholder="Type Here" required value="{{$row->plat_nomor}}" />
                                                        </div>
                                                        <div class="col mb-3">
                                                          <label for="email" class="form-label">Email</label>
                                                          <input type="email" name="email" id="email" class="form-control" placeholder="Type Here" required value="{{$row->email}}"/>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="alamat" class="form-label">Alamat</label>
                                                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{$row->alamat}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- <div class="modal-footer">
                                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                              </button>
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                            </div> --}}
                                          </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div  class="col-md-12">
                </div> --}}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDriver" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Kurir</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin/createdriver')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col mb-5">
                    <div class="col mb-3">
                        <label for="image">Foto</label>
                        <input class="form-control" type="file" id="formFile" name="image" required/>
                    </div>
                    <div class="col mb-3">
                      <label for="nik" class="form-label">NIK</label>
                      <input type="text" name="nik" id="nik" class="form-control" placeholder="000001" required />
                    </div>
                    <div class="col mb-3">
                      <label for="nama_driver" class="form-label">Nama Kurir</label>
                      <input type="text" name="nama_driver" id="nama_driver" class="form-control" placeholder="Type Here" required />
                    </div>
                    <div class="col mb-3">
                      <label for="plat_nomor" class="form-label">Plat Nomor</label>
                      <input type="text" name="plat_nomor" id="plat_nomor" class="form-control" placeholder="Type Here" required />
                    </div>
                    <div class="col mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" id="email" class="form-control" placeholder="Type Here" required />
                    </div>
                    <div class="col mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.9/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
  function del(id) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data yang telah dihapus tidak dapat dikembalikan lagi!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        window.location.href = "{{ url('admin/delete-driver') }}"+'/'+id;
      }
    })
  }
</script>
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
  function del(id) {
    Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data yang telah dihapus tidak dapat dikembalikan lagi!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
          window.location.href = "{{ url('admin/delete-driver') }}"+'/'+id;
      }
    })
  }
</script> --}}
@endsection
