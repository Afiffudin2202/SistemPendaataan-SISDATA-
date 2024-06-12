@extends('layouts.main')
@section('content')
    <div class="page-content">
        <section class="row">
            {{-- col tengah  --}}
            <div class="col-12 col-lg-12">
                <div class="row">
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Periode</th>
                                            <th>Nama Siswa</th>
                                            <th>Kualifikasi Umur</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rapors as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->periode->nama_periode }}</td>
                                                <td>{{ $item->siswa->nama_lengkap }}</td>
                                                <td>{{ $item->siswa->kuu->tahun_usia }}</td>
                                                
                                                <td class="">
                                                    <div class="btn-group ">
                                                        <button class="btn btn-warning" onclick="window.location='{{ route('edit-nilai', $item->id) }}'">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                        {{-- <a class="btn btn-success" href="{{ route('input-nilai.show', $item) }}">
                                                            <i class="bi bi-eye"></i>
                                                        </a> --}}
                                                        <button class="btn btn-primary" onclick="window.location='{{ route('download-rapor', $item->id) }}'">
                                                            <i class="bi bi-download"></i>
                                                        </button>
                                                        <form id="deleteForm" action="{{ route('delete-rapor', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger rounded-0"
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
