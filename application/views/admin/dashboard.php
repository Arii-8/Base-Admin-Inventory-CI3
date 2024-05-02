<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard Base Admin Inventory</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard Base Admin Inventory</li>
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
          <div class="row float-sm-right">
          <!-- <a href="<?php // echo base_url()?>inputbarang/create" class="btn btn-sm btn-primary "><i class='fa fa-plus'></i> Tambah Barang</a> -->
          </div>
        </div>

        <div class="card-body"> 
          <?php if(!empty($this->session->flashdata('message'))){?>
          <div class="alert alert-info">
          <?php   
             print_r($this->session->flashdata('message'));
          ?>
          </div>
          <?php }?> 
           <?php if(!empty($this->session->flashdata('message_error'))){?>
          <div class="alert alert-info">
          <?php   
             print_r($this->session->flashdata('message_error'));
          ?>
          </div>
          <?php }?> 
          
          <div class="table-responsive">
            <table class="table table-bordered table-vecenter card-table table-nowrap text-nowrap table-hover responsive w-100" id="table" width="100%" cellspacing="0"> 
              <thead>
                <th>No Urut</th>
                <th>ID Transaksi</th> 
                <th>Tanggal Keluar Barang</th>
                <th>Lokasi</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan Barang</th>
                <th>Jumlah Barang</th>
                <th>Nama Kurir</th>
                <!-- <th>Aksi </th> -->
              </thead>        
            </table>
          </div>

        </div>
      </div>

      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

<script 
  data-main="<?php echo base_url()?>assets/js/main/main-dashboard" 
  src="<?php echo base_url()?>assets/js/require.js">  
</script>