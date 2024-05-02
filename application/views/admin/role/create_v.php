<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Jabatan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>role">Home</a></li>
            <li class="breadcrumb-item active">Tambah Jabatan Baru</li>
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
          <p class="card-title">Tambah Jabatan Baru</p>
        </div>
        <div class="card-body ">
          <form method="POST">
            <div class="form-group">
              <label for="">Nama Jabatan</label>
                <input class="form-control" type="name" id="name" name="name" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" autocomplete="off"></textarea>
              </div>
              <div class="box-footer text-right">
                <a href="<?php echo base_url();?>role" class="btn btn-sm btn-default ">Batal</a>
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

              
<script data-main="<?php echo base_url()?>assets/js/main/main-role" src="<?php echo base_url()?>assets/js/require.js"></script>
