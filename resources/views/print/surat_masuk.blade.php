<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat Masuk</title>

    <style>
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
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px
        }
        p{
            font-family: Arial, Helvetica, sans-serif;
            text-align: center
        }
        .text-align{
            text-align: right;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Laporan Surat Masuk</h1>
    <p class="text-center">Data Semua Surat Masuk</p>
    <hr style="border-size:1px"/>

    <table>
        <thead>
            <tr>
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
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->nomor_agenda }}</td>
                <td>{{ $item->tanggal_masuk }}</td>
                <td>{{ $item->asal_surat }}</td>
                <td>{{ $item->nomor_surat }}</td>
                <td>{{ $item->tanggal_surat }}</td>
                <td>{{ $item->perihal }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->sifat_surat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p class="text-align">Jakarta, {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
    <script>
        window.print();
    </script>
</body>
</html>