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
                                                <form action="{{ route('divisi.store') }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p>
                                                        <div class="mb-3">
                                                            <label for="id_institusi" class="form-label">Nama
                                                                Institusi</label>
                                                            <select name="id_institusi" id="id_institusi"
                                                                class="form-control">
                                                                <option value="{{ $institusi->id }}">
                                                                    {{ $institusi->nama_institusi }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nama_divisi" class="form-label">Nama Divisi</label>
                                                            <input type="text" class="form-control" name="nama_divisi"
                                                                id="nama_divisi">
                                                        </div>
                                                        </p>
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
                                            <th>Nama Perusahaan</th>
                                            <th>Nama Divisi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($divisi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->institusi->nama_institusi }}</td>
                                                <td>{{ $item->nama_divisi }}</td>
                                                <td class="">
                                                    <div class="btn-group">
                                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#modalEdit{{ route('divisi.edit', $item) }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>

                                                        {{-- modal edit --}}
                                                        <div class="modal fade text-left"
                                                            id="modalEdit{{ route('divisi.edit', $item) }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="myModalLabel1"
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
                                                                    <form action="{{ route('divisi.update', $item) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="modal-body">
                                                                            <p>
                                                                            <div class="mb-3">
                                                                                <label for="id_institusi"
                                                                                    class="form-label">Nama
                                                                                    Institusi</label>
                                                                                <select name="id_institusi"
                                                                                    id="id_institusi" class="form-control">
                                                                                    <option value="{{ $institusi->id }}">
                                                                                        {{ $institusi->nama_institusi }}
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="nama_divisi"
                                                                                    class="form-label">Nama Divisi</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="nama_divisi" id="nama_divisi"
                                                                                    value="{{ $item->nama_divisi }}">
                                                                            </div>
                                                                            </p>
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
                                                            action="{{ route('divisi.destroy', $item) }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm(event)">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
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
