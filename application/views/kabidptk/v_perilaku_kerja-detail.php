<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Penilaian Perilaku Kerja
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo site_url('kabidptk/skp/editPerilakuKerja/' . $id_header_skp);?>"><i class="fa fa-pencil"></i> Ubah</a>
                </div>
            </div>
        </div>
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
                                                <th>PREDIKAT</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list-form-skp'>
                                            <?php 
                                                $nomor = 1;
                                                $total_nilai = 0;
                                                $total_unsur = count($data_perilaku_kerja);
                                                foreach ($data_perilaku_kerja as $dpk) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $nomor++ ?></td>
                                                    <td><?php echo $dpk->unsur ?></td>
                                                    <td><?php echo $dpk->nilai ?></td>
                                                    <td><?php echo $dpk->predikat ?></td>
                                                </tr>
                                            <?php
                                                    $total_nilai += $dpk->nilai; 
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan='2'><center><strong>RATA-RATA</strong></center></td>
                                                <?php $rataan_nilai = $total_nilai / $total_unsur; ?>
                                                <td><strong><?php echo $rataan_nilai ?></strong></td>
                                                <?php
                                                    $predikat_rataan = "";
                                                    if ($rataan_nilai <= 50)
                                                        $predikat_rataan = "Buruk";
                                                    else if ($rataan_nilai <= 60)
                                                        $predikat_rataan = "Sedang";
                                                    else if ($rataan_nilai <= 75)
                                                        $predikat_rataan = "Cukup Baik";
                                                    else if ($rataan_nilai <= 90.99)
                                                        $predikat_rataan = "Baik";
                                                    else
                                                        $predikat_rataan = "Sangat Baik";
                                                ?>
                                                <td><strong><?php echo $predikat_rataan ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </table>
                        <!-- </div> -->
                        </div><!-- /.box-body -->
                </div>    
            </div>
        </div>
    </section>
</div>
