<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>user">Home</a></li>
            <li class="breadcrumb-item active">Ubah User Baru</li>
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
          <p class="card-title">Ubah User Baru</p>
        </div>
        <div class="card-body ">
          <form class="form-horizontal" id="form" method="POST" action="" enctype="multipart/form-data">
          <input type="hidden" name="kd_kec_state" id="kd_kec_state" value="">
            <div class="box-body">
              <?php if(!empty($this->session->flashdata('message_error'))){?>
                <div class="alert alert-danger">
                <?php
                   print_r($this->session->flashdata('message_error'));
                ?>
                </div>
                <?php }?>
                <input type="hidden" name="id" id="user_id" value="<?php echo $id;?>">
                <input type="hidden" id="role_id_selected" value="<?php echo $role_id;?>">
                <?php if(!empty($foto)){?>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label"></label>
                  <div class="col-sm-9">
                   <img width="100px" src="<?php echo base_url()."assets/images/foto/".$foto;?>">
                  </div>
                </div>
                <?php }?>
                  <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="name" class="form-control" id="name" placeholder="Nama" name="name" value="<?php echo $first_name;?>">
                  </div>
                </div> 

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                   <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $email;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-3 control-label">No HP</label>
                  <div class="col-sm-9">
                   <input type="number" class="form-control" id="phone" placeholder="No HP" name="phone" value="<?php echo $phone;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 control-label">Alamat</label>
                  <div class="col-sm-9">
                   <textarea class="form-control" name="address" placeholder="Address"><?php echo $address?></textarea>
                  </div>
                </div>
              <hr>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 control-label">Jabatan</label>
                <div class="col-sm-9">
                   <select id="role_id" name="role_id" class="form-control">
                    <option value="">Pilih Role</option>
                    <?php
                    foreach ($roles as $key => $role) { ?>
                      <option value="<?php echo $role->id;?>" <?php echo $role->id == $role_id ? 'selected' : '' ?>><?php echo $role->name;?></option>
                    <?php }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <a href="<?php echo base_url();?>user" class="btn btn-default">Batal</a>
              <button type="submit" class="btn btn-success" id="save-btn">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

 <script data-main="<?php echo base_url()?>assets/js/main/main-user" src="<?php echo base_url()?>assets/js/require.js"></script>
