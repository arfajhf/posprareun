@extends('template.layout')

@section('konten')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah {{ $title }} Baru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">No Pembelian : <strong> {{ request()->segment(3) }}</strong></h3>
                        </div>
                        <form action="/pembelian" method="POST">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="no_pembelian" id="no_pembelian"
                                    value="{{ request()->segment(3) }}">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="kode_barang">Pilih Barang</label>
                                            <select name="kode_barang" id="kode_barang" class="form-control select2bs4"
                                                required>
                                                <option value="">Pilih</option>
                                                @foreach ($barang as $item)
                                                <option value="{{ $item->kode_barang }}">{{ $item->kode_barang }} -
                                                    {{ $item->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="qty">QTY</label>
                                            <input type="text" name="qty" class="form-control" id="qty"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="total_harga">Total Harga</label>
                                            <input type="text" class="form-control" id="total_harga" autocomplete="off"
                                                required>
                                            <input type="hidden" name="total_harga" id="total_harga1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary btn-block"
                                            style="margin-top: 30px;">Tambahkan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail {{ $title }} Baru</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover table-sm" id="datatable">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>QTY</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    $total_keseluruhan_harga = 0;
                                    @endphp
                                    @foreach ($ambil_pembelian_sekarang as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->kode_barang }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="/pembelian/{{ $item->id }}/destroy"
                                                onclick="return confirm('Yakin mau dihapus?!')"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                                                Hapus</a>
                                        </td>
                                    </tr>
                                    @php
                                    $total_keseluruhan_harga += $item->total_harga;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Transaksi Pembayaran</h3>
                        </div>
                        <form action="/pembelian/simpan_detail_pembayaran" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="supplier_id">Pilih Supplier</label>
                                    <select name="supplier_id" id="supplier_id" class="form-control select2bs4"
                                        required>
                                        <option value="">Pilih</option>
                                        @foreach ($supplier as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="no_pembelian" id="no_pembelian"
                                    value="{{ request()->segment(3) }}">
                                <div class="form-group">
                                    <label for="total_pembayaran">Total Pembayaran</label>
                                    <input type="text" class="form-control" id="total_pembayaran"
                                        value="{{ number_format($total_keseluruhan_harga, 0, ',', '.') }}" readonly
                                        required>
                                    <input type="hidden" name="total_pembayaran" id="total_pembayaran1"
                                        value="{{ $total_keseluruhan_harga }}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="pembayaran">Pembayaran</label>
                                    <input type="text" class="form-control" id="pembayaran" onkeyup="kalkulasi()"
                                        autocomplete="off" required>
                                    <input type="hidden" name="pembayaran" id="pembayaran1" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="kembalian">Kembalian</label>
                                    <input type="text" class="form-control" id="kembalian" readonly required>
                                    <input type="hidden" name="kembalian" id="kembalian1" readonly required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function () {  
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })  
    })
</script>
@if (session('success'))
<script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
          icon: 'success',
          title: "{{ session('success') }}"
        })
    });  
</script>
@endif
<script>
    $('#total_harga').on('keyup', function () {
        let total_harga = $(this).mask('000.000.000', {reverse: true});
        let total_harga1 = total_harga.val().split('.').join("");
        $('#total_harga1').val(total_harga1);
    })

    $('#pembayaran').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
    })

    function kalkulasi() {
        let pembayaran = $('#pembayaran').val().split('.'); // 300.000 -> 300 0000
        let pembayaran1 = $('#pembayaran1').val(pembayaran.join("")); // 300.000 -> 300 0000

        let total_pembayaran1 = $('#total_pembayaran1').val();
        let hasil = pembayaran1.val() - total_pembayaran1; // 210000
        let convert = parseInt(hasil).toLocaleString("id-ID"); // 210.000

        $('#kembalian').val(convert);
        $('#kembalian1').val(hasil);
    }
</script>
@endsection