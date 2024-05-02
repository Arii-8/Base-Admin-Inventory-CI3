<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengguna</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>
            <!-- <li class="breadcrumb-item active">Dashboard v3</li> -->
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <p class="card-title">Pencarian <?php echo ucwords(str_replace("_"," ",$this->uri->segment(1)))?></p>
        </div> 
        <div class="card-body ">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama Pengguna</label> 
            <div class="col-sm-4">
              <input type="name" class="form-control" id="name" placeholder="Nama Pengguna" name="name">
            </div> 
          </div> 
          <div class="box-footer text-right">
            <a href="#" class="btn btn-sm btn-danger" id="reset">Hapus</a>
            <a href="#" class="btn btn-sm btn-primary" id="search">Cari</a>
          </div>
        </div>
      </div>
      <div class="card card-success card-outline">
        <div class="card-header"> 
          <div class="row float-sm-right">
          <a href="<?php echo base_url()?>user/create" class="btn btn-sm btn-primary "><i class='fa fa-plus'></i> Tambah Pengguna</a>
          </div>
        </div>
        <div class="card-body"> 
          <div class="table-responsive">
            <?php if(!empty($this->session->flashdata('message'))){?>
            <div class="alert alert-info">
            <?php   
               print_r($this->session->flashdata('message'));
            ?>
            </div>
            <?php }?> 
             <?php if(!empty($this->session->flashdata('message_error'))){?>
            <div class="alert alert-danger">
            <?php   
               print_r($this->session->flashdata('message_error'));
            ?>
            </div>
            <?php }?> 
            <table class="table table-striped dt-responsive " id="table"> 
              <thead>
                <th>No Urut</th> 
                <th>Jabatan</th> 
                <th>Nama</th>
                <th>No HP</th> 
                <th>Email</th>   
                <th>Aksi</th> 
              </thead>        
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

<script 
  data-main="<?php echo base_url()?>assets/js/main/main-user" 
  src="<?php echo base_url()?>assets/js/require.js">  
</script>