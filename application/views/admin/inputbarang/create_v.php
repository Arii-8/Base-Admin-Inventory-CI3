<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Input Data Barang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>inputbarang">Home</a></li>
            <li class="breadcrumb-item active">Input Data Barang</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid"> 
      <div class="card card-success card-outline"> 
        <div class="card-header">
          <p class="card-title">Input Data Barang</p>
        </div>
        <div class="card-body ">
          <form method="POST" id="form" action="<?php echo base_url('inputbarang/create'); ?>">
            
            <div class="row">
              <div class="col-md-6">
                
                  <div class="form-group">
                    <label for="id_transaksi">ID Transaksi</label>
                    <input class="form-control" value="WG-<?php echo date( "Ymdh"); + 1 ?>" type="text" id="id_transaksi" name="id_transaksi" autocomplete="off" required readonly>
                  </div>

                  <div class="form-group">
                  <label for="tanggal_input">Tanggal Input</label>
                    <input type="date" class="form-control input-sm tanggal-readonly" id="tanggal_input" placeholder="Tanggal Lahir" name="tanggal_input" autocomplete="off">
                  </div>

                  <div class="form-group">
                  <label for="lokasi">Lokasi</label>
                    <select class="form-control" name="lokasi" id="lokasi">
                      <option value="Bandung">Bandung</option>
                      <option value="Jakarta">Jakarta</option>
                      <option value="Cirebon">Cirebon</option>
                      <option value="Semarang">Semarang</option>
                      <option value="Yogyakarta">Yogyakarta</option>
                      <option value="Surabaya">Surabaya</option>
                    </select>

                  </div>

                  <div class="form-group">
                  <label for="data_kurir">Nama Kurir Barang</label>
                  <select name="data_kurir" id="data_kurir" class="form-control">
                  <option class="font-weight-bold"> --- Pilih Kurir --- </option>
                    <?php foreach($data_kurir as $kurir) : ?>
                      <option value="<?php echo $kurir->id; ?>"><?php echo $kurir->nama_kurir; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                </div>
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input class="form-control" type="text"  value="BRG-<?php echo date( "Ymdhis"); + 1 ?>" readonly id="kode_barang" name="kode_barang" autocomplete="off" required>
                  </div>
                
                  <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input class="form-control" placeholder="Masukkan Nama Barang" type="text" id="nama_barang" name="nama_barang" autocomplete="off" required>
                  </div>

                  <div class="form-group">
                  <label for="id_satuan_barang">Satuan Barang</label>
                  <select name="id_satuan_barang" id="id_satuan_barang" class="form-control">
                  <option class="font-weight-bold"> --- Pilih Satuan Barang --- </option>
                    <?php foreach($satuan_barang as $satuan) : ?>
                      <option value="<?php echo $satuan->id; ?>"><?php echo $satuan->nama_satuan_barang; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="jumlah_barang">Jumlah Barang</label>
                    <input class="form-control" type="number" placeholder="Masukkan Jumlah Barang" id="jumlah_barang" name="jumlah_barang" autocomplete="off" required required min="0">
                  </div>

                </div>
              </div>

              <div class="box-footer text-right">
                <a href="<?php echo base_url();?>tabelbarangmasuk" class="btn btn-sm btn-default ">Batal</a>
                <!-- <button href="#" class="btn btn-sm btn-danger" style="border-radius: 3px; color: white;" id="reset">Reset</button> -->

                <a href="<?php echo base_url();?>tabelbarangmasuk" class="btn btn-sm btn-secondary" style="border-radius: 3px; color: white;">Lihat Daftar Barang</a>
                <button type="submit" class="btn btn-sm btn-primary" style="border-radius: 3px; color: white;">Simpan!</button>
              </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

              
<script data-main="<?php echo base_url()?>assets/js/main/main-inputbarang" src="<?php echo base_url()?>assets/js/require.js"></script>
