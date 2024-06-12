@extends('layouts.main')
@section('content')
    <div class="page-content">
        <section class="row">
            {{-- col tengah  --}}
            <div class="col-12 col-lg-12">
                <div class="row">
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#modalTambah">
                                        Tambah Data
                                    </button>
                                    <!--Tambah Modal -->
                                    <div class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">Tambah Data</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="{{ route('staff.store') }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label for="id_institusi" class="form-label">Nama
                                                                        divisi</label>
                                                                    <select name="id_divisi" id="id_divisi"
                                                                        class="form-select">
                                                                        @foreach ($divisi as $divisi)
                                                                            <option value="{{ $divisi->id }}">
                                                                                {{ $divisi->nama_divisi }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="nama_divisi" class="form-label">Nama
                                                                        Lengkap</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nama_staff" id="nama_staff">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6"> <label for="alamat"
                                                                        class="form-label">Alamat</label>
                                                                    <input type="text" class="form-control"
                                                                        id="alamat" name="alamat">
                                                                </div>
                                                                <div class="col-6"><label for="tpt_lahir"
                                                                        class="form-label">Tempat Lahir</label>
                                                                    <input type="text" class="form-control"
                                                                        name="tpt_lahir" id="tpt_lahir">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6"> <label for="tgl_lahir"
                                                                        class="form-label">Tanggal Lahir</label>
                                                                    <input type="date" class="form-control"
                                                                        id="tgl_lahir" name="tgl_lahir">
                                                                </div>
                                                                <div class="col-6"><label for="status"
                                                                        class="form-label">Status</label>
                                                                    <select name="status" id="status"
                                                                        class="form-control">
                                                                        <option value="0">Non Aktif</option>
                                                                        <option value="1">Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-6"> <label for="no_tlp"
                                                                        class="form-label">Nomor HP</label>
                                                                    <input type="number" class="form-control"
                                                                        name="no_tlp" id="no_tlp">
                                                                </div>
                                                                <div class="col-6"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Batal</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ms-1"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Simpan</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama </th>
                                            <th>Nama Divisi</th>
                                            <th>HP</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_staff }}</td>
                                                <td>{{ $item->divisi->nama_divisi }}</td>
                                                <td>{{ $item->no_tlp }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                     <span class="badge bg-danger">Non Aktif</span>
                                                    @endif
                                                </td>
                                                <td class="">
                                                    <div class="btn-group">
                                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#modalEdit{{ route('staff.edit', $item) }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>

                                                        <form id="deleteForm" action="{{ route('staff.destroy', $item) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm(event)">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    @foreach ($staff as $item)
                                        {{-- modal edit --}}
                                        <div class="modal fade text-left" id="modalEdit{{ route('staff.edit', $item) }}"
                                            tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel1">
                                                            Edit
                                                            Data</h5>
                                                        <button type="button" class="close rounded-pill"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('staff.update', $item) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-body">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <label for="id_divisi" class="form-label">Nama
                                                                                divisi</label>
                                                                            <select name="id_divisi" id="id_divisi"
                                                                                class="form-select">
                                                                                <option value="{{ $item->id_divisi }}">
                                                                                    {{ $item->divisi->nama_divisi }}
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="nama_divisi"
                                                                                class="form-label">Nama
                                                                                Lengkap</label>
                                                                            <input type="text" class="form-control"
                                                                                name="nama_staff" id="nama_staff"
                                                                                value="{{ $item->nama_staff }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="row">
                                                                        <div class="col-6"> <label for="alamat"
                                                                                class="form-label">Alamat</label>
                                                                            <input type="text" class="form-control"
                                                                                id="alamat" name="alamat"
                                                                                value="{{ $item->alamat }}">
                                                                        </div>
                                                                        <div class="col-6"><label for="tpt_lahir"
                                                                                class="form-label">Tempat
                                                                                Lahir</label>
                                                                            <input type="text" class="form-control"
                                                                                name="tpt_lahir" id="tpt_lahir"
                                                                                value="{{ $item->tpt_lahir }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="row">
                                                                        <div class="col-6"> <label for="tgl_lahir"
                                                                                class="form-label">Tanggal
                                                                                Lahir</label>
                                                                            <input type="date" class="form-control"
                                                                                id="tgl_lahir" name="tgl_lahir"
                                                                                value="{{ $item->tgl_lahir }}">
                                                                        </div>
                                                                        <div class="col-6"><label for="status"
                                                                                class="form-label">Status</label>
                                                                            <select name="status" id="status"
                                                                                class="form-control">
                                                                                <option selected
                                                                                    value= "{{ $item->status }}">
                                                                                    {{ $item->status == 1 ? 'Aktif ' : 'Non Aktif' }}
                                                                                </option>
                                                                                <option value="0">
                                                                                    Non
                                                                                    Aktif</option>
                                                                                <option value="1">
                                                                                    Aktif</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="row">
                                                                        <div class="col-6"> <label for="no_tlp"
                                                                                class="form-label">Nomor
                                                                                HP</label>
                                                                            <input type="number" class="form-control"
                                                                                name="no_tlp" id="no_tlp"
                                                                                value="{{ $item->no_tlp }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Batal</span>
                                                                </button>
                                                                <button type="submit" class="btn btn-primary ms-1"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Simpan</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- modal edit end --}}
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </section>
    </div>
@endsection
