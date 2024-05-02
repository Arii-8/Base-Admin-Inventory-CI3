<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah Input Barang Satuan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>inputbarangsatuan">Home</a></li>
            <li class="breadcrumb-item active">Ubah Input Barang Satuan</li>
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
          <p class="card-title">Ubah Input Barang Satuan</p>
        </div>
        <div class="card-body ">
          <form id="form" method="POST">

            <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="kode_satuan_barang">Kode Satuan</label>
                    <input class="form-control" type="text" readonly value="<?php echo $kode_satuan_barang; ?>" id="kode_satuan_barang" name="kode_satuan_barang" autocomplete="off" required>
                  </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_satuan_barang">Satuan Barang</label>
                    <select class="form-control" name="nama_satuan_barang" id="nama_satuan_barang">
                      <option value="Dus" <?php echo $nama_satuan_barang === 'Dus' ? 'selected' : '' ?>>Dus</option>
                      <option value="Pack" <?php echo $nama_satuan_barang === 'Pack' ? 'selected' : '' ?>>Pack</option>
                      <option value="Pcs" <?php echo $nama_satuan_barang === 'Pcs' ? 'selected' : '' ?>>Pcs</option>
                    </select>
                  </div>
                </div>

            </div>

              <div class="box-footer text-right">
                <a href="<?php echo base_url();?>inputbarangsatuan" class="btn btn-sm btn-default">Batal</a>

                <a href="<?php echo base_url();?>inputbarangsatuan" class="btn btn-sm btn-secondary" style="border-radius: 3px; color: white;">Lihat Daftar Barang</a>
                <button type="submit" class="btn btn-sm btn-primary" style="border-radius: 3px; color: white;">Simpan!</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

              
<script data-main="<?php echo base_url()?>assets/js/main/main-inputbarangsatuan" src="<?php echo base_url()?>assets/js/require.js"></script>

  
</section>
