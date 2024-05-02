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
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>privileges">Home</a></li>
            <li class="breadcrumb-item active">Edit Hak Akses</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="content">
    <div class="container-fluid"> 
      <div class="card card-success card-outline"> 
        <div class="card-header">
          <p class="card-title">Edit Hak Akses</p>
        </div>
        <div class="card-body ">
          <form id="form" method="POST" class="form-horizontal" action="">
            <section class="content">
              <div class="box box-default color-palette-box">
              <!--   <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-tag"></i> <?php echo ucwords(str_replace("_"," ",$role_name));?></h3>
                </div> -->
                <div class="box-body">
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Pilih Jabatan</label>
                      <div class="col-sm-9">
                        <select id="role_id" name="role_id" class="form-control">
                             <option value="">Pilih Jabatan</option>
                            <?php foreach($roles as $role){?>
                            <option value="<?php echo $role->id;?>" <?php echo $role->id == $id ? "selected" : "" ?>><?php echo $role->name;?></option>
                            <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="box-divider mbot-15"></div>        
                    <table id="tabweb" class="table table-striped">
                      <thead>
                        <th style="width:70px"> <label class="mar-0 control control--checkbox"><input type="checkbox" id="checkAll"><div class="control__indicator" style="top:-15px;"></div></label ></th>
                        <th>Menu</th>
                        <th>Fungsi</th>
                      </thead>
                      <?php
                      foreach($menus as $key => $data_menu){
                        if(!empty($data_menu['name'])){
                          ?>
                        <tr>
                          <td class="valign-mid">
                            <label class="mar-0 control control--checkbox">
                              <input type="checkbox" class="cb-element" name="menus[]"
                              value="<?php echo $data_menu['id'];?>"
                              <?php  if(!empty($data_menu['checked'])){
                                  echo $data_menu['checked'];

                              }?>><div class="control__indicator" style="top:-8px;"></div>
                            </label  >
                          </td class="valign-mid">
                          <td> <span class="valign-mid"><?php echo $data_menu['name'];?></span>
                            <div class="btn-group dropdown pull-right padright-15 borright-soft-grey">
                            <button class="btn white dropdown-toggle btn-sm hide-caret" data-toggle="dropdown">Pilih Fungsi</button>
                            <div class="dropdown-menu dropdown-menu-form dropdown-menu-scale pull-right function-parent">
                              <?php
                                foreach($data_menu['functions'] as $function){
                                    if(!empty($function["id"] && $function['name'])){


                                  ?>
                                   <label class="col-12 control control--checkbox">
                                    <span class="pull-left fsize-14 padleft-10"><?php echo $function['name']?> </span>
                                    <input type="checkbox" class="cb-element-child function-<?php echo $function['id']?>"
                                    name="functions[<?php echo $data_menu['id'];?>][]"
                                    value="<?php echo $function['id']?>"
                                    <?php 
                                      if(!empty($function['checked'])){
                                        echo $function['checked'];
                                      }
                                    ?>>
                                    <div class="control__indicator no-bg-right"></div>
                                  </label>
                                <?php  } }?>
                                </div>
                              </div>
                             </td>
                            <td class="valign-mid">
                             <?php
                                foreach($data_menu['functions'] as $function){
                                    if(!empty($function['name'])){
                                      
                              ?>
                                <span class="label fsize-14 w-normal marright-5 text-black">
                                    <?php echo $function['name']?>
                                  </span>
                            <?php  } }?>
                          </td>
                        </tr>
                      <?php } }?>
                    </table>
                  
                   <!--  <div role="tabpanel" class="tab-pane" id="tab">
                      <table id="tabapps" class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th><input type="checkbox" class="select-cb"></th>
                            <th>Access</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if(!empty(($feature[0]))){
                            foreach($feature as $key =>$value){
                              ?>
                              <tr>
                                <td width="10">
                                    <input id="<?php echo $value->ID?>" class="cb-apps" <?php echo in_array($value->ID,$list_feature) ? 'checked' : '';?> type="checkbox" name="aplikasi[]" value="<?php echo $value->ID?>">
                                </td>
                                <td>
                                  <label for="<?php echo $value->ID?>">Pilih <?php echo $value->DESCRIPTION;?></label>
                                </td>
                              </tr>
                              <?php
                             }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div> -->
                  </div>
                </div>
                 <div class="box-footer">
                  <div class="form-group row m-t-md">
                    <div class="col-sm-12 text-right">
                      <a href="<?php echo base_url();?>privileges" class="btn btn-sm btn-danger uppercase">Batal</a>
                      <button type="submit" class="btn btn-sm btn-success uppercase" id="save-btn">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
 <script data-main="<?php echo base_url()?>assets/js/main/main-privilleges" src="<?php echo base_url()?>assets/js/require.js"></script>
