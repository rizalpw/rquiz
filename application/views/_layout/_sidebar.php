<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      
      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>

      <li <?php if ($page == 'user') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('User'); ?>">
          <i class="fa fa-user"></i>
          <span>Data User</span>
        </a>
      </li>
      
      <li <?php if ($page == 'nilai') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('nilai'); ?>">
          <i class="fa fa-check"></i>
          <span>Data nilai</span>
        </a>
      </li>

      <li <?php if ($page == 'soal') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('soal'); ?>">
          <i class="fa fa-list-ol"></i>
          <span>Data soal</span>
        </a>
      </li>
      
      <li <?php if ($page == 'kuis') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('kuis'); ?>">
          <i class="fa fa-book"></i>
          <span>Data kuis</span>
        </a>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>