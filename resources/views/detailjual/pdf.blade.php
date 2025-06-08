<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Detail Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Detail Penjualan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pesan</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->penjualan->tanggal_pesan }}</td>
                <td>{{ $item->barang->nama }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
