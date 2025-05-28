<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Pengembalian</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            padding: 15px;
            border: 2px solid #000;
            background-color: #f3f4f6;
            /* abu-abu muda */
            border-radius: 8px;
        }

        h1,
        h2 {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #e5e7eb;
            /* abu-abu lebih gelap untuk header tabel */
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Tracking Peminjaman Barang Polindra</h1>
        <h2>Laporan Pengembalian Barang</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Unit Kerja</th>
                <th>Nama Kegiatan</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Status Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $mahasiswa_id => $items)
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mahasiswa->name ?? 'Tidak diketahui' }}</td>
                        <td>{{ $item->permohonan->unit_kerja }}</td>
                        <td>{{ $item->permohonan->nama_kegiatan }}</td>
                        <td>{{ $item->permohonan->barang->nama_barang ?? 'Barang tidak tersedia' }}</td>
                        <td>{{ $item->permohonan->jumlah }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->permohonan->hari_atau_tanggal)->translatedFormat('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->permohonan->waktu_mulai)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->permohonan->waktu_selesai)->format('H:i') }}</td>
                        <td>{{ $item->status_pengembalian ?? 'Belum dikembalikan' }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>