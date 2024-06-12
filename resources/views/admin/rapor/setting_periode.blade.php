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
                                                <form action="{{ route('setting-periode.store') }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="nama_periode" class="form-label">Nama
                                                                Periode</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_periode')
                                                                is-invalid
                                                            @enderror"
                                                                name="nama_periode" id="nama_periode">
                                                            @error('nama_periode')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tanggal_awal" class="form-label">Tanggal
                                                                Awal</label>
                                                            <input type="date" class="form-control" name="tanggal_awal"
                                                                id="tanggal_awal">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tanggal_akhir" class="form-label">Tanggal
                                                                Akhir</label>
                                                            <input type="date" class="form-control" name="tanggal_akhir"
                                                                id="tanggal_akhir">
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
                                            <th>Nama Periode</th>
                                            <th>Tanggal Awal</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($periode as $periode)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $periode->nama_periode }}</td>
                                                <td>{{ $periode->tanggal_awal }}</td>
                                                <td>{{ $periode->tanggal_akhir }}</td>
                                                <td class="">
                                                    <div class="btn-group">
                                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#modalEdit{{ route('setting-periode.edit', $periode) }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>

                                                        {{-- modal edit --}}
                                                        <div class="modal fade text-left"
                                                            id="modalEdit{{ route('setting-periode.edit', $periode) }}"
                                                            tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myModalLabel1">Edit
                                                                            Data</h5>
                                                                        <button type="button" class="close rounded-pill"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                            <i data-feather="x"></i>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ url('setting-periode/'. $periode->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="nama_periode"
                                                                                    class="form-label">Nama Periode</label>
                                                                                <input type="text"
                                                                                    class="form-control @error('nama_periode')   is-invalid @enderror"
                                                                                    name="nama_periode" id="nama_periode"
                                                                                    value="{{ $periode->nama_periode }}">
                                                                                @error('nama_periode')
                                                                                    <div class="invalid-feedback">
                                                                                        {{ $message }}
                                                                                    </div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="tanggal_awal"
                                                                                    class="form-label">Tanggal Awal</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="tanggal_awal" id="tanggal_awal"
                                                                                    value="{{ $periode->tanggal_awal }}">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="tanggal_akhir"
                                                                                    class="form-label">Tanggal
                                                                                    Akhir</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="tanggal_akhir"
                                                                                    id="tanggal_akhir"
                                                                                    value="{{ $periode->tanggal_akhir }}">
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn"
                                                                                data-bs-dismiss="modal">
                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                <span
                                                                                    class="d-none d-sm-block">Batal</span>
                                                                            </button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary ms-1"
                                                                                data-bs-dismiss="modal">
                                                                                <i
                                                                                    class="bx bx-check d-block d-sm-none"></i>
                                                                                <span
                                                                                    class="d-none d-sm-block">Simpan</span>
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- modal edit end --}}
                                                        <form id="deleteForm"
                                                            action="{{ url('setting-periode/'.$periode->id) }}"
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
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
