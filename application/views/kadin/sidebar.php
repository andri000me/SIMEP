<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!--sidebar: user panel-->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>" class="user-image" alt="User Image"/>
        </div>
        <div class="pull-left info">
            <h4>KEPALA DINAS</h4>
        </div>
    </div>

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">    
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">        
            <li>
                <a href="<?php echo site_url('kadin/skp');?>">
                    <i class="fa fa-table"></i> 
                    <span>SKP</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('kadin/program_jadwal');?>">
                    <i class="fa fa-table"></i> 
                    <span>Program & Jadwal</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('kadin/data_laporan');?>">
                    <i class="fa fa-table"></i> 
                    <span>Laporan</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('kadin/data_lembaga');?>">
                    <i class="fa fa-table"></i>
                    <span>Data Lembaga</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('kadin/data_pengawas');?>">
                    <i class="fa fa-table"></i> 
                    <span>Data Pengawas</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>