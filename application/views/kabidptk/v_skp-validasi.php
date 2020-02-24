<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Validasi Sasaran Kerja Pegawai (SKP)
      </h1>
    </section>
    <section class="content">
    <form  action="<?php echo site_url('kabidptk/skp/updateSKP/' . $id_header_skp) ?>" method="post">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" align="center">
                        <h3 class="box-title"><b>FORMULIR VALIDASI SASARAN KERJA PEGAWAI NEGERI SIPIL</b></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>PEJABAT PENILAI</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b>Nama</b></td>
                                        <td><?php echo $penilai->nama_pegawai?></td>
                                    </tr>
                                    <tr>
                                        <td><b>NIP</b></td>
                                        <td><?php echo $penilai->nip_nik?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pangkat/Gol.Ruang</b></td>
                                        <td><?php echo $penilai->pangkat_gol_ruang?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jabatan</b></td>
                                        <td><?php echo $penilai->jabatan?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Unit Kerja</b></td>
                                        <td><?php echo $penilai->unit_kerja?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>PEGAWAI NEGERI SIPIL YANG DINILAI</h4>
                                <table class="table table-bordered">
                                        <tr>
                                            <td><b>Nama</b></td>
                                            <td><?php echo $pengawas->nama_pegawai ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>NIP</b></td>
                                            <td><?php echo $pengawas->nip_nik ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pangkat/Gol.Ruang</b></td>
                                            <td><?php echo $pengawas->pangkat_gol_ruang ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jabatan</b></td>
                                            <td><?php echo $pengawas->jabatan ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Unit Kerja</b></td>
                                            <td><?php echo $pengawas->unit_kerja ?></td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>

        <div class="row">
                    <!-- left column -->
            <div class="col-md-12">
                      <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header" align="center">
                        <h3 class="box-title"><b>Formulir Data Detail SKP</b></h3>
                    </div><!-- /.box-header -->
                            <!-- form start -->                        
                    <div class="box-body table-responsive">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th width='20%'>UNSUR</th>
                                                <th width='25%'>KEGIATAN TUGAS JABATAN</th>
                                                <th width='8%'>AK</th>
                                                <th width='7%'>KUANT/OUTPUT</th>
                                                <th width='10%'>SATUAN</th>
                                                <th width='5%'>KUAL/MUTU</th>
                                                <th width='5%'>WAKTU</th>
                                                <th width='10%'>SATUAN</th>
                                                <th width='10%'>BIAYA</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list-form-skp'>
                                            <?php $nomor = 1; foreach ($detail_skp as $ds) { ?>
                                                <tr>
                                                    <td><?php echo $nomor++ ?></td>
                                                    <td style='display: none;'>
                                                        <?php echo $ds->id_detail_skp ?>">
                                                    </td>
                                                    <td>
                                                        <?php echo $ds->jenis_unsur ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ds->keg_tgs_jbtn ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ds->ak_asli ?>
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
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <!-- Kita buat textbox untuk menampung jumlah data form -->
                                    <input type="hidden" id="jumlah-baris-form-skp" value="<?php echo count($detail_skp) ?>">
                                </table>
                        </div>
                        </div><!-- /.box-body -->
                    <div class="box-footer">
                         <div class="col-md-3">
                             <select class="form-control" name="status_skp[]">
                               <?php if ($status_skp == "Diajukan Menunggu Validasi") { ?>
                                    <option value="Diajukan Menunggu Validasi" selected>Diajukan Menunggu Validasi</option>
                               <?php } else { ?>
                                    <option value="Diajukan Menunggu Validasi">Diajukan Menunggu Validasi</option>
                               <?php } ?>
                               <?php if ($status_skp == "Divalidasi dan Disetujui") { ?>
                                    <option value="Divalidasi dan Disetujui" selected>Divalidasi dan Disetujui</option>
                               <?php } else { ?>
                                    <option value="Divalidasi dan Disetujui">Divalidasi dan Disetujui</option>
                               <?php } ?>
                               <?php if ($status_skp == "Divalidasi dan Tidak Disetujui") { ?>
                                    <option value="Divalidasi dan Tidak Disetujui" selected>Divalidasi dan Tidak Disetujui</option>
                               <?php } else { ?>
                                    <option value="Divalidasi dan Tidak Disetujui">Divalidasi dan Tidak Disetujui</option>
                               <?php } ?>
                               <?php if ($status_skp == "Divalidasi dan Ditetapkan") { ?>
                                    <option value="Divalidasi dan Ditetapkan" selected>Divalidasi dan Ditetapkan</option>
                               <?php } else { ?>
                                    <option value="Divalidasi dan Ditetapkan">Divalidasi dan Ditetapkan</option>
                               <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-primary" value="Simpan" />
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </form>
    </section>
</div>
