<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i> Daftar Sasaran Kerja Pegawai
        </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo site_url('pengawas/skp/addNewSKPPage');?>"><i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Sasaran Kerja Pegawasi (SKP)</h3>
                </div><!-- /.box-header -->
                
                <div class="col-sm-12 box-body table-responsive ">
                    <table class="table table-bordered table-striped dtable" >
                        <thead> 
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Tanggal Validasi</th>
                                <th>Tanggal Penilaian</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($skp as $s) {
                            ?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $s->tahun_skp?></td>
                                <td><?php echo $s->status_skp?></td>
                                <td><?php echo $s->tanggal_pengajuan?></td>
                                <td><?php echo $s->tanggal_validasi?></td>
                                <td><?php echo $s->tanggal_penilaian?></td>
                                <td class="text-center">
                                    <?php if ($s->tanggal_penilaian == '0000-00-00 00:00:00') { ?>
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('pengawas/skp/detailSKP/'.$s->id_header_skp) ?>" title="Detail"><i class="fa fa-eye"></i></a>
                                    <?php } else { ?>
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('pengawas/skp/realisasiSKP/'.$s->id_header_skp) ?>" title="Nilai Realisasi"><i class="fa fa-book"></i></a>
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('pengawas/skp/penilaianSKP/'.$s->id_header_skp) ?>" title="Penilaian SKP"><i class="fa fa-file"></i></a>
                                    <?php } ?>
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