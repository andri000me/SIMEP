<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Edit Program Jadwal
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" id="addDataPendukungSKP" action="<?php echo site_url('kasiptk/program_jadwal/validasiProgramJadwal/' . $program_jadwal->id_program_jadwal) ?>" method="post" enctype='multipart/form-data'>
                        <div class="box-body">                            
                            <div class="row">
                                <div class="col-md-12">        
                                    <div class="form-group">
                                        <label for="tahun_skp">Tahun SKP</label>
                                        <input readonly='true' type="text" class="form-control required" id="tahun" name="tahun" maxlength="4" value="<?php echo $program_jadwal->tahun_program ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="id_detail_skp">Kegiatan Tugas Jabatan</label>
                                        <select readonly='true' class="form-control" name="id_detail_skp">
                                            <option>--Select--</option>
                                            <?php foreach ($skp as $s) {
                                                if ($program_jadwal->id_detail_skp == $s->id_detail_skp) {
                                            ?>
                                                <option value=<?php echo "$s->id_detail_skp";?> selected>
                                                    <?php echo "$s->keg_tgs_jbtn";?>
                                                </option>
                                            <?php } else { ?>
                                                <option value=<?php echo "$s->id_detail_skp";?>>
                                                    <?php echo "$s->keg_tgs_jbtn";?>
                                                </option>
                                            <?php }
                                            }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jenis_program_jadwal">Jenis Program</label>
                                        <select readonly='true' class="form-control" name="jenis_program_jadwal">
                                            <?php 
                                                $jenis_program = array(
                                                    "Tahunan",
                                                    "Semester"
                                                );
                                                foreach ($jenis_program as $jp) {
                                                if ($program_jadwal->jenis_program_jadwal == $jp) {
                                            ?>
                                                <option value=<?php echo "$jp";?> selected>
                                                    <?php echo "$jp";?>
                                                </option>
                                            <?php } else { ?>
                                                <option value=<?php echo "$jp";?>>
                                                    <?php echo "$jp";?>
                                                </option>
                                            <?php } 
                                            }?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select readonly='true' class="form-control" name="semester">
                                            <?php 
                                                $semester = array(
                                                    "0" => "Tahunan",
                                                    "1" => "Ganjil",
                                                    "2" => "Genap"
                                                );
                                                foreach ($semester as $key_semester => $value_semester) {
                                                if ($program_jadwal->semester == $key_semester) {
                                            ?>
                                                <option value=<?php echo "$key_semester";?> selected>
                                                    <?php echo "$value_semester";?>
                                                </option>
                                            <?php } else { ?>
                                                <option value=<?php echo "$key_semester";?>>
                                                    <?php echo "$value_semester";?>
                                                </option>
                                            <?php } 
                                            }?>
                                        </select>
                                    </div>
                                </div>
                            </div>  

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="program_jadwal">File Data Pendukung</label>
                                        <input type="text" class="form-control required" id="data_pendukung" name="program_jadwal"' value='<?php echo $program_jadwal->program_jadwal ?>' readonly='true'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        
                        <div class="box-footer">
                            <div></div>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('kasiptk/program_jadwal/downloadProgramJadwal/' . $program_jadwal->id_program_jadwal) ?>" title="Download"><i class="fa fa-download"></i></a>
                            <input type="submit" class="btn btn-primary" value="Validasi" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
