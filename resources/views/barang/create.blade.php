@extends('template.layout')

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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah {{ $title }} Baru</h3>
                        </div>
                        <form action="/barang" method="POST"enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="kode_barang">Kode Barang</label>
                                            <input type="text" name="kode_barang" class="form-control form-control-sm"
                                                id="kode_barang" value="{{ old('kode_barang') }}" required>
                                            @error('kode_barang')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text" name="nama_barang" class="form-control form-control-sm"
                                                id="nama_barang" value="{{ old('nama_barang') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
    <div class="form-group">
        <label for="gambar_barang">Gambar Barang</label>
        <input type="file" name="gambar_barang" class="form-control-file" id="gambar_barang" accept="image/*" required>
    </div>
</div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="kategori_id">Kategori</label>
                                            <select name="kategori_id" id="kategori_id"
                                                class="form-control form-control-sm">
                                                @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="harga_beli">Harga Beli</label>
                                            <input type="text" class="form-control form-control-sm" id="harga_beli"
                                                autocomplete="off" required>
                                            <input type="hidden" name="harga_beli" id="harga_beli1" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="harga_ecer">Harga 1</label>
                                            <input type="text" class="form-control form-control-sm" id="harga_ecer"
                                                autocomplete="off" required>
                                            <input type="hidden" name="harga_ecer" id="harga_ecer1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="harga_grosir">Harga 2</label>
                                            <input type="text" class="form-control form-control-sm" id="harga_grosir"
                                                autocomplete="off" required>
                                            <input type="hidden" name="harga_grosir" id="harga_grosir1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="harga_agen">Harga 3</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"
                                                id="harga_agen" required>
                                            <input type="hidden" name="harga_agen" id="harga_agen1" required>
                                        </div>
                                    </div>
                                
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="harga_custom">Harga 4</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"
                                                id="harga_custom" required>
                                            <input type="hidden" name="harga_custom" id="harga_custom1" required>
                                        </div>
                                    
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="harga_customb">Harga 5</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"
                                                id="harga_customb" required>
                                            <input type="hidden" name="harga_customb" id="harga_customb1" required>
                                        </div>
                                    
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="harga_customc">Harga 6</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"
                                                id="harga_customc" required>
                                            <input type="hidden" name="harga_customc" id="harga_customc1" required>
                                        </div>
                                    
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="harga_customd">Harga 7</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"
                                                id="harga_customd" required>
                                            <input type="hidden" name="harga_customd" id="harga_customd1" required>
                                
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="harga_custome">Harga 8</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"
                                                id="harga_custome" required>
                                            <input type="hidden" name="harga_custome" id="harga_custome1" required>
                                        </div>
                                    </div>
                               
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="harga_customf">Harga 9</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"
                                                id="harga_customf" required>
                                            <input type="hidden" name="harga_customf" id="harga_customf1" required>
                                        </div>
                                    
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="harga_customg">Harga 10</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"
                                                id="harga_customg" required>
                                            <input type="hidden" name="harga_customg" id="harga_customg1" required>
                                        </div>
                                    </div>
                                
                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profit_harga_ecer">Profit Harga 1</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="profit_harga_ecer" readonly required>
                                            <input type="hidden" name="profit_harga_ecer" id="profit_harga_ecer1"
                                                readonly required>
                                        </div>
                                    </div>
                                     
                           
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profit_harga_grosir">Profit Harga 2</label>
                                            <input type="text" name="profit_harga_grosir"
                                                class="form-control form-control-sm" id="profit_harga_grosir" readonly
                                                required>
                                            <input type="hidden" name="profit_harga_grosir" id="profit_harga_grosir1"
                                                readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profit_harga_agen">Profit Harga 3</label>
                                            <input type="text" name="profit_harga_agen"
                                                class="form-control form-control-sm" id="profit_harga_agen" readonly
                                                required>
                                            <input type="hidden" name="profit_harga_agen" id="profit_harga_agen1"
                                                readonly required>
                                        </div>
                                    
                                </div>
                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profit_harga_custom">Profit Harga 4</label>
                                            <input type="text" name="profit_harga_custom"class="form-control form-control-sm"
                                                id="profit_harga_custom" readonly required>
                                            <input type="hidden" name="profit_harga_custom" id="profit_harga_custom1"
                                                readonly required>
                                        </div></div>
                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profit_harga_customb">Profit Harga 5</label>
                                            <input type="text" name="profit_harga_customb"class="form-control form-control-sm"
                                                id="profit_harga_customb" readonly required>
                                            <input type="hidden" name="profit_harga_customb" id="profit_harga_customb1"
                                                readonly required>
                                        </div></div>
                                        
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profit_harga_customc">Profit Harga 6</label>
                                            <input type="text" name="profit_harga_customc"class="form-control form-control-sm"
                                                id="profit_harga_customc" readonly required>
                                            <input type="hidden" name="profit_harga_customc" id="profit_harga_customc1"
                                                readonly required>
                                        </div></div>
                                        
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profit_harga_customd">Profit Harga 7</label>
                                            <input type="text" name="profit_harga_customd"class="form-control form-control-sm"
                                                id="profit_harga_customd" readonly required>
                                            <input type="hidden" name="profit_harga_customd" id="profit_harga_customd1"
                                                readonly required>
                                        </div></div>
                                        
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profit_harga_custome">Profit Harga 8</label>
                                            <input type="text" name="profit_harga_custome"class="form-control form-control-sm"
                                                id="profit_harga_custome" readonly required>
                                            <input type="hidden" name="profit_harga_custome" id="profit_harga_custome1"
                                                readonly required>
                                        </div></div>
                                       
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profit_harga_customf">Profit Harga 9</label>
                                            <input type="text" name="profit_harga_customf"class="form-control form-control-sm"
                                                id="profit_harga_customf" readonly required>
                                            <input type="hidden" name="profit_harga_customf" id="profit_harga_customf1"
                                                readonly required>
                                        </div></div>
                                       
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profit_harga_customg">Profit Harga 10</label>
                                            <input type="text" name="profit_harga_customg"class="form-control form-control-sm"
                                                id="profit_harga_customg" readonly required>
                                            <input type="hidden" name="profit_harga_customg" id="profit_harga_customg1"
                                                readonly required>
                                        </div></div>
                                        
                                    </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" name="deskripsi" class="form-control form-control-sm"
                                                value="{{ old('deskripsi') }}" id="deskripsi">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <input type="text" name="stok" class="form-control form-control-sm"
                                                value="{{ old('stok') }}" id="stok" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="stok_minimal">Minimal Stok</label>
                                            <input type="text" name="stok_minimal" class="form-control form-control-sm"
                                                value="{{ old('stok_minimal') }}" id="stok_minimal" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                <a href="/barang" class="btn btn-light btn-sm">kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $('#harga_beli').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
        let harga_beli1 = $(this).val().split('.');
        $('#harga_beli1').val(harga_beli1.join(""));
    })

    $('#harga_ecer').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
        let harga_ecer1 = $(this).val().split('.');
        $('#harga_ecer1').val(harga_ecer1.join(""));

        let harga_beli1 = document.getElementById('harga_beli1').value;
        let harga_ecer2 = document.getElementById('harga_ecer1').value;
        let profit_harga_ecer = document.getElementById('profit_harga_ecer');
        let profit_harga_ecer1 = document.getElementById('profit_harga_ecer1');

        hasil = parseInt(harga_ecer2) - parseInt(harga_beli1);
        profit_harga_ecer.value = parseInt(hasil).toLocaleString('id-ID');
        profit_harga_ecer1.value = hasil;
    })

    $('#harga_grosir').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
        let harga_grosir1 = $(this).val().split('.');
        $('#harga_grosir1').val(harga_grosir1.join(""));

        let harga_beli1 = document.getElementById('harga_beli1').value;
        let harga_grosir2 = document.getElementById('harga_grosir1').value;
        let profit_harga_grosir = document.getElementById('profit_harga_grosir');
        let profit_harga_grosir1 = document.getElementById('profit_harga_grosir1');

        hasil = parseInt(harga_grosir2) - parseInt(harga_beli1);
        profit_harga_grosir.value = parseInt(hasil).toLocaleString('id-ID');
        profit_harga_grosir1.value = hasil;
    })
    $('#harga_custom').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
        let harga_custom1 = $(this).val().split('.');
        $('#harga_custom1').val(harga_custom1.join(""));

        let harga_beli1 = document.getElementById('harga_beli1').value;
        let harga_custom2 = document.getElementById('harga_custom1').value;
        let profit_harga_custom = document.getElementById('profit_harga_custom');
        let profit_harga_custom1 = document.getElementById('profit_harga_custom1');
        let hasil = parseInt(harga_custom2) - parseInt(harga_beli1);

        if (!isNaN(hasil)) {
            profit_harga_custom.value = parseInt(hasil).toLocaleString('id-ID');
            profit_harga_custom1.value = hasil;
  		}
    })
    $('#harga_customb').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
        let harga_customb1 = $(this).val().split('.');
        $('#harga_customb1').val(harga_customb1.join(""));

        let harga_beli1 = document.getElementById('harga_beli1').value;
        let harga_customb2 = document.getElementById('harga_customb1').value;
        let profit_harga_customb = document.getElementById('profit_harga_customb');
        let profit_harga_customb1 = document.getElementById('profit_harga_customb1');
        let hasil = parseInt(harga_customb2) - parseInt(harga_beli1);

        if (!isNaN(hasil)) {
            profit_harga_customb.value = parseInt(hasil).toLocaleString('id-ID');
            profit_harga_customb1.value = hasil;
  		}
    })
    $('#harga_customc').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
        let harga_customc1 = $(this).val().split('.');
        $('#harga_customc1').val(harga_customc1.join(""));

        let harga_beli1 = document.getElementById('harga_beli1').value;
        let harga_customc2 = document.getElementById('harga_customc1').value;
        let profit_harga_customc = document.getElementById('profit_harga_customc');
        let profit_harga_customc1 = document.getElementById('profit_harga_customc1');
        let hasil = parseInt(harga_customc2) - parseInt(harga_beli1);

        if (!isNaN(hasil)) {
            profit_harga_customc.value = parseInt(hasil).toLocaleString('id-ID');
            profit_harga_customc1.value = hasil;
  		}
    })

    $('#harga_customd').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
        let harga_customd1 = $(this).val().split('.');
        $('#harga_customd1').val(harga_customd1.join(""));

        let harga_beli1 = document.getElementById('harga_beli1').value;
        let harga_customd2 = document.getElementById('harga_customd1').value;
        let profit_harga_customd = document.getElementById('profit_harga_customd');
        let profit_harga_customd1 = document.getElementById('profit_harga_customd1');
        let hasil = parseInt(harga_customd2) - parseInt(harga_beli1);

        if (!isNaN(hasil)) {
            profit_harga_customd.value = parseInt(hasil).toLocaleString('id-ID');
            profit_harga_customd1.value = hasil;
  		}
    })

    $('#harga_custome').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
        let harga_custome1 = $(this).val().split('.');
        $('#harga_custome1').val(harga_custome1.join(""));

        let harga_beli1 = document.getElementById('harga_beli1').value;
        let harga_custome2 = document.getElementById('harga_custome1').value;
        let profit_harga_custome = document.getElementById('profit_harga_custome');
        let profit_harga_custome1 = document.getElementById('profit_harga_custome1');
        let hasil = parseInt(harga_custome2) - parseInt(harga_beli1);

        if (!isNaN(hasil)) {
            profit_harga_custome.value = parseInt(hasil).toLocaleString('id-ID');
            profit_harga_custome1.value = hasil;
  		}
    })
    $('#harga_customf').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
        let harga_customf1 = $(this).val().split('.');
        $('#harga_customf1').val(harga_customf1.join(""));

        let harga_beli1 = document.getElementById('harga_beli1').value;
        let harga_customf2 = document.getElementById('harga_customf1').value;
        let profit_harga_customf = document.getElementById('profit_harga_customf');
        let profit_harga_customf1 = document.getElementById('profit_harga_customf1');
        let hasil = parseInt(harga_customf2) - parseInt(harga_beli1);

        if (!isNaN(hasil)) {
            profit_harga_customf.value = parseInt(hasil).toLocaleString('id-ID');
            profit_harga_customf1.value = hasil;
  		}
    })
    $('#harga_customg').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
        let harga_customg1 = $(this).val().split('.');
        $('#harga_customg1').val(harga_customg1.join(""));

        let harga_beli1 = document.getElementById('harga_beli1').value;
        let harga_customg2 = document.getElementById('harga_customg1').value;
        let profit_harga_customg = document.getElementById('profit_harga_customg');
        let profit_harga_customg1 = document.getElementById('profit_harga_customg1');
        let hasil = parseInt(harga_customg2) - parseInt(harga_beli1);

        if (!isNaN(hasil)) {
            profit_harga_customg.value = parseInt(hasil).toLocaleString('id-ID');
            profit_harga_customg1.value = hasil;
  		}
    })
    $('#harga_agen').on('keyup', function () {
        $(this).mask('000.000.000', {reverse: true});
        let harga_agen1 = $(this).val().split('.');
        $('#harga_agen1').val(harga_agen1.join(""));

        let harga_beli1 = document.getElementById('harga_beli1').value;
        let harga_agen2 = document.getElementById('harga_agen1').value;
        let profit_harga_agen = document.getElementById('profit_harga_agen');
        let profit_harga_agen1 = document.getElementById('profit_harga_agen1');
        let hasil = parseInt(harga_agen2) - parseInt(harga_beli1);

        if (!isNaN(hasil)) {
            profit_harga_agen.value = parseInt(hasil).toLocaleString('id-ID');
            profit_harga_agen1.value = hasil;
  		}
    })
</script>
@endsection