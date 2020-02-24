<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-thumb-tack"></i> Data Lembaga
        </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Lembaga</h3>
                    </div>

                    <div class="col-sm-12 box-body table-responsive">
                        <table class="table table-bordered table-striped dtable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NPSN</th>
                                    <th>Nama Sekolah</th>
                                    <th>Kepala Sekolah</th>
                                    <th>Alamat</th>
                                    <th>Tingkat</th>
                                    <th>Status</th>
                                    <th>Pengawas</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($lembaga as $l) {
                                ?>
                                
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $l->npsn?></td>
                                    <td><?php echo $l->nama_sekolah?></td>
                                    <td><?php echo $l->nama_kepsek?></td>
                                    <td><?php echo $l->alamat?></td>
                                    <td><?php echo $l->tingkat?></td>
                                    <td><?php echo $l->status?></td>
                                    <td><?php echo $l->nama_pegawai?></td>
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
