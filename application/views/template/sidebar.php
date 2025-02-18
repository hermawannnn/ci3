<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php base_url() ?>" class="brand-link">
    <span class="brand-text font-weight-light">Rapor | AIS</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- User Image -->
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $this->session->userdata('nama'); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard Link -->
        <li class="nav-item">
          <a href="<?php echo site_url('dashboard'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <?php if ($this->session->userdata('role') == 'admin'): ?>
          <!-- Admin Links -->
          <li class="nav-item">
            <a href="<?php echo site_url('user'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('kelas'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'kelas') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>Kelas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('siswa'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'siswa') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>Siswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('pelajaran'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'pelajaran') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>Mata Pelajaran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('pembelajaran'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'pembelajaran') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-book-open"></i>
              <p>Data Mengajar</p>
            </a>
          </li>
        <?php endif; ?>

        <?php if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'guru'): ?>
          <!-- Teacher Links -->
          <li class="nav-item has-treeview <?php echo ($this->uri->segment(1) == 'raport' || $this->uri->segment(1) == 'rapormid') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo ($this->uri->segment(1) == 'raport' || $this->uri->segment(1) == 'rapormid') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Nilai Tengah Semester
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('raport'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'raport') ? 'active' : ''; ?>">
                  <i class="nav-icon far fa-circle"></i>
                  <p>Input NTS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('rapormid'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'rapormid') ? 'active' : ''; ?>">
                  <i class="nav-icon far fa-circle"></i>
                  <p>Rapor Mid Semester</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>