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
                                <th>No Resi</th>
                                <th>Berat</th>
                                <th>Alamat Pengrim</th>
                                <th>Nama Pengrim</th>
                                <th>No Telepon Pengrim</th>
                                <th>Alamat Penerima</th>
                                <th>Nama Penerima</th>
                                <th>No Telepon Penerima</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $row)
                              <tr>
                                <td>{{$no++}}</td>
                                <td>{{$row->no_resi}}</td>
                                <td>{{$row->berat}} kg</td>
                                <td>{{$row->alamat_pengirim}}</td>
                                <td>{{$row->nama_pengirim}}</td>
                                <td>{{$row->no_tlpn_pengirim}}</td>
                                <td>{{$row->alamat}}</td>
                                <td>{{$row->nama_penerima}}</td>
                                <td>{{$row->no_tlpn_user}}</td>
                                <td>
                                  @if ($row->status == '0')
                                    Pending
                                  @else
                                    Selesai
                                  @endif
                                </td>
                                <td>
                                  <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#EditModalPaket{{$row->id}}" data-id="{{ $row->id }}"><i class="tf-icons bx bx-edit"></i></a>
                                  <button type="button" onclick="return del('{{ $row->id }}')" class="btn btn-danger btn-flat" data-toggle="tooltip" title='Delete'>
                                    <i class="tf-icons bx bx-trash"></i>
                                  </button>

                                  <div class="modal fade" id="EditModalPaket{{$row->id}}" tabindex="-1" aria-hidden="true">
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
                                          <form action="{{route('admin/editpaket')}}" method="post">
                                            @csrf
                                            <div class="col mb-5">
                                              <div class="col mb-3">
                                                <label for="no_resi" class="form-label">No Resi</label>
                                                <input type="hidden" name="id" id="id" class="form-control" placeholder="XXXXXX" required value="{{$row->id}}"/>
                                                <input type="text" name="no_resi" id="no_resi" class="form-control" placeholder="XXXXXX" required value="{{$row->no_resi}}"/>
                                              </div>
                                              <div class="col mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{$row->alamat}}</textarea>
                                              </div>
                                              <div class="col mb-3">
                                                <label for="nama_penerima" class="form-label">Nama Penerima</label>
                                                <input type="text" name="nama_penerima" id="nama_penerima" class="form-control" placeholder="Type Here" required value="{{$row->nama_penerima}}" />
                                              </div>
                                              <div class="col mb-3">
                                                <label for="no_tlpn" class="form-label">No Telepon Penerima</label>
                                                <input type="text" name="no_tlpn" id="no_tlpn" class="form-control" placeholder="Type Here" required value="{{$row->no_tlpn_user}}" />
                                              </div>
                                              <div class="col mb-3">
                                                <label for="berat" class="form-label">Berat (/Kg)</label>
                                                <input type="number" name="berat" id="berat" class="form-control" placeholder="Type Here" required value="{{$row->berat}}"/>
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
            <form action="{{route('admin/createpaket')}}" method="post">
                @csrf
                <div class="col mb-5">
                    <div class="col mb-3">
                      <label for="no_resi" class="form-label">No Resi</label>
                      <input type="text" name="no_resi" id="no_resi" class="form-control" placeholder="XXXXXX" required />
                    </div>
                    <div class="col mb-3">
                      <label for="alamat_pengirim" class="form-label">Alamat Pengirim</label>
                      <textarea class="form-control" id="alamat_pengirim" name="alamat_pengirim" rows="3" required></textarea>
                    </div>
                    <div class="col mb-3">
                        <label for="nama_penerima" class="form-label">Nama Pengirim</label>
                        <input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control" placeholder="Type Here" required />
                    </div>
                    <div class="col mb-3">
                        <label for="no_tlpn_pengirim" class="form-label">No Telepon Pengirim</label>
                        <input type="text" name="no_tlpn_pengirim" id="no_tlpn_pengirim" class="form-control" placeholder="Type Here" required />
                    </div>
                    <div class="col mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                    <div class="col mb-3">
                      <label for="nama_penerima" class="form-label">Nama Penerima</label>
                      <input type="text" name="nama_penerima" id="nama_penerima" class="form-control" placeholder="Type Here" required />
                    </div>
                    <div class="col mb-3">
                      <label for="no_tlpn" class="form-label">No Telepon Penerima</label>
                      <input type="text" name="no_tlpn" id="no_tlpn" class="form-control" placeholder="Type Here" required />
                    </div>
                    <div class="col mb-3">
                      <label for="berat" class="form-label">Berat (/Kg)</label>
                      <input type="number" name="berat" id="berat" class="form-control" placeholder="Type Here" required />
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
        window.location.href = "{{ url('admin/delete-paket') }}"+'/'+id;
      }
    })
  }
</script>
@endsection
