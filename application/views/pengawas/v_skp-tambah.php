<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Tambah Sasaran Kerja Pegawai (SKP)
        </h1>
    </section>
    <section class="content">
    <form  action="<?php echo site_url('pengawas/skp/addSKP') ?>" method="post">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" align="center">
                        <h3 class="box-title"><b>FORMULIR SASARAN KERJA PEGAWAI NEGERI SIPIL</b></h3>
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
                        <h3 class="box-title"><b>Formulir Tambah Data SKP</b></h3>
                    </div>
                    <!-- /.box-header -->
                    
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
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <select class="form-control" name="jenis_unsur[]" id='skp-jenis_unsur-1'>
                                                       <option value="Unsur Utama">Unsur Utama</option>
                                                       <option value="Unsur Pendukung">Unsur Pendukung</option>
                                                       <option value="Tugas Tambahan">Tugas Tambahan</option>
                                                       <option value="Kreativitas">Kreativitas</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class='form-control' type="text" name="keg_tgs_jbtn[]" id='skp-keg_tgs_jbtn-1'>
                                                </td>
                                                <td>
                                                    <input class='form-control' type="text" name="ak_asli[]" id='skp-ak_asli-1'>
                                                </td>
                                                <td>
                                                    <input class='form-control' type="text" name="kuan_output_tgt[]" id='skp-kuan_output_tgt-1'>
                                                </td>
                                                <td>
                                                    <input class='form-control' type="text" name="satuan_kuan_output_tgt[]" id='skp-satuan_kuan_output_tgt-1'>
                                                </td>
                                                <td>
                                                    <input class='form-control' type="text" name="kual_mutu_tgt[]" id='skp-kual_mutu-1'>
                                                </td>
                                                <td>
                                                    <input class='form-control' type="text" name="wkt_tgt[]" id='skp-wkt_tgt-1'>
                                                </td>
                                                <td>
                                                    <input class='form-control' type="text" name="satuan_wkt_tgt[]" id='skp-satuan_wkt_tgt-1'>
                                                </td>
                                                <td>
                                                    <input class='form-control' type="text" name="biaya_tgt[]" id='skp-biaya_tgt-1'>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- <div id="insert-form"></div> -->
                                    <button type="button" id="btn-tambah-baris-form-skp">Tambah Data Form</button>
                                    <button type="button" id="btn-reset-form-skp">Reset Form</button><br><br>

                                    <!-- Kita buat textbox untuk menampung jumlah data form -->
                                    <input type="hidden" id="jumlah-baris-form-skp" value="1">
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Simpan" />
                    </div>
                </div>    
            </div>
        </div>
    </form>
    </section>
</div>
