<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php base_url() ?>" class="brand-link">
    <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">Rapor | AIS</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $this->session->userdata('nama'); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo site_url('dashboard'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if ($this->session->userdata('role') == 'admin'): ?>
          <li class="nav-item">
            <a href="<?php echo site_url('user'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('kelas'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'kelas') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Kelas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('siswa'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'siswa') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('pelajaran'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'pelajaran') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Mata Pelajaran
              </p>
            </a>
          </li>
        <?php endif; ?>
        <?php if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'guru'): ?>
          <li class="nav-item">
            <a href="<?php echo site_url('rapormid'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'rapormid') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Rapor Mid Semester
              </p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="<?php echo site_url('pembelajaran'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'pembelajaran') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Pembelajaran
              </p>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>