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
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">Tambah Data</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="{{ route('siswa.store') }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <label for="id_institusi" class="form-label">Kualifiasi
                                                                        Usia</label>
                                                                    <select name="id_ku" id="id_ku"
                                                                        class="form-select">
                                                                        @foreach ($kUmur as $item)
                                                                            <option value="{{ $item->id }}">
                                                                                {{ $item->tahun_usia }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-4">
                                                                    <label for="nama_lengkap" class="form-label">Nama
                                                                        Lengkap</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nama_lengkap" id="nama_lengkap">
                                                                </div>
                                                                <div class="col-4"> <label for="nama_panggilan"
                                                                        class="form-label">Nama Panggilan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_panggilan" name="nama_panggilan">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-4"><label for="tpt_lahir"
                                                                        class="form-label">Tempat Lahir</label>
                                                                    <input type="text" class="form-control"
                                                                        name="tpt_lahir" id="tpt_lahir">
                                                                </div>
                                                                <div class="col-4"> <label for="tgl_lahir"
                                                                        class="form-label">Tanggal Lahir</label>
                                                                    <input type="date" class="form-control"
                                                                        id="tgl_lahir" name="tgl_lahir">
                                                                </div>
                                                                <div class="col-4"><label for="status"
                                                                        class="form-label">Status</label>
                                                                    <select name="status" id="status"
                                                                        class="form-select">
                                                                        <option value="0">Non Aktif</option>
                                                                        <option value="1">Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-4"> <label for="asal_sekolah"
                                                                        class="form-label">Asal Sekolah</label>
                                                                    <input type="text" class="form-control"
                                                                        name="asal_sekolah" id="asal_sekolah">
                                                                </div>
                                                                <div class="col-4"> <label for="alamat"
                                                                        class="form-label">Alamat</label>
                                                                    <input type="text" class="form-control"
                                                                        name="alamat" id="alamat">
                                                                </div>
                                                                <div class="col-4"> <label for="agama"
                                                                        class="form-label">Agama</label>
                                                                    <select name="agama" id="agama"
                                                                        class="form-select">
                                                                        <option value="">Pilih Agama</option>
                                                                        <option value="Islam">Islam</option>
                                                                        <option value="Kristen">Kristen</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h3>Data Orang Tua</h3>
                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-4"> <label for="nama_ayah"
                                                                        class="form-label">Nama Ayah</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nama_ayah" id="nama_ayah">
                                                                </div>
                                                                <div class="col-4"> <label for="nama_ibu"
                                                                        class="form-label">Nama Ibu</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nama_ibu" id="nama_ibu">
                                                                </div>
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
                                            <th>Nama Lengap</th>
                                            <th>Nama Panggilan</th>
                                            <th>Kuaifikasi Umur</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->nama_panggilan }}</td>
                                                <td>{{ $item->kuu->tahun_usia }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                        <span class="badge bg-danger">Non Aktif</span>
                                                    @endif
                                                </td>
                                                <td class="">
                                                    <div class="btn-group">
                                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#modalEdit{{ route('siswa.edit', $item) }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>

                                                        {{-- modal edit --}}
                                                        <div class="modal fade text-left"
                                                            id="modalEdit{{ route('siswa.edit', $item) }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="myModalLabel1"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-scrollable"
                                                                role="document">
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
                                                                    <form action="{{ route('siswa.update', $item) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <div class="row">
                                                                                    <div class="col-4">
                                                                                        <label for="id_institusi"
                                                                                            class="form-label">Kualifiasi
                                                                                            Usia</label>

                                                                                        <select name="id_ku"
                                                                                            id="id_ku"
                                                                                            class="form-select">
                                                                                            <option
                                                                                                value="{{ $item->id_ku }}">
                                                                                                {{ $item->kuu->tahun_usia }}
                                                                                            </option>
                                                                                            @foreach ($kUmur as $umur)
                                                                                                <option
                                                                                                    value="{{ $umur->id }}">
                                                                                                    {{ $umur->tahun_usia }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <label for="nama_lengkap"
                                                                                            class="form-label">Nama
                                                                                            Lengkap</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="nama_lengkap"
                                                                                            id="nama_lengkap"
                                                                                            value="{{ $item->nama_lengkap }}">
                                                                                    </div>
                                                                                    <div class="col-4"> <label
                                                                                            for="nama_panggilan"
                                                                                            class="form-label">Nama
                                                                                            Panggilan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="nama_panggilan"
                                                                                            name="nama_panggilan"
                                                                                            value="{{ $item->nama_panggilan }}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <div class="row">
                                                                                    <div class="col-4"><label
                                                                                            for="tpt_lahir"
                                                                                            class="form-label">Tempat
                                                                                            Lahir</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="tpt_lahir"
                                                                                            id="tpt_lahir"
                                                                                            value="{{ $item->tpt_lahir }}">
                                                                                    </div>
                                                                                    <div class="col-4"> <label
                                                                                            for="tgl_lahir"
                                                                                            class="form-label">Tanggal
                                                                                            Lahir</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            id="tgl_lahir"
                                                                                            name="tgl_lahir"
                                                                                            value="{{ $item->tgl_lahir }}">
                                                                                    </div>
                                                                                    <div class="col-4"><label
                                                                                            for="status"
                                                                                            class="form-label">Status</label>
                                                                                        <select name="status"
                                                                                            id="status"
                                                                                            class="form-select">
                                                                                            <option
                                                                                                value="{{ $item->status }}">
                                                                                                {{ $item->status === '1' ? 'Aktif' : 'Non Aktif' }}
                                                                                            </option>
                                                                                            <option value="0">Non
                                                                                                Aktif</option>
                                                                                            <option value="1">Aktif
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <div class="row">
                                                                                    <div class="col-4"> <label
                                                                                            for="asal_sekolah"
                                                                                            class="form-label">Asal
                                                                                            Sekolah</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="asal_sekolah"
                                                                                            id="asal_sekolah"
                                                                                            value="{{ $item->asal_sekolah }}">
                                                                                    </div>
                                                                                    <div class="col-4"> <label
                                                                                            for="alamat"
                                                                                            class="form-label">Alamat</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="alamat" id="alamat"
                                                                                            value="{{ $item->alamat }}">
                                                                                    </div>
                                                                                    <div class="col-4"> <label
                                                                                            for="agama"
                                                                                            class="form-label">Agama</label>
                                                                                        <select name="agama"
                                                                                            id="agama"
                                                                                            class="form-select">
                                                                                            <option
                                                                                                value="{{ $item->agama }}">
                                                                                                {{ $item->agama }}
                                                                                            </option>
                                                                                            <option value="Islam">Islam
                                                                                            </option>
                                                                                            <option value="Kristen">Kristen
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <h3>Data Orang Tua</h3>
                                                                            <div class="mb-3">
                                                                                <div class="row">
                                                                                    <div class="col-4"> <label
                                                                                            for="nama_ayah"
                                                                                            class="form-label">Nama
                                                                                            Ayah</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="nama_ayah"
                                                                                            id="nama_ayah">
                                                                                    </div>
                                                                                    <div class="col-4"> <label
                                                                                            for="nama_ibu"
                                                                                            class="form-label">Nama
                                                                                            Ibu</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="nama_ibu"
                                                                                            id="nama_ibu">
                                                                                    </div>
                                                                                </div>
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
                                                            action="{{ route('siswa.destroy', $item) }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm(event)">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                        <button class="btn btn-success btn-sm" onclick="window.location='{{ route('siswa.show', $item) }}'"><i class="bi bi-three-dots"></i></button>
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
