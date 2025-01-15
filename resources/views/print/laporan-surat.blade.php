<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Masuk - {{ $tanggalMasuk }}</title>
    <style>
        /* Gaya CSS untuk PDF */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th{
            background: #3b82f6;
            color: #fff;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #cbd5e1;
            padding: 8px;
            text-align: center;
        }
        .text-center{
            text-align: center
        }
        h1{
            font-size: 20px;
        }
        .float-right{
            float: right;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h1 class="text-center">Laporan Data Surat Masuk</h1>
    <p class="text-center">Tanggal Laporan : {{ $tanggalMasuk }}</p>
    <hr/>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Agenda</th>
                <th>Tanggal Masuk</th>
                <th>Asal Surat</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Perihal</th>
                <th>Keterangan</th>
                <th>Sifat Surat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratMasuk as $index => $surat)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $surat->nomor_agenda }}</td>
                    <td>{{ $surat->tanggal_masuk }}</td>
                    <td>{{ $surat->asal_surat }}</td>
                    <td>{{ $surat->nomor_surat }}</td>
                    <td>{{ $surat->tanggal_surat }}</td>
                    <td>{{ $surat->perihal }}</td>
                    <td>{{ $surat->keterangan }}</td>
                    <td>{{ $surat->sifat_surat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="float-right">
        <p> Jakarta, {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
    </div>
</body>
</html>