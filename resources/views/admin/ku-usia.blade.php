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
                                                <form action="{{ url('/ku-usia') }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p>
                                                        <div class="mb-3">
                                                            <label for="tahun_usia" class="form-label">Tahun Usia</label>
                                                            <input type="text"
                                                                class="form-control @error('tahun_usia')
                                                                is-invalid
                                                            @enderror"
                                                                name="tahun_usia" id="tahun_usia">
                                                            @error('tahun_usia')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jumlah_siswa" class="form-label">Jumlah
                                                                Siswa</label>
                                                            <input type="text" class="form-control" name="jumlah_siswa"
                                                                id="jumlah_siswa">
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
                                            <th>Tahun Usia</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ku as $usia)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $usia->tahun_usia }}</td>
                                                <td>{{ $usia->jumlah_siswa }}</td>
                                                <td class="">
                                                    <div class="btn-group">
                                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#modalEdit{{ route('ku-usia.edit', $usia) }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>

                                                        {{-- modal edit --}}
                                                        <div class="modal fade text-left"
                                                            id="modalEdit{{ route('ku-usia.edit', $usia) }}" tabindex="-1"
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
                                                                    <form action="{{ route('ku-usia.update', $usia) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="modal-body">
                                                                            <p>
                                                                            <div class="mb-3">
                                                                                <label for="id_institusi"
                                                                                    class="form-label">Tahun Usia</label>
                                                                                <input type="text"
                                                                                    class="form-control @error('tahun_usia')
                                                                is-invalid
                                                            @enderror"
                                                                                    name="tahun_usia" id="tahun_usia"
                                                                                    value="{{ $usia->tahun_usia }}">
                                                                                @error('tahun_usia')
                                                                                    <div class="invalid-feedback">
                                                                                        {{ $message }}
                                                                                    </div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="jumlah_siswa"
                                                                                    class="form-label">Jumlah Siswa</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="jumlah_siswa" id="jumlah_siswa"
                                                                                    value="{{ $usia->jumlah_siswa }}">
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
                                                            action="{{ route('ku-usia.destroy', $usia)}}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm(event)">
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
