<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Edit Data Pendukung SKP
        </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Masukkan Data Pendukung SKP</h3>
                    </div>
                    <!-- /.box-header -->
                    
                    <!-- form start -->
                    <form role="form" id="addDataPendukungSKP" action="<?php echo site_url('kasiptk/data_pendukung_skp/validasiDataPendukungSKP/' . $data_pendukung->id_data_pendukung) ?>" method="post" enctype='multipart/form-data'>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">        
                                    <div class="form-group">
                                        <label for="tahun_skp">Tahun SKP</label>
                                        <input type="text" class="form-control required" id="tahun" name="tahun" maxlength="4" readonly="true" value='<?php echo $data_pendukung->tahun_pendukung_skp ?>'>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="id_detail_skp">Kegiatan Tugas Jabatan</label>
                                        <type="text" class="form-control required" id="tahun" name="jenis_kegiatan" readonly='true'>
                                            <?php echo "$data_pendukung->keg_tgs_jbtn"; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jenis_data">Jenis Data</label>
                                        <input type="text" class="form-control required" id="jenis_data" name="jenis_data" readonly='true' value='<?php echo $data_pendukung->jenis_data ?>'>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="data_pendukung">File Data Pendukung</label>
                                        <input type="text" class="form-control required" id="data_pendukung" name="data_pendukung"' value='<?php echo $data_pendukung->data_pendukung ?>' readonly='true'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        
                        <div class="box-footer">
                            <div></div>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('kasiptk/data_pendukung_skp/downloadDataPendukungSKP/' . $data_pendukung->id_data_pendukung) ?>" title="Download"><i class="fa fa-download"></i></a>
                            <input type="submit" class="btn btn-primary" value="Validasi" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
