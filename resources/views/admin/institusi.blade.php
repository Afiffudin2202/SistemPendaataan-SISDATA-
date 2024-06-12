@extends('layouts.main')
@section('content')
    <div class="page-content">
        <section class="row">
            {{-- col tengah  --}}
            <div class="col-12 col-lg-12">
                <div class="row">
                    <section class="section">
                        <div class="card">

                            {{-- Form --}}
                            <form action="{{ route('tambah_institusi') }}" method="post">
                                <div class="card-body">
                                    @csrf
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="nama_institusi" class="form-label">Nama Institusi</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" name="nama_institusi"
                                                    id="nama_institusi" placeholder="Nama Institusi" value="{{ $dataInstitusi ? $dataInstitusi->nama_institusi : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="alamat" class="form-label">Alamat</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" name="alamat" id="alamat"
                                                    placeholder="Alamat" value="{{ $dataInstitusi ?  $dataInstitusi->alamat  : ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="no_tlp" class="form-label">Nomor Telepon</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="number" class="form-control" name="no_tlp" id="no_tlp"
                                                    placeholder="No Telepon" value="{{ $dataInstitusi ?  $dataInstitusi->no_tlp : ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="email" class="form-label">Email</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" name="email" id="email"
                                                    placeholder="Email" value="{{ $dataInstitusi ? $dataInstitusi->email : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="instagram" class="form-label">Instagram</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" name="instagram" id="instagram"
                                                    placeholder="instagram" value="{{ $dataInstitusi ?  $dataInstitusi->instagram  : ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="tiktok" class="form-label">Tiktok</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" name="tiktok" id="tiktok"
                                                    placeholder="tiktok" value="{{ $dataInstitusi ? $dataInstitusi->tiktok : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="nama_pimpinan" class="form-label">Nama Pimpinan</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" name="nama_pimpinan"
                                                    id="nama_pimpinan" placeholder="nama pimpinan"
                                                    @if ($dataInstitusi) value="{{ $dataInstitusi ? $dataInstitusi->nama_pimpinan : '' }}" @endif>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <h5 class="card-title">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </h5>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
