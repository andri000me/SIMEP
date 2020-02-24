<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Tambah Laporan
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Masukkan Data Laporan</h3>
                    </div>
                    <!-- /.box-header -->
                    
                    <!-- form start -->
                    <form role="form" id="addNewLaporan" action="<?php echo site_url('pengawas/data_laporan/addNewLaporan') ?>" method="post" enctype='multipart/form-data'>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">        
                                    <div class="form-group">
                                        <label for="tahun_skp">Tahun SKP</label>
                                        <input type="text" class="form-control required" id="tahun" name="tahun" maxlength="4" required>
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
                                        <label for="bln_mulai">Bulan Mulai</label>
                                        <select class="form-control" name="bln_mulai">
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bln_selesai">Bulan Selesai</label>
                                        <select class="form-control" name="bln_selesai">
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="laporan">File Laporan</label>
                                        <input type="file" class="form-control required" id="laporan" name="laporan" required>
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

