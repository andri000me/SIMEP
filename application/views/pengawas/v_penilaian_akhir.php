<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Penilaian Akhir
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" align="center">
                        <h3 class="box-title"><b>PENILAIAN AKHIR</b></h3>
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
            <div class="col-md-12" style='overflow-x: scroll !important;'>
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <table class="table table-bordered">
                                <table class="table table-bordered">
                                    <tbody id='list-form-skp'>
                                        <tr>
                                            <td colspan='4'><strong>UNSUR YANG DINILAI</strong></td>
                                            <td><strong>Jumlah</strong></td>
                                        </tr>
                                        <tr>
                                            <?php 
                                                $jumlah_skp = round($data_skp->total_nilai_capaian_skp * 0.6, 2);
                                            ?>
                                            <td colspan='2'><strong>a. Sasaran Kerja Pegawai (SKP)</strong></td>
                                            <td colspan='2' align='right'><strong><?php echo round($data_skp->total_nilai_capaian_skp, 2) . " x 60%" ?></strong></td>
                                            <td><?php echo $jumlah_skp ?></td>
                                        </tr>
                                        <tr>
                                            <td rowspan='<?php echo count($data_perilaku_kerja) + 3 ?>' style='vertical-align: middle !important;'><strong>b. Perilaku Kerja</strong></td>
                                        </tr>
                                        <?php 
                                            $nomor = 1;
                                            $total_nilai = 0;
                                            $total_unsur = count($data_perilaku_kerja);
                                            foreach ($data_perilaku_kerja as $dpk) {
                                        ?>
                                            <tr>
                                                <td><?php echo $nomor++ . ". " . $dpk->unsur ?></td>
                                                <td><?php echo $dpk->nilai ?></td>
                                                <td><?php echo $dpk->predikat ?></td>
                                                <td></td>
                                            </tr>
                                        <?php
                                                $total_nilai += $dpk->nilai; 
                                            }
                                        ?>
                                        <tr>
                                            <td>7. Jumlah</td>
                                            <td><?php echo $total_nilai ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>8. Nilai rata-rata</td>
                                            <?php $rataan_nilai = round($total_nilai / $total_unsur, 2); ?>
                                            <td><?php echo $rataan_nilai ?></td>
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
                                            <td><?php echo $predikat_rataan ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><strong>9. Nilai Perilaku Kerja</strong></td>
                                            <td colspan="2" align='right'><strong><?php echo $rataan_nilai . " x 40%" ?></strong></td>
                                            <?php $jumlah_perilaku = round($rataan_nilai * 0.4, 2); ?>
                                            <td><?php echo $jumlah_perilaku ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr valign='middle'>
                                            <td rowspan='2' colspan='4' align='center' style='vertical-align: middle !important;'><strong>NILAI PRESTASI KERJA</strong></td>
                                            <?php
                                                $nilai_prestasi_kerja = $jumlah_skp + $jumlah_perilaku;
                                                $predikat_prestasi_kerja = "";
                                                if ($nilai_prestasi_kerja <= 50)
                                                    $predikat_prestasi_kerja = "Buruk";
                                                else if ($nilai_prestasi_kerja <= 60)
                                                    $predikat_prestasi_kerja = "Sedang";
                                                else if ($nilai_prestasi_kerja <= 75)
                                                    $predikat_prestasi_kerja = "Cukup Baik";
                                                else if ($nilai_prestasi_kerja <= 90.99)
                                                    $predikat_prestasi_kerja = "Baik";
                                                else
                                                    $predikat_prestasi_kerja = "Sangat Baik";
                                            ?>
                                            <td><strong><?php echo $nilai_prestasi_kerja ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo $predikat_prestasi_kerja ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
