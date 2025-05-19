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
        <a href="/laporan/penjualan/semua/download" target="_blank"><button type="button">Download</button></a>
        <h3>REKAPITULASI TRANSAKSI PENJUALAN BARANG</h3>
    </section>

    <section class="section3">
        <table>
            <tr>
                <th>NO</th>
                <th>NO INVOICE</th>
                <th>PELANGGAN</th>
                <th>NAMA BARANG</th>
                <th>JENIS PEMBELIAN</th>
                <th>JENIS PENJUALAN</th>
                <th>JENIS BANK</th>
                <th>BIAYA PENGIRIMAN</th>
                <th>HARGA</th>
                <th>QTY</th>
                <th>PROFIT</th>
                <th>POTONGAN</th>
                <th>TOTAL HARGA</th>
                <th>KEUNTUNGAN</th>
            </tr>
            @php
            $no = 1;
            $total_keuntungan = 0;
            $hasil = 0;
            @endphp
            @foreach ($detail_penjualan as $item)
            @php
            $total_harga = $item->harga * $item->qty;
            @endphp
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->no_invoice }}</td>
                <td>{{ $item->nama_pelanggan }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{  strtoupper($item->jenis_penjualan) }}</td>
                <td>{{  strtoupper($item->jenis) }}</td>
                <td>{{ $item->jenis_bank }}</td>
                <td>{{ number_format($item->biaya_pengiriman, 0, ',', '.') }}</td>
                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ number_format($item->profit, 0, ',', '.') }}</td>
                <td>{{ number_format($item->diskon, 0, ',', '.') }}</td>
                <td>
                    {{ number_format($item->sub_total, 0, ',', '.') }}</td>
                @php
                $keuntungan = $item->profit * $item->qty;
                @endphp
                <td>{{ number_format($keuntungan, 0, ',', '.') }}</td>
            </tr>
            @php
            $total_keuntungan += $keuntungan;
            @endphp
            @endforeach
            <tr>
                <td colspan="13" align="center"><strong>TOTAL PENJUALAN</strong></td>
                <td>{{ number_format($total_penjualan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="13" align="center"><strong>TOTAL KEUNTUNGAN</strong></td>
                <td>{{ number_format($total_keuntungan, 0, ',', '.') }}</td>
            </tr>
        </table>
    </section>
</body>

</html>