<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profil</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profil Pengguna</a></li>
          <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Ganti Password</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active " id="profile">
            <input type="hidden" id="user_id" value="">
            <form class="form-horizontal" id="form" method="POST" action="">
              <div class="box-body">
                <?php if(!empty($this->session->flashdata('message_error'))){?>
                <div class="alert alert-danger">
                <?php   
                   print_r($this->session->flashdata('message_error'));
                ?>
                </div>
                <?php }?> 
                <?php if(!empty($this->session->flashdata('message'))){?>
                <div class="alert alert-success">
                <?php   
                   print_r($this->session->flashdata('message'));
                ?>
                </div>
                <?php }?> 
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Lengkap</label> 
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap" value="<?php echo $name;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Username</label> 
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="user_name" placeholder="username" name="user_name" value="<?php echo $user_name;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 control-label">Email</label> 
                  <div class="col-sm-9">
                   <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $email;?>">
                  </div>
                </div> 
                <div class="form-group row">
                  <label  class="col-sm-3 control-label">Nomor Handphone</label> 
                  <div class="col-sm-9">
                   <input type="text" class="form-control" id="phone" placeholder="Nomor Handphone" name="phone" value="<?php echo $phone;?>">
                  </div>
                </div> 
                <div class="form-group row">
                  <label class="col-sm-3 control-label">Alamat</label> 
                  <div class="col-sm-9">
                   <textarea class="form-control" id="address" name="address"><?php echo $address?></textarea>
                  </div>
                </div>  
              </div> 
              <div class="box-footer text-right">
                <a href="<?php echo base_url();?>dashboard" class="btn btn-sm btn-default ">Batal</a>
                <button type="submit" class="btn btn-sm btn-success" name="profil_pengguna" value="1" id="save-btn">Simpan</button>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-content">
          <div class="tab-pane" id="password">
            <form class="form-horizontal" id="forms" method="POST" action="<?php echo base_url()?>profile">
              <div class="box-body">
                <?php if(!empty($this->session->flashdata('messages'))){?>
                <div class="alert alert-success">
                <?php   
                   print_r($this->session->flashdata('messages'));
                ?>
                </div>
                <?php }?> 
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Password Lama</label> 
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="old_password"  name="old_password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 control-label">Password Baru</label> 
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="new_password" name="new_password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 control-label">Konfirmasi Password Baru</label> 
                  <div class="col-sm-9">
                   <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                  </div>
                </div>  
              </div> 
              <div class="box-footer">
                <div class="row">
                  <div class="col-sm-12 text-right">
                    <a href="<?php echo base_url();?>dashboard" class="btn btn-sm btn-default ">Batal</a>
                    <button type="submit" class="btn btn-sm btn-success" name="password_pengguna"  id="save-btn2">Simpan</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 <script data-main="<?php echo base_url()?>assets/js/main/main-profile" src="<?php echo base_url()?>assets/js/require.js"></script>
