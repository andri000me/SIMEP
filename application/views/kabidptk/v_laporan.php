<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Daftar Laporan
        </h1>
    </section>
    
    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Laporan</h3>
                    </div>
                    <!-- /.box-header -->
                    
                    <div class="col-sm-12 box-body table-responsive">
                        <table class="table table-bordered table-striped dtable" >
                            <thead> 
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Bulan Mulai</th>
                                    <th>Bulan Selesai</th>
                                    <th>Laporan</th>
                                    <th>Tanggal Unggah</th>
                                    <th>Tanggal Validasi</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $no = 1;
                                  foreach ($laporan as $o) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $o->tahun_laporan?></td>
                                    <td><?php echo $o->bln_mulai?></td>
                                    <td><?php echo $o->bln_selesai?></td>
                                    <td><?php echo $o->laporan?></td>
                                    <td><?php echo $o->tgl_unggah?></td>
                                    <td><?php echo $o->tgl_validasi?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('kabidptk/data_laporan/downloadLaporan/'.$o->id_laporan) ?>" title="Download"><i class="fa fa-download"></i></a>
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
