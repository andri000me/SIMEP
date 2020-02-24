<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Tambah Program dan Jadwal Kerja
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Masukkan Data Program dan Jadwal</h3>
                    </div><!-- /.box-header -->
                    
                    <!-- form start -->
                    <form role="form" id="addNewProgramJadwal" action="<?php echo site_url('pengawas/program_jadwal/addNewProgramJadwal') ?>" method="post" enctype='multipart/form-data'>
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
                                        <label for="jenis_program_jadwal">Jenis Program</label>
                                        <select class="form-control" name="jenis_program_jadwal">
                                            <option value="Tahunan">Tahunan</option>
                                            <option value="Semester">Semester</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select class="form-control" name="semester">
                                            <option value="0">Tahunan</option>
                                            <option value="1">Ganjil</option>
                                            <option value="2">Genap</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="program_jadwal">File Program dan Jadwal</label>
                                        <input type="file" class="form-control required" id="program_jadwal" name="program_jadwal">
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

