<style>
  #li-navigation:hover{
    background-color:grey;
  }



</style>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-align-justify"></i> <span>Navigation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            
            <li id="li-navigation"class="active">
              <a href="<?php echo site_url('admin/user'); ?>">
              <i class="fa fa-user-o"></i> User </a>
            </li>
            <li id="li-navigation"class="active">
              <a href="<?php echo site_url('admin/siswa'); ?>">
              <i class="fa fa-user-o"></i> Siswa </a>
            </li>
            <li id="li-navigation"class="active">
              <a href="<?php echo site_url('admin/guru'); ?>">
              <i class="fa fa-user-o"></i> Guru </a>
            </li>
            <li id="li-navigation"class="active">
              <a href="<?php echo site_url('admin/alumni'); ?>">
              <i class="fa fa-male"></i> Alumni </a>
            </li>
            <li id="li-navigation"class="active">
              <a href="<?php echo site_url('admin/ekskul'); ?>">
              <i class="fa fa-futbol-o"></i> Ekskul </a>
            </li>
            <li id="li-navigation"class="active">
              <a href="<?php echo site_url('admin/kegiatan'); ?>">
              <i class="fa fa-check"></i> Kegiatan </a>
            </li>


          </ul>
        </li>
        
    </section>
    <!-- /.sidebar -->
  </aside>