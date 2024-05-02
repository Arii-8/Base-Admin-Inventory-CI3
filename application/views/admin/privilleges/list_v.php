<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Hak Akses</h1>
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
      <div class="card card-success card-outline">
      <div class="card-header"> 
          <div class="row float-sm-right">
            <?php if($is_can_create){?>
              <a href="<?php echo base_url()?>privileges/create" class="btn btn-sm btn-primary "><i class='fa fa-plus'></i> Tambah Hak Akses</a>
              
            <?php } ?>
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
            <table class="table table-striped" id="table"> 
              <thead>
                <th>No Urut</th>
                <th>Jabatan</th>  
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

<section class="content">
  <div class="box box-default color-palette-box">
    <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-tag"></i> Privilleges</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12"> 
        <div class="table-responsive">
        
      </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script 
  data-main="<?php echo base_url()?>assets/js/main/main-privilleges" 
  src="<?php echo base_url()?>assets/js/require.js">  
</script>

