<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRENEUR OFFICIAL</title>
    <style>
        body {
            font-size: 12px;
        }

        h3 {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 5px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: #595959;
        }

        .section2 {
            width: 100%;
            height: 50px;
            font-family: calibri;
            background-color: #7E97AD;
            color: #fff;
        }

        .h2-section2 {
            margin-left: 20px;
            line-height: 50px;
        }

        .section3 {
            margin-top: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        table th {
            background-color: #5a5c69;
            color: #fff;
            text-align: left;
        }

        tr:nth-child(even) {
            background: #E5EAEE;
        }
    </style>
</head>

<body>
    <section class="section1">
        <form action="/laporan/pengeluaran/pertanggal/download" method="get" target="_blank">
            <input type="hidden" name="tanggal_awal" value="{{ $tanggal_awal }}">
            <input type="hidden" name="tanggal_akhir" value="{{ $tanggal_akhir }}">
            <button type="submit">Download</button>
        </form>
        <h3>REKAPITULASI TRANSAKSI PENGELUARAN BARANG {{ $tanggal_awal1 }} SAMPAI {{ $tanggal_akhir1 }}</h3>
    </section>

    <section class="section3">
        <table>
            <tr>
                <th>NO</th>
                <th>TANGGAL</th>
                <th>NO PENGELUARAN</th>
                <th>NAMA</th>
                <th>KETERANGAN</th>
                <th>JUMLAH</th>
            </tr>
            @php
            $no = 1;
            $total_pengeluaran = 0;
            @endphp
            @foreach ($pengeluaran as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                <td>{{ $item->no_pengeluaran }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
            </tr>
            @php
            $total_pengeluaran += $item->jumlah;
            @endphp
            @endforeach
            <tr>
                <td colspan="5" align="center"><strong>TOTAL PENGELUARAN</strong></td>
                <td>{{ number_format($total_pengeluaran, 0, ',', '.') }}</td>
            </tr>
        </table>
    </section>
</body>

</html>