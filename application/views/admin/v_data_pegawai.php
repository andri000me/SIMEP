<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Data Pegawai
        </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo site_url('admin/data_pegawai/addNewPegawaiPage');?>"><i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Pegawai</h3>
                    </div><!-- /.box-header -->
                    
                    <div class="col-sm-12 box-body table-responsive">
                        <table class="table table-bordered table-striped dtable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP/NIK</th>
                                    <th>Nama</th>
                                    <th>Pangkat/Gol.ruang</th>
                                    <th>Jabatan</th>
                                    <th>Jenis Kelamin</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $no = 1;
                                  foreach ($pegawai as $p) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $p->nip_nik?></td>
                                    <td><?php echo $p->nama_pegawai?></td>
                                    <td><?php echo $p->pangkat_gol_ruang?></td>
                                    <td><?php echo $p->jabatan?></td>
                                    <td><?php echo $p->jenis_kelamin?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/data_pegawai/editPegawai/'.$p->id_pegawai) ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                        
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


