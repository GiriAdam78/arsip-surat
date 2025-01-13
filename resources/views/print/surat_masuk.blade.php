<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat Masuk</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
            font-family: Arial, Helvetica, sans-serif
        }
        h1{
            font-family: Arial, Helvetica, sans-serif;
            text-align: center
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
    <h1>Laporan Surat Masuk</h1>
    <p>Data Semua Surat Masuk</p>
    <hr/>

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