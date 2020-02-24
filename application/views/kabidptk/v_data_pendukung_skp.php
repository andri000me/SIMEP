<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Daftar Pendukung SKP
        </h1>
    </section>
    
    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Pendukung SKP</h3>
                    </div>
                    <!-- /.box-header -->
                    
                    <div class="col-sm-12 box-body table-responsive">
                        <table class="table table-bordered table-striped dtable" >
                            <thead> 
                                <tr>
                                    <th>No</th>
                                    <th>Tahun SKP</th>
                                    <th>Kegiatan Tugas Jabatan</th>
                                    <th>Jenis Data Pendukung</th>
                                    <th>File Pendukung</th>
                                    <th>Tanggal Unggah</th>
                                    <th>Tanggal Validasi</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $no = 1;
                                  foreach ($pendukung_skp as $ps) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $ps->tahun_pendukung_skp?></td>
                                    <td><?php echo $ps->keg_tgs_jbtn?></td>
                                    <td><?php echo $ps->jenis_data?></td>
                                    <td><?php echo $ps->data_pendukung?></td>
                                    <td><?php echo $ps->tgl_unggah?></td>
                                    <td><?php echo $ps->tgl_validasi?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('kabidptk/data_pendukung_skp/downloadDataPendukungSKP/'.$ps->id_data_pendukung) ?>" title="Download"><i class="fa fa-download"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }                    
                                ?>
                            </tbody>
                        </table>                  
                    </div>
                    <!-- /.box-body -->                    
                    
                    <div class="box-footer clearfix">
                        <?php  ?>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
