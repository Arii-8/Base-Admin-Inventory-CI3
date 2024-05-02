<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> 
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">  
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user-circle"></i> 
          Administrator
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"> 
          
          <a href="<?php echo base_url()?>profile" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Profil
          </a> 
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()?>auth/logout" class="dropdown-item">
            <i class="fas fa-file mr-2"></i>Logout
          </a> 
        </div>
      </li> 
    </ul>
</nav>