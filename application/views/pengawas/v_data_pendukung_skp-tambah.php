<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Tambah Data Pendukung SKP
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
                    <form role="form" id="addDataPendukungSKP" action="<?php echo site_url('pengawas/data_pendukung_skp/addNewDataPendukungSKP') ?>" method="post" enctype='multipart/form-data'>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">        
                                    <div class="form-group">
                                        <label for="tahun_skp">Tahun SKP</label>
                                        <input type="text" class="form-control required" id="tahun" name="tahun" maxlength="4">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="id_detail_skp">Kegiatan Tugas Jabatan</label>
                                        <select class="form-control" name="id_detail_skp">
                                            <option>--Select--</option>
                                            <?php foreach ($skp as $s) {?>
                                                <option value=<?php echo "$s->id_detail_skp";?>>
                                                    <?php echo "$s->keg_tgs_jbtn";?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jenis_data">Jenis Data</label>
                                        <input type="text" class="form-control required" id="jenis_data" name="jenis_data">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="data_pendukung">File Data Pendukung</label>
                                        <input type="file" class="form-control required" id="data_pendukung" name="data_pendukung">
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <!-- /.box-body -->
                        
                        <div class="box-footer">
                            <div></div>
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
