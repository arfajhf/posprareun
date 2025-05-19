<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRENEUR OFFICIAL - PRODUK TERJUAL {{ $tanggal_awal1 }} SAMPAI {{ $tanggal_akhir1 }}</title>
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
        <h3>REKAPITULASI TRANSAKSI PENJUALAN PERBARANG {{ $tanggal_awal1 }} SAMPAI {{ $tanggal_akhir1 }}</h3>
    </section>

    <section class="section3">
        <table>
            <tr>
                <th>NO</th>
                <th>TANGGAL</th>
                <th>NO INVOICE</th>
                <th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>QTY</th>
            </tr>
            @php
            $no = 1;
            $total_qty_terjual = 0;
            @endphp
            @foreach ($detail_penjualan as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                <td>{{ $item->no_invoice }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->qty }}</td>
            </tr>
            @php
            $total_qty_terjual += $item->qty;
            @endphp
            @endforeach
            <tr>
                <td colspan="5" align="center"><strong>TOTAL QTY TERJUAL</strong></td>
                <td>{{ $total_qty_terjual }}</td>
            </tr>
        </table>
    </section>
</body>

</html>