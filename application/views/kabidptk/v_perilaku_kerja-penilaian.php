<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Penilaian Perilaku Kerja
      </h1>
    </section>
    <section class="content">
    <form  action="<?php echo site_url('kabidptk/skp/insertPerilakuKerja/' . $id_header_skp) ?>" method="post">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" align="center">
                        <h3 class="box-title"><b>FORMULIR PENILAIAN PERILAKU KERJA</b></h3>
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
            <div class="col-md-12" style='overflow-x: scroll !important;'>
                      <!-- general form elements -->
                <div class="box box-primary">
                            <!-- form start -->                        
                    <div class="box-body table-responsive">
                        <div class="row">
                            <!-- <div class="col-md-12"> -->
                                <table class="table table-bordered">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>UNSUR</th>
                                                <th>NILAI</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list-form-skp'>
                                            <?php 
                                                $nomor = 1; 
                                                $unsur_perilaku_kerja_arr = array(
                                                    'Orientasi Pelayanan',
                                                    'Integritas',
                                                    'Komitmen',
                                                    'Disiplin',
                                                    'Kerjasama',
                                                    'Kepemimpinan'
                                                );
                                                foreach ($unsur_perilaku_kerja_arr as $unsur_perilaku_kerja) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $nomor++ ?></td>
                                                    <td>
                                                        <input readonly="true" class='form-control' type="text" name="unsur[]" value='<?php echo $unsur_perilaku_kerja ?>'>
                                                    </td>
                                                    <td>
                                                        <input class='form-control' type="text" name="nilai[]" value=''>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </table>
                        <!-- </div> -->
                        </div><!-- /.box-body -->
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Simpan" />
                    </div>
                </div>    
            </div>
        </div>
    </form>
    </section>
</div>
