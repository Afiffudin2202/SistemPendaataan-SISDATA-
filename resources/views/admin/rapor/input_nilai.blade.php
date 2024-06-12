@extends('layouts.main')
@section('content')
    <div class="page-content">
        <section class="row">
            {{-- col tengah  --}}
            <div class="col-12 col-lg-12">
                <div class="row">
                    <section class="section">
                        <div class="card p-5">
                            <form action="{{ route('simpan-nilai') }}" method="post">
                                <div class="card-body">
                                    @csrf
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="id_periode" class="form-label">Periode</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <select class="form-select" name="id_periode" id="id_periode">
                                                    <option value="">Pilih Periode</option>
                                                    @foreach ($periode as $periode)
                                                        <option value="{{ $periode->id }}">{{ $periode->nama_periode }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="id_siswa" class="form-label">Siswa</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <select class="form-select" name="id_siswa" id="id_siswa"
                                                    onchange="kualifikasi(this)">
                                                    <option value="">Pilih Siswa</option>
                                                    @foreach ($siswa as $siswa)
                                                        <option value="{{ $siswa->id }}"
                                                            data-kualifikasi="{{ $siswa->kuu->tahun_usia }}">
                                                            {{ $siswa->nama_lengkap }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="usia" class="form-label">Kualifikasi Usia</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" id="usia"
                                                    placeholder="Kualifikasi usia" name="usia" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    {{-- Penilaian Fundamental --}}
                                    <h4>Foundamental</h4>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="passing" class="form-label">Passing</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="passing"
                                                        id="A" value="A">
                                                    <label class="form-check-label" for="A">A</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="passing"
                                                        id="B" value="B">
                                                    <label class="form-check-label" for="B">B</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="passing"
                                                        id="C" value="C">
                                                    <label class="form-check-label" for="C">C</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="passing"
                                                        id="D" value="D">
                                                    <label class="form-check-label" for="D">D</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="dribling" class="form-label">Dribling</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dribling"
                                                        id="A" value="A">
                                                    <label class="form-check-label" for="A">A</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dribling"
                                                        id="B" value="B">
                                                    <label class="form-check-label" for="B">B</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dribling"
                                                        id="C" value="C">
                                                    <label class="form-check-label" for="C">C</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="dribling"
                                                        id="D" value="D">
                                                    <label class="form-check-label" for="D">D</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="control" class="form-label">Control</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="control"
                                                        id="A" value="A">
                                                    <label class="form-check-label" for="A">A</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="control"
                                                        id="B" value="B">
                                                    <label class="form-check-label" for="B">B</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="control"
                                                        id="C" value="C">
                                                    <label class="form-check-label" for="C">C</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="control"
                                                        id="D" value="D">
                                                    <label class="form-check-label" for="D">D</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="intercept" class="form-label">Intercept</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="intercept"
                                                        id="A" value="A">
                                                    <label class="form-check-label" for="A">A</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="intercept"
                                                        id="B" value="B">
                                                    <label class="form-check-label" for="B">B</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="intercept"
                                                        id="C" value="C">
                                                    <label class="form-check-label" for="C">C</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="intercept"
                                                        id="D" value="D">
                                                    <label class="form-check-label" for="D">D</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="heading" class="form-label">Heading</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="heading"
                                                        id="A" value="A">
                                                    <label class="form-check-label" for="A">A</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="heading"
                                                        id="B" value="B">
                                                    <label class="form-check-label" for="B">B</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="heading"
                                                        id="C" value="C">
                                                    <label class="form-check-label" for="C">C</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="heading"
                                                        id="D" value="D">
                                                    <label class="form-check-label" for="D">D</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="shooting" class="form-label">Shooting</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="shooting"
                                                        id="A" value="A">
                                                    <label class="form-check-label" for="A">A</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="shooting"
                                                        id="B" value="B">
                                                    <label class="form-check-label" for="B">B</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="shooting"
                                                        id="C" value="C">
                                                    <label class="form-check-label" for="C">C</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="shooting"
                                                        id="D" value="D">
                                                    <label class="form-check-label" for="D">D</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    {{-- Penilaian Personality --}}
                                    <h4>Personality</h4>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="leadership" class="form-label">Leadership</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="leadership"
                                                        id="A" value="A">
                                                    <label class="form-check-label" for="A">A</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="leadership"
                                                        id="B" value="B">
                                                    <label class="form-check-label" for="B">B</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="leadership"
                                                        id="C" value="C">
                                                    <label class="form-check-label" for="C">C</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="leadership"
                                                        id="D" value="D">
                                                    <label class="form-check-label" for="D">D</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="attitude" class="form-label">Attitude</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="attitude"
                                                        id="A" value="A">
                                                    <label class="form-check-label" for="A">A</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="attitude"
                                                        id="B" value="B">
                                                    <label class="form-check-label" for="B">B</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="attitude"
                                                        id="C" value="C">
                                                    <label class="form-check-label" for="C">C</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="attitude"
                                                        id="D" value="D">
                                                    <label class="form-check-label" for="D">D</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="communication" class="form-label">Communication</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="communication"
                                                        id="A" value="A">
                                                    <label class="form-check-label" for="A">A</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="communication"
                                                        id="B" value="B">
                                                    <label class="form-check-label" for="B">B</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="communication"
                                                        id="C" value="C">
                                                    <label class="form-check-label" for="C">C</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="communication"
                                                        id="D" value="D">
                                                    <label class="form-check-label" for="D">D</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    {{-- Notes --}}
                                    <h4>Notes</h4>
                                    <div class="mb-3">
                                        <input id="notes" type="hidden" name="notes">
                                        <trix-editor input="notes"></trix-editor>
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

    <script>
        function kualifikasi(sel) {
            var selectedOption = $('#id_siswa').find('option:selected');
            var kualifiasi = $('input[name="usia"]');
            kualifiasi.val(selectedOption.data('kualifikasi'));
        }
    </script>
@endsection
