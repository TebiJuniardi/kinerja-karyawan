@extends('layout.app')
@section('body')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Jadwal Pengiriman</h5>
            <div class="card-body">
                <div class="col-md-12">
                    <div>
                        <a href="#">
                            <button
                              type="button"
                              class="btn btn-primary"
                              data-bs-toggle="modal"
                              data-bs-target="#ModalPaket"
                            >
                              Tambah Jadwal Kirim
                            </button>
                        </a>
                        <a href={{asset('template/template.xlsx')}}>
                            <button type="button"
                            class="btn btn-success">
                                Download Template <i class='bx bx-download'></i>
                            </button>
                        </a>
                    </div>

                    <div class="col-md-12">

                    </div>
                    <p></p>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jadwal</th>
                                    <th>No Resi</th>
                                    <th>Nama Driver</th>
                                    <th>Alamat Tujuan</th>
                                    <th>Detail Paket</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->jadwal_pengiriman}}</td>
                                        <td>{{$row->no_resi}}</td>
                                        <td>{{$row->driver}}</td>
                                        <td>{{$row->alamat}}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#detailPaket{{$row->id}}" data-id="{{ $row->id }}" title="Detail Paket"><i class='bx bx-info-circle'></i></a>


                                            <div class="modal fade" id="detailPaket{{$row->id}}" tabindex="-1" aria-hidden="true">
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
                                                            <input type="hidden" name="id" id="id" class="form-control" placeholder="XXXXXX" readonly value="{{$row->id}}"/>
                                                            <input type="text" name="no_resi" id="no_resi" class="form-control" placeholder="XXXXXX" readonly value="{{$row->no_resi}}" />
                                                          </div>
                                                          <div class="col mb-3">
                                                            <label for="alamat" class="form-label">Alamat</label>
                                                            <textarea class="form-control" id="alamat" name="alamat" rows="3" readonly>{{$row->alamat}}</textarea>
                                                          </div>
                                                          <div class="col mb-3">
                                                            <label for="nama_penerima" class="form-label">Nama Penerima</label>
                                                            <input type="text" name="nama_penerima" id="nama_penerima" class="form-control" placeholder="Type Here" readonly value="{{$row->nama_penerima}}" />
                                                          </div>
                                                          <div class="col mb-3">
                                                            <label for="no_tlpn" class="form-label">No Telepon Penerima</label>
                                                            <input type="text" name="no_tlpn" id="no_tlpn" class="form-control" placeholder="Type Here" readonly value="{{$row->no_tlpn_user}}" />
                                                          </div>
                                                          <div class="col mb-3">
                                                            <label for="berat" class="form-label">Berat (/Kg)</label>
                                                            <input type="number" name="berat" id="berat" class="form-control" placeholder="Type Here" readonly value="{{$row->berat}}"/>
                                                          </div>

                                                          @if ($row->attachment != null)
                                                          <div class="col mb-3">
                                                            <label for="attahemnt" class="form-label">Lampiran Pengiriman</label>
                                                            <div class="text-left">
                                                                <a href="{{ URL::to('/') }}/paket/{{$row->attachment}}" target="__blank">
                                                                    <img src="{{ URL::to('/') }}/paket/{{$row->attachment}}" class="rounded" width="50%">
                                                                </a>
                                                              </div>
                                                          </div>
                                                          @endif
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
                                        <td>{{$row->status}}</td>
                                        <td>
                                            @if ($row->status == 'Belum Selesai')
                                                <button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#selesaiPaket{{$row->id}}" data-id="{{ $row->id }}" title="{{$row->status}}">
                                                    @if ($row->status =='Belum Selesai')
                                                        <i class='bx bx-checkbox'></i>
                                                    @else
                                                        <i class='bx bx-checkbox-checked'></i>
                                                    @endif
                                                </button>
                                            @endif

                                            <div class="modal fade" id="selesaiPaket{{$row->id}}" tabindex="-1" aria-hidden="true">
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
                                                      <form action="{{route('driver/selesaiPaket')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="col mb-5">
                                                            <div class="col mb-3">
                                                                <label for="image">Foto</label>
                                                                <select class="form-select" id="exampleFormControlSelect1" name="status" id="status" aria-label="Default select example">
                                                                    <option selected>{{$row->status}}</option>
                                                                    <option value="1">Selesai</option>
                                                                    <option value="0">Belum Selesai</option>
                                                                </select>
                                                            </div>
                                                            <div class="col mb-3">
                                                                <label for="image">Foto</label>
                                                                <input class="form-control" type="file" id="formFile" name="image" required/>
                                                            </div>
                                                            <div class="col mb-3">
                                                                <input class="form-control" type="hidden" id="id" name="id" value="{{$row->id}}" required/>
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
            <form action="{{route('admin/importjadwalkirim')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col mb-12">
                    <div class="col mb-3">
                      <label for="Tanggal Kirim" class="form-label">Tanggal Kirim</label>
                      <input type="date" name="jadwalKirim" id="jadwalKirim" class="form-control" required />
                    </div>
                    <div class="col mb-3">
                      <label for="file_excel" class="form-label">file</label>
                      <input type="file" name="file_excel" id="file_excel" class="form-control" placeholder="Type Here" required />
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
      title: 'Paket selesai',
      text: "klik oke untuk merubah status menjadi selesai!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Oke',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        window.location.href = "{{ url('driver/selesai-paket') }}"+'/'+id;
      }
    })
  }
</script>
@endsection
