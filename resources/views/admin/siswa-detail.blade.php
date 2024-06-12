@extends('layouts.main')
@section('content')
    <div class="page-content">
        <section class="row">
            {{-- col kiri --}}
            <div class="col-3 col-lg-3 ">
                <div class="row">
                    <section class="section">
                        <div class="card ">
                            <div class="card-header text-center ">
                                <div class="card-title">
                                    <h5>{{ $siswa->nama_lengkap }}</h5>
                                </div>
                                <hr>
                                <p>{{ $siswa->kuu->tahun_usia }}</p>
                            </div>
                            <div class="button-aksi row m-0 p-2 gap-1">
                                    <button class="btn btn-success" onclick="window.location='{{ route('siswa.index') }}'"><i class="bi bi-arrow-return-left"></i>  Kembali</button>
                                    <button class="btn btn-warning "><i class="bi bi-pencil-square"></i> Edit</button>
                            </div>
                        </div>
                        <div class="card p-3">
                            <div class="data-rapor">
                                <h5>Nilai rapor terakhir</h5>
                                <hr>
                                <div class="row m-0 justify-content-between p-0">
                                    <div class="col-lg-6 p-0">2023</div>
                                    <div class="col-lg-6 ">100</div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            {{-- col kanan --}}
            <div class="col-9 col-lg-9">
                <div class="row">
                    <section class="section">
                        <div class="card">
                            <div class="data-diri">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h5>Data Diri</h5>
                                        <hr>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row m-0">
                                        <div class="col-6 col-lg-6">
                                            <p class="fw-bold">Nama Lengkap</p>
                                        </div>
                                        <div class="col-6 col-lg-6">{{ $siswa->nama_lengkap }}</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-lg-6">
                                            <p class="fw-bold">Nama Panggilan</p>
                                        </div>
                                        <div class="col-6 col-lg-6">{{ $siswa->nama_panggilan }}</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-lg-6">
                                            <p class="fw-bold">Agama</p>
                                        </div>
                                        <div class="col-6 col-lg-6">{{ $siswa->agama }}</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-lg-6">
                                            <p class="fw-bold">Tempat Lahir</p>
                                        </div>
                                        <div class="col-6 col-lg-6">{{ $siswa->tpt_lahir }}</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-lg-6">
                                            <p class="fw-bold">Tanggal Lahir</p>
                                        </div>
                                        <div class="col-6 col-lg-6">{{ $siswa->tgl_lahir }}</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-lg-6">
                                            <p class="fw-bold">Kualifikasi Umur</p>
                                        </div>
                                        <div class="col-6 col-lg-6">{{ $siswa->kuu->tahun_usia }}</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-lg-6">
                                            <p class="fw-bold">Asal Sekolah</p>
                                        </div>
                                        <div class="col-6 col-lg-6">{{ $siswa->asal_sekolah }}</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-lg-6">
                                            <p class="fw-bold">Alamat</p>
                                        </div>
                                        <div class="col-6 col-lg-6">{{ $siswa->alamat }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="data-orangtua">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h5>Data Orang Tua</h5>
                                        <hr>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row m-0">
                                        <div class="col-6 col-lg-6">
                                            <p class="fw-bold">Nama Ayah</p>
                                        </div>
                                        <div class="col-6 col-lg-6">{{ $siswa->nama_ayah }}</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-6 col-lg-6">
                                            <p class="fw-bold">Nama Ibu</p>
                                        </div>
                                        <div class="col-6 col-lg-6">{{ $siswa->nama_ibu }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
