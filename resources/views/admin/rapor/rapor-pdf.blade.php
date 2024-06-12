<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Rapor PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .a4 {
            width: 150mm;
            padding: 10mm;
            margin: 0 auto;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }

        .biodata {
            width: 100%;
        }

        .wrapper {
            width: 100%;
            display: flex;
            flex-direction: column;
            /* align-items: center; */
        }

        .row {
            width: 100%;
            display: flex;
            flex-direction: row;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        h4 {
            text-align: left;
            color: #333;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;

        }

        .table,
        th,
        td {
            border: 1px solid #ccc;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .notes {
            width: 100%;
        }

        .tabel-ttd tr>td {
            border: none;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="a4">
        <div class="wrapper">
            <h1 style="background-color: blue; padding: 20px;">FOOTBALL REPORT</h1>
            <div class="row">
                <div class="biodata">
                    <table>
                        <tr>
                            <td style="border: none; font-weight:bold;">Nama : {{ $rapor->siswa->nama_lengkap }}</td>
                            <td style="text-align: right;border:none; font-weight:bold;">Kelompok Usia :
                                {{ $rapor->siswa->kuu->tahun_usia }}</td>
                        </tr>
                    </table>
                    <hr>
                </div>
                <div class="col-6">
                    <h4>Foundamental</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Passing</td>
                                <td>{{ $rapor->passing }}</td>
                            </tr>
                            <tr>
                                <td>Dribling</td>
                                <td>{{ $rapor->dribling }}</td>
                            </tr>
                            <tr>
                                <td>Control</td>
                                <td>{{ $rapor->control }}</td>
                            </tr>
                            <tr>
                                <td>Intercept</td>
                                <td>{{ $rapor->intercept }}</td>
                            </tr>
                            <tr>
                                <td>Heading</td>
                                <td>{{ $rapor->heading }}</td>
                            </tr>
                            <tr>
                                <td>Shooting</td>
                                <td>{{ $rapor->shooting }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <h4>Personality</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Leadership</td>
                                <td>{{ $rapor->leadership }}</td>
                            </tr>
                            <tr>
                                <td>Attitude</td>
                                <td>{{ $rapor->attitude }}</td>
                            </tr>
                            <tr>
                                <td>Communication</td>
                                <td>{{ $rapor->communication }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="notes">
                    <h4>Notes</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur dolore dolorem
                                    fugiat modi saepe deleniti unde, veritatis eos ex asperiores aliquam debitis, quae,
                                    officiis ratione!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ttd --}}
            <table class="tabel-ttd">
                <tbody>
                    <tr>
                        <td colspan="2">Subang, 22 mei 2024</td>
                    </tr>
                    <tr>
                        <td>Wali Siswa
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            ..............
                        </td>
                        <td>Head coach
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            Afiffudin
                        </td>
                    </tr>
                    {{-- <tr >
                        <td >...................</td>
                        <td >Afiffudin</td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
