<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Manajemen Pengguna
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo site_url('admin/data_pegawai/addNewPegawaiPage');?>"><i class="fa fa-plus">  
                    </i> Tambah Pegawai</a>
                    <a class="btn btn-primary" href="<?php echo site_url('admin/data_pengawas/addNewPengawasPage');?>"><i class="fa fa-plus"></i> Tambah Pengawas</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                          <h3 class="box-title text-center">Daftar Pengguna</h3>
                    </div><!-- /.box-header -->
                    <div class="col-sm-12 box-body table-responsive">
                        <table class="table table-bordered table-striped dtable" >
                            <thead>  
                                <tr>
                                    <th>No</th>
                                    <th>NIP/NIK</th>
                                    <th>Name</th>
                                    <th>Otoritas</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $no = 1;
                                  foreach ($user as $u) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $u->nip_nik?></td>
                                    <td><?php echo $u->nama_pegawai?></td>
                                    <td><?php echo $u->otoritas?></td>
                                    <td><?php echo $u->status?></th>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info" href="#" title="Edit"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }                    
                                ?>
                            </tbody>
                        </table>                        
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <?php  ?>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

