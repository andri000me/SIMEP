<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i> Detail Sasaran Kerja Pegawai
        </h1>
    </section>
    
    <section class="content">
        <?php
            if ($status_skp == 'Diajukan Menunggu Validasi') {
        ?>
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo site_url('pengawas/skp/editSKP/' . $id_header_skp);?>"><i class="fa fa-pencil"></i> Ubah</a>
                </div>
            </div>
        </div>
        <?php
            }
        ?>

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" align="center">
                        <h3 class="box-title"><b>SASARAN KERJA PEGAWAI NEGERI SIPIL</b></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>PEJABAT PENILAI</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b>Nama</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b>NIP</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pangkat/Gol.Ruang</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jabatan</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b>Unit Kerja</b></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>PEGAWAI NEGERI SIPIL YANG DINILAI</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b>Nama</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b>NIP</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pangkat/Gol.Ruang</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jabatan</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b>Unit Kerja</b></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Detail Sasaran Kerja Pegawasi (SKP)</h3>
                    </div>
                    <!-- /.box-header -->
                
                    <div class="col-sm-12 box-body table-responsive ">
                        <table class="table table-bordered table-striped" >
                            <thead> 
                                <tr>
                                    <th>NO</th>
                                    <th>UNSUR</th>
                                    <th>KEGIATAN TUGAS JABATAN</th>
                                    <th style="width: 80px">AK</th>
                                    <th style="width: 80px">AK</th>
                                    <th style="width: 120px">KUANT/OUTPUT</th>
                                    <th>SATUAN</th>
                                    <th>KUAL/MUTU</th>
                                    <th>WAKTU</th>
                                    <th>SATUAN</th>
                                    <th>BIAYA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($skp_detail as $sd) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $sd->jenis_unsur?></td>
                                    <td><?php echo $sd->keg_tgs_jbtn?></td>
                                    <td><?php echo $sd->ak_asli?></td>
                                    <td><?php echo $sd->ak_tgt?></td>
                                    <td><?php echo $sd->kuan_output_tgt?></td>
                                    <td><?php echo $sd->satuan_kuan_output_tgt?></td>
                                    <td><?php echo $sd->kual_mutu_tgt?></td>
                                    <td><?php echo $sd->wkt_tgt?></td>
                                    <td><?php echo $sd->satuan_wkt_tgt?></td>
                                    <td><?php echo $sd->biaya_tgt?></td>
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