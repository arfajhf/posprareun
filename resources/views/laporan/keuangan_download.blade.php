<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRENEUR OFFICIAL - KEUANGAN {{ $tanggal_awal1 }} SAMPAI {{ $tanggal_akhir1 }}</title>
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
            /* background-color: #5a5c69;
            color: #fff; */
            text-align: left;
        }

        /* tr:nth-child(even) {
            background: #E5EAEE;
        } */
    </style>
</head>

<body win>
    <section class="section1">
        <h3>LAPORAN KEUNTUNGAN MINGGU/BULAN {{ $tanggal_awal1 }} SAMPAI {{ $tanggal_akhir1 }}</h3>
    </section>

    <section class="section3">
        <table>
            <tr>
                <th>TOTAL KEUNTUNGAN</th>
                <td>{{ number_format($total_keuntungan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>TOTAL PENGELUARAN</th>
                <td>{{ number_format($total_pengeluaran, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>KEUNTUNGAN BERSIH</th>
                @php
                $keuntungan_bersih = $total_keuntungan - $total_pengeluaran;
                @endphp
                <td>{{ number_format($keuntungan_bersih, 0, ',', '.') }}</td>
            </tr>
        </table>
    </section>
</body>

</html>