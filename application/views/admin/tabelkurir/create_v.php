<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Data Kurir</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>tabelkurir">Home</a></li>
            <li class="breadcrumb-item active">Tambah Kurir Baru</li>
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
          <p class="card-title">Tambah kurir Baru</p>
        </div>
        <div class="card-body ">
          <form id="form" method="POST">
            <div class="form-group">
              <label for="nama_kurir">Nama kurir</label>
                <input class="form-control" type="text" id="nama_kurir" name="nama_kurir" autocomplete="off" >
              </div>

              <div class="form-group">
                <label for="alamat_kurir">Alamat</label>
                <textarea class="form-control" id="alamat_kurir" name="alamat_kurir" autocomplete="off "></textarea>
              </div>

              <div class="form-group">
                <label for="jekel_kurir">Jenis Kelamin Kurir</label>
                <br>
                  <input class="radion-button" type="radio" id="jekel" name="jekel_kurir" value="Laki-Laki" autocomplete="off">
                  <label for="jekel_kurir">Laki-Laki</label>
                  <br>
                  <input class="radion-button" type="radio" id="jekel" name="jekel_kurir" value="Perempuan" autocomplete="off">
                  <label for="jekel_kurir">Perempuan</label>
                  <div class="err-radio"></div>
                  </div>

                  <div class="form-group">
                      <label for="usia_kurir">Usia Kurir</label>
                      <input class="form-control" type="number" id="usia_kurir" name="usia_kurir" autocomplete="off" required min="0" max="100">
                  </div>

                  <div class="form-group">
                  <label for="jeken_kurir">Jenis Kendaraan</label>
                    <select class="form-control" name="jeken_kurir" id="jeken_kurir">
                      <option value="motor">Motor</option>
                      <option value="mobil">Mobil</option>
                    </select>
                  </div>
                  
                <div class="form-group">
                <label for="hobi_kurir">Hobi Kurir</label>
                  <select class="form-control" name="hobi_kurir" id="hobi_kurir">
                    <option value="Olahraga">Olahraga</option>
                    <option value="Gaming">Gaming</option>
                    <option value="Masak">Masak</option>
                    <option value="Fotografi">Fotografi</option>
                    <option value="Traveling">Traveling</option>
                    <option value="Membaca">Membaca</option>
                  </select>
                </div>

              <!-- <div class="form-group">
              <label for="barang">Nama Barang</label>
                <select name="barang" id="barang" class="form-control">
                  <?php // foreach($barang_pilihan as $brg) : ?>
                    <option value="<?php // echo $brg['name']; ?>"><?php // echo $brg['name']; ?></option>
                  <?php // endforeach; ?>
                </select>
              </div> -->

              <div class="box-footer text-right">
                <a href="<?php echo base_url();?>tabelkurir" class="btn btn-sm btn-default ">Batal</a>
                <button type="submit"  id="save-btn"  class="btn btn-sm btn-success">Simpan</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

              
<script data-main="<?php echo base_url()?>assets/js/main/main-tabelkurir" src="<?php echo base_url()?>assets/js/require.js"></script>
