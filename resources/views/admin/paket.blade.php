@extends('layout.app')
@section('body')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Paket</h5>
            <div class="card-body">
                <div class="col-md-12">
                    <a href="#">
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#ModalPaket"
                        >
                          Tambah Paket
                        </button>
                    </a>
                    <p></p>
                    <table id="myTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Paket</th>
                                <th>No Resi</th>
                                <th>Berat</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalPaket" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Paket</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin/createdriver')}}" method="post">
                @csrf
                <div class="col mb-5">
                    <div class="col mb-3">
                      <label for="nik" class="form-label">NIK</label>
                      <input type="text" name="nik" id="nik" class="form-control" placeholder="000001" required />
                    </div>
                    <div class="col mb-3">
                      <label for="nama_driver" class="form-label">Nama Driver</label>
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
@endsection
