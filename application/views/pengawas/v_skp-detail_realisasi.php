<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i> Detail Sasaran Kerja Pegawai
        </h1>
    </section>
    
    <section class="content">
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
                                    <th rowspan='2'>NO</th>
                                    <th rowspan='2'>JENIS UNSUR</th>
                                    <th rowspan='2'>KEGIATAN TUGAS JABATAN</th>
                                    <th colspan='7'>TARGET</th>
                                    <th colspan='7'>REALISASI</th>
                                </tr>
                                <tr>
                                    <th>AK</th>
                                    <th>KUANT/OUTPUT</th>
                                    <th>SATUAN</th>
                                    <th>KUAL/MUTU</th>
                                    <th>WAKTU</th>
                                    <th>SATUAN</th>
                                    <th>BIAYA</th>
                                    <th>AK REAL</th>
                                    <th>KUANT/OUTPUT</th>
                                    <th>SATUAN</th>
                                    <th>KUAL/MUTU</th>
                                    <th>WAKTU</th>
                                    <th>SATUAN</th>
                                    <th>BIAYA</th>
                                </tr>
                            </thead>
                            <tbody id='list-form-skp'>
                                <?php $nomor = 1; foreach ($detail_skp as $ds) { ?>
                                    <tr>
                                        <td><?php echo $nomor++ ?></td>
                                        <td style='display: none;'>
                                            <input type="hidden" name="id_detail_skp[]" value="<?php echo $ds->id_detail_skp ?>">
                                        </td>
                                        <td>
                                            <?php echo $ds->jenis_unsur ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->keg_tgs_jbtn ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->ak_tgt ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->kuan_output_tgt ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->satuan_kuan_output_tgt ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->kual_mutu_tgt ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->wkt_tgt ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->satuan_wkt_tgt ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->biaya_tgt ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->ak_real ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->kuan_output_real ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->satuan_kuan_output_real ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->kual_mutu_real ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->wkt_real ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->satuan_wkt_real ?>
                                        </td>
                                        <td>
                                            <?php echo $ds->biaya_real ?>
                                        </td>
                                    </tr>
                                <?php } ?>
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