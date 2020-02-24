  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">

  <!--sidebar: user panel-->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>" class="user-image" alt="User Image"/>
      </div>
      <div class="pull-left info">
        <h4>ADMIN</h4>
      </div>
    </div>

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">   
        
        <li>
          <a href="<?php echo site_url('admin/data_lembaga');?>">
            <i class="fa fa-files-o"></i>
            <span>Data Lembaga</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('admin/data_pegawai');?>">
            <i class="fa fa-pie-chart"></i>
            <span>Data Pegawai</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('admin/data_pengawas');?>">
            <i class="fa fa-pie-chart"></i>
            <span>Data Pengawas</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('admin/user');?>">
            <i class="fa fa-laptop"></i>
            <span>Pengguna</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> 
            <span>Data SKP</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('admin/data_tahun_skp');?>">
                <i class="fa fa-circle-o"></i> Tahun SKP
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/data_penilai');?>">
                <i class="fa fa-circle-o"></i> Data Penilai
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/data_validator');?>">
                <i class="fa fa-circle-o"></i> Data Validator
              </a>
            </li>        
          </ul>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>