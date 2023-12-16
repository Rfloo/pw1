<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo base_url() ?>aset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">IDN MEDIA</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url() ?>aset/dist/img/shani1.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <?php
        $start = 0;
        $admin_data = $this->db->query(
          "SELECT * FROM admin GROUP BY no ASC LIMIT 5"
        )->result();
        foreach ($admin_data as $profile)
        ?>
        <a href="<?= base_url('index.php/pegawai/profile'); ?>" class="d-block"><?php echo $profile->nama ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item ">
          <a href="<?= base_url() ?>index.php/pegawai/home" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              HOME
            </p>
          </a>
        </li>
        <li class="nav-item ">
          <a href="<?= base_url() ?>index.php/pegawai/profile" class="nav-link">
            <i class="nav-icon fas fa-portrait"></i>
            <p>
              MY PROFILE
            </p>
          </a>
        </li>
        <li class="nav-item ">
          <a href="<?= base_url() ?>index.php/pegawai/index" class="nav-link">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
              DASHBOARD
            </p>
          </a>
        </li>
        <li class="nav-item ">
          <a href="<?= base_url() ?>index.php/pegawai/about" class="nav-link">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>
              ABOUT
            </p>
          </a>
        </li> -->
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>