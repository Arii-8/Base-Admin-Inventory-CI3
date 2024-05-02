<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Keluarkan Barang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>inputbarang">Home</a></li>
            <li class="breadcrumb-item active">Keluarkan Barang</li>
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
          <p class="card-title">Keluarkan Barang</p>
        </div>
        <div class="card-body ">
          <form id="form" method="POST" action="<?php echo base_url('tabelbarangkeluar/loadout'); ?>">

          <input type="hidden" value="<?php echo $id; ?>" name="id" readonly>

          <div class="row">
              <div class="col-md-6">
                
                  <div class="form-group">
                    <label for="id_transaksi">ID Transaksi</label>
                    <input class="form-control" type="text" id="id_transaksi" name="id_transaksi" value="<?php echo $id_transaksi; ?>" autocomplete="off" required readonly>
                  </div>

                  <div class="form-group">
                  <label for="tanggal_keluar">Tanggal Keluar</label>
                    <input type="text" class="form-control input-sm tanggal-readonly" value="<?php echo $tanggal_input; ?>" readonly id="tanggal_keluar" placeholder="Tanggal Lahir" name="tanggal_keluar" autocomplete="off">
                  </div>

                  <div class="form-group">
                  <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" value="<?php echo $lokasi; ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="data_kurir">Nama Kurir Barang</label>
                      <select class="form-control" name="data_kurir" id="data_kurir" readonly>
                          <?php foreach ($data_kurir as $kurir) : ?>
                              <option value="<?php echo $kurir->id; ?>" <?php echo $id_satuan_barang === $kurir->id ? 'selected' : ''; ?>><?php echo $kurir->nama_kurir; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>

                </div>
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input class="form-control" readonly type="text" id="kode_barang" value="<?php echo $kode_barang; ?>" name="kode_barang" autocomplete="off" required>
                  </div>
                
                  <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input class="form-control" readonly type="text" id="nama_barang" value="<?php echo $nama_barang; ?>" name="nama_barang" autocomplete="off" required>
                  </div>

                  <div class="form-group">
                    <label for="id_satuan_barang">Satuan Barang</label>
                      <select class="form-control" name="id_satuan_barang" id="id_satuan_barang" readonly>
                          <?php foreach ($satuan_barang as $nama_satuan) : ?>
                              <option value="<?php echo $nama_satuan->id; ?>" <?php echo $id_satuan_barang === $nama_satuan->id ? 'selected' : ''; ?>><?php echo $nama_satuan->nama_satuan_barang; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="jumlah_barang">Jumlah Barang</label>
                    <input class="form-control" readonly type="number" placeholder="Masukkan Jumlah Barang" id="jumlah_barang" value="<?php echo $jumlah_barang; ?>" name="jumlah_barang" autocomplete="off" required>
                  </div>

                </div>
              </div>

              <div class="box-footer text-right">
                <a href="<?php echo base_url();?>tabelbarangmasuk" class="btn btn-sm btn-secondary">Batal</a>
                <button type="submit" class="btn btn-sm btn-primary" style="border-radius: 3px; color: white;">Simpan!</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

              
<script data-main="<?php echo base_url()?>assets/js/main/main-keluarbarang" src="<?php echo base_url()?>assets/js/require.js"></script>

  
</section>
