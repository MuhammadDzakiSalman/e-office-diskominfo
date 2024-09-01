<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Keluar</title>
    <style>
        @page {
            size: landscape;
        }
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Laporan Surat Keluar</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. Surat</th>
                <th>Judul Surat</th>
                <th>Jenis Surat</th>
                <th>Tujuan</th>
                <th>Tanggal Keluar</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->no_surat_keluar }}</td>
                <td>{{ $surat->judul_surat_keluar }}</td>
                <td>{{ $surat->jenis_surat }}</td>
                <td>{{ $surat->tujuan }}</td>
                <td>{{ $surat->tanggal_keluar }}</td>
                <td>{{ $surat->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
