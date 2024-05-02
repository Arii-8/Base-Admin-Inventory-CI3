<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah Input Barang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>inputbarang">Home</a></li>
            <li class="breadcrumb-item active">Ubah Input Barang</li>
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
          <p class="card-title">Ubah Input Barang</p>
        </div>
        <div class="card-body ">
          <form id="form" method="POST">

          <div class="row">
              <div class="col-md-6">
                
                  <div class="form-group">
                    <label for="id_transaksi">ID Transaksi</label>
                    <input class="form-control" type="text" id="id_transaksi" name="id_transaksi" value="<?php echo $id_transaksi; ?>" autocomplete="off" required readonly>
                  </div>

                  <div class="form-group">
                  <label for="tanggal_input">Tanggal Input</label>
                    <input type="text" class="form-control input-sm tanggal-readonly" value="<?php echo $tanggal_input; ?>" readonly id="tanggal_input" placeholder="Tanggal Lahir" name="tanggal_input" autocomplete="off">
                  </div>

                  <div class="form-group">
                  <label for="lokasi">Lokasi</label>
                    <select class="form-control" name="lokasi" id="lokasi">
                      <option value="Bandung" <?php echo $lokasi === 'Bandung' ? 'selected' : '' ?>>Bandung</option>
                      <option value="Jakarta" <?php echo $lokasi === 'Jakarta' ? 'selected' : '' ?>>Jakarta</option>
                      <option value="Cirebon" <?php echo $lokasi === 'Cirebon' ? 'selected' : '' ?>>Cirebon</option>
                      <option value="Semarang" <?php echo $lokasi === 'Semarang' ? 'selected' : '' ?>>Semarang</option>
                      <option value="Yogyakarta" <?php echo $lokasi === 'Yogyakarta' ? 'selected' : '' ?>>Yogyakarta</option>
                      <option value="Surabaya" <?php echo $lokasi === 'Surabaya' ? 'selected' : '' ?>>Surabaya</option>
                    </select>
                  </div>

                  <div class="form-group">
                  <label for="data_kurir">Nama Kurir Barang</label>
                  <select name="data_kurir" id="data_kurir" class="form-control">
                    <?php foreach($data_kurir as $kurir) : ?>
                      <option value="<?php echo $kurir->id; ?>"><?php echo $kurir->nama_kurir; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                </div>
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input class="form-control" type="text" id="kode_barang" value="<?php echo $kode_barang; ?>" name="kode_barang" autocomplete="off" required readonly>
                  </div>
                
                  <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input class="form-control" type="text" id="nama_barang" value="<?php echo $nama_barang; ?>" name="nama_barang" autocomplete="off" required>
                  </div>

                  <div class="form-group">
                    <label for="id_satuan_barang">Satuan Barang</label>
                      <select class="form-control" name="id_satuan_barang" id="id_satuan_barang">
                          <?php foreach ($satuan_barang as $nama_satuan) : ?>
                              <option value="<?php echo $nama_satuan->id; ?>" <?php echo $id_satuan_barang === $nama_satuan->id ? 'selected' : ''; ?>><?php echo $nama_satuan->nama_satuan_barang; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="jumlah_barang">Jumlah Barang</label>
                    <input class="form-control" type="number" placeholder="Masukkan Jumlah Barang" id="jumlah_barang" value="<?php echo $jumlah_barang; ?>" name="jumlah_barang" autocomplete="off" required>
                  </div>

                </div>
              </div>

              <div class="box-footer text-right">
                <a href="<?php echo base_url();?>tabelbarangmasuk" class="btn btn-sm btn-default">Batal</a>
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

  
</section>
