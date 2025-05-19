@extends('template.layout')
@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('konten')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Kasir</a></li>
                        <li class="breadcrumb-item active">{{ auth()->user()->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session('warning'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian! {{ session('warning') }}</h5>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>No. Invoice : <strong>{{ request()->segment(2) }}</strong></h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <form action="/penjualan/detail_penjualan" method="post">
                                    @csrf
                                    <input type="hidden" name="no_invoice" id="no_invoice"
                                        value="{{ request()->segment(2) }}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="kode_barang">Kode Barang</label>
                                            <input type="text" name="kode_barang" id="kode_barang"
                                                placeholder="Kode Barang" class="form-control" autocomplete="off"
                                                autofocus required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="harga">Pilih Jenis Harga</label>
                                            <select name="harga" id="harga" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <option value="" id="harga_ecer">harga 1</option>
                                                <option value="" id="harga_grosir">harga 2</option>
                                                <option value="" id="harga_agen">harga 3</option>
                                                <option value="" id="harga_custom">harga 4</option>
                                                <option value="" id="harga_customb">harga 5</option>
                                                <option value="" id="harga_customc">harga 6</option>
                                                <option value="" id="harga_customd">harga 7</option>
                                                <option value="" id="harga_custome">harga 8</option>
                                                <option value="" id="harga_customf">harga 9</option>
                                                <option value="" id="harga_customg">harga 10</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="stok">Stok</label>
                                                <input type="text" class="form-control" id="stok" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="potongan">Potongan</label>
                                                <input type="text" class="form-control" id="potongan" autocomplete="off"
                                                    required>
                                                <input type="hidden" name="potongan" id="potongan1" required>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="qty">QTY</label>
                                                <input type="number" name="qty" class="form-control" id="qty" required>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-primary" id="btn_tambahkan"
                                                style="margin-top: 30px;">Tambahkan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Penjualan</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped table-hover table-sm" id="datatable">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis</th>
                                        <th>Harga</th>
                                        <th>Item</th>
                                        <th>Potongan</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    $total_keseluruhan_harga = 0;
                                    @endphp
                                    @foreach ($detail_penjualan as $item)
                                    @php
                                    // $total_harga = $item->harga * $item->qty;
                                    $total_keseluruhan_harga += $item->total_harga;
                                    @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->kode_barang }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ ucfirst($item->jenis) }}</td>
                                        <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ number_format($item->potongan, 0, ',', '.') }}</td>
                                        <td>{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="/penjualan/{{ $item->id }}/destroy"
                                                onclick="return confirm('Yakin mau dihapus?!')"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <form action="/penjualan" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="no_invoice" value="{{ request()->segment(2) }}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="total_pembayaran">Total Pembayaran</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    id="total_pembayaran"
                                                    value="{{ number_format($total_keseluruhan_harga, 0, ',', '.') }}"
                                                    readonly required>
                                                <input type="hidden" name="total_pembayaran" id="total_pembayaran1"
                                                    value="{{ $total_keseluruhan_harga }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="sub_total">Sub Total</label>
                                                <input type="text" class="form-control form-control-lg" id="sub_total"
                                                    readonly required>
                                                <input type="hidden" name="sub_total" id="sub_total1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kembalian">Kembalian</label>
                                                <input type="text" class="form-control form-control-lg" id="kembalian"
                                                    readonly required>
                                                <input type="hidden" name="kembalian" id="kembalian1" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pelanggan_id">Pelanggan</label>
                                                <select name="pelanggan_id" id="pelanggan_id"
                                                    class="form-control select2bs4">
                                                    <option value="">Pilih</option>
                                                    @foreach ($pelanggan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="jenis">Jenis Pembayaran</label>
                                                <select name="jenis" id="jenis" class="form-control" required>
                                                    <option value=""></option>
                                                    <option value="cash" id="jenis_cash">Cash</option>
                                                    <option value="transfer" id="jenis_transfer">Transfer</option>
                                                    <option value="hutang" id="jenis_hutang">Hutang</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="biaya_pengiriman">Biaya Pengiriman</label>
                                                <input type="text" class="form-control" id="biaya_pengiriman"
                                                    autocomplete="off" required>
                                                <input type="hidden" name="biaya_pengiriman" id="biaya_pengiriman1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pembayaran">Pembayaran</label>
                                                <input type="text" class="form-control" id="pembayaran"
                                                    onkeyup="kalkulasi()" autocomplete="off" required>
                                                <input type="hidden" name="pembayaran" id="pembayaran1">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="target"></div>
                                    <div class="loading"></div>
                                    <button type="submit" id="btnSimpan" class="btn btn-primary btn-block">Simpan
                                        Transaksi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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

<script type="text/javascript">
    var _token = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){        
        $( "#kode_barang" ).autocomplete({
        source: function( request, response ) {
            // Fetch data
            $.ajax({
            url:"/ambil_data_barang",
            type: 'post',
            dataType: "json",
            data: {
            _token: _token,
            search: request.term
            },
            success: function( data ) {
            console.log(data);
            response( data );
            }
            });
        },
            select: function (event, ui) {
                $('#kode_barang').val(ui.item.label); // display the selected text
                $('#stok').val(ui.item.stok); // save selected id to input
                $('#harga_ecer').val(ui.item.harga_ecer + ",ecer"); // save selected id to input
                $('#harga_ecer').text("harga 1 - Rp " + parseInt(ui.item.harga_ecer).toLocaleString("id-ID"))
                $('#harga_grosir').val(ui.item.harga_grosir + ",grosir"); // save selected id to input
                $('#harga_grosir').text("harga 2 - Rp "  + parseInt(ui.item.harga_grosir).toLocaleString("id-ID"))
                $('#harga_agen').val(ui.item.harga_agen + ",agen"); // save selected id to input
                $('#harga_agen').text("harga 3 - Rp " + parseInt(ui.item.harga_agen).toLocaleString("id-ID"))
             
                $('#harga_custom').val(ui.item.harga_custom + ",custom"); // save selected id to input
                $('#harga_custom').text("harga 4 - Rp " + parseInt(ui.item.harga_custom).toLocaleString("id-ID"))

                $('#harga_customb').val(ui.item.harga_customb + ",customb"); // save selected id to input
                $('#harga_customb').text("harga 5 - Rp " + parseInt(ui.item.harga_customb).toLocaleString("id-ID"))

                $('#harga_customc').val(ui.item.harga_customc + ",customc"); // save selected id to input
                $('#harga_customc').text("harga 6 - Rp " + parseInt(ui.item.harga_customc).toLocaleString("id-ID"))

                $('#harga_customd').val(ui.item.harga_customd + ",customd"); // save selected id to input
                $('#harga_customd').text("harga 7 - Rp " + parseInt(ui.item.harga_customd).toLocaleString("id-ID"))

                $('#harga_custome').val(ui.item.harga_custome + ",custome"); // save selected id to input
                $('#harga_custome').text("harga 8 - Rp " + parseInt(ui.item.harga_custome).toLocaleString("id-ID"))

                $('#harga_customf').val(ui.item.harga_customf + ",customf"); // save selected id to input
                $('#harga_customf').text("harga 9 - Rp " + parseInt(ui.item.harga_customf).toLocaleString("id-ID"))

                $('#harga_customg').val(ui.item.harga_customg + ",customg"); // save selected id to input
                $('#harga_customg').text("harga 10 - Rp " + parseInt(ui.item.harga_customg).toLocaleString("id-ID"))


            return false;
            }
        });
    });
</script>

<script>
    $(function () {  
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })  
    })

$(document).on('click', '#btn_tambahkan', function () {
   if($('#kode_barang').val() == '') {
       alert('Kode barang masih kosong');
       $('#kode_barang').focus();
       return false;
   }
   if($('#harga').val() == '') {
       alert('Jenis harga belum dipilih');
       $('#harga').focus();
       return false;
   }
   if($('#stok').val() == 0) {
       alert('Stok barang sudah 0');
       return false;
   }
   if($('#qty').val() === 0) {
       alert('QTY tidak boleh kosong');
       $('#qty').focus();
       return false;
   }
});

$(document).on('change', '#jenis', function() {
// alert($(this).find(':selected').val());
if($(this).val() === 'transfer') {
// $('#bank_lain').focus();
$('#target').html(`
<div class="row">
    <div class="col-md-6">
        <div class="form-group tutup">
            <label for="jenis_bank">Bank</label>
            <select name="jenis_bank" id="jenis_bank" class="form-control">
                <option value="BRI">BRI</option>
                <option value="BCA">BCA</option>
                <option value="BNI">BNI</option>
                <option value="MANDIRI">MANDIRI</option>
                <option value="BJB">BJB</option>
                <option value="BTN">BTN</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group tutup">
            <label for="bukti_transfer">Bukti Transfer</label>
            <input type="file" name="bukti_transfer" class="form-control" id="bukti_transfer" required>
        </div>
    </div>
</div>
`)
} else {
$('.tutup').remove();
}
})


$('#pembayaran').on('keyup', function () {
$(this).mask('000.000.000', {reverse: true});
})

$('#diskon').on('keyup', function () {
$(this).mask('000.000.000', {reverse: true});
let diskon1 = $(this).val().split('.');
$('#diskon1').val(diskon1.join(""));
})

$('#biaya_pengiriman').on('keyup', function () {
$(this).mask('000.000.000', {reverse: true});
let biaya_pengiriman1 = $(this).val().split('.');
$('#biaya_pengiriman1').val(biaya_pengiriman1.join(""));
})

$('#potongan').on('keyup', function () {
$(this).mask('000.000.000', {reverse: true});
let potongan1 = $(this).val().split('.');
$('#potongan1').val(potongan1.join(""));
})

$(document).on('keyup', '#biaya_pengiriman', function () {
let total_pembayaran1 = $('#total_pembayaran1').val();
let biaya_pengiriman1 = $('#biaya_pengiriman1').val();
let hasil = parseInt(biaya_pengiriman1) + parseInt(total_pembayaran1);
let convert = parseInt(hasil).toLocaleString('id-ID');
$('#sub_total').val(convert);
$('#sub_total1').val(hasil);
});

// $(document).on('keyup', '#diskon', function() {
// let total_pembayaran1 = $('#total_pembayaran1').val();
// let biaya_pengiriman = $('#biaya_pengiriman1').val();
// let diskon = $('#diskon1').val();
// if ($(this).val() != 0) {

// let hasil = parseInt(total_pembayaran1) + parseInt(biaya_pengiriman) - parseInt(diskon);
// let convert = parseInt(hasil).toLocaleString("id-ID");

// $('#sub_total').val(convert);
// $('#sub_total1').val(hasil);
// } else {
// let hasil = parseInt(total_pembayaran1) + parseInt(biaya_pengiriman);
// let convert = parseInt(hasil).toLocaleString("id-ID");
// $('#sub_total').val(convert);
// $('#sub_total1').val(total_pembayaran1);
// }
// })

function kalkulasi() {
let pembayaran = $('#pembayaran').val().split('.'); // 300.000 -> 300 0000
let pembayaran1 = $('#pembayaran1').val(pembayaran.join("")); // 300.000 -> 300 0000

// if (pembayaran == 0) {
// $('#kembalian').val(0);
// $('#kembalian1').val(0);
// $('#jenis_hutang').attr('selected', 'selected');
// } else {
let sub_total1 = $('#sub_total1').val();
let hasil = pembayaran1.val() - sub_total1; // 210000
let convert = parseInt(hasil).toLocaleString("id-ID"); // 210.000

$('#kembalian').val(convert);
$('#kembalian1').val(hasil);
// }
}
</script>

<script>
    $(document).on('click', '#btnSimpan', function () {
         let jenis = $('#jenis').val();
         let biaya_pengiriman = $('#biaya_pengiriman').val();
         let diskon = $('#diskon').val();
         let pembayaran = $('#pembayaran').val();
         let bukti_transfer = $('#bukti_transfer').val();
         let no_invoice = $('#no_invoice').val();

         if(jenis == '') {
             $('#jenis').addClass('is-invalid');
         } else if(biaya_pengiriman == '') {
             $('#biaya_pengiriman').addClass('is-invalid');
         } else if(diskon == '') {
             $('#diskon').addClass('is-invalid');
         } else if(pembayaran == '') {
             $('#pembayaran').addClass('is-invalid');
         } else if(bukti_transfer == '') {
             $('#bukti_transfer').addClass('is-invalid');
         }  else {
             $('#btnSimpan').addClass('d-none');
             $('.loading').html(`
                <button class="btn btn-primary btn-block" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Simpan Transaksi...
                </button>
             `);
         }
    });
</script>
@endsection