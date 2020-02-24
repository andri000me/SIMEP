<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Edit Data Laporan
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" id="addLaporan" action="<?php echo site_url('kasiptk/data_laporan/validasiLaporan/' . $laporan->id_laporan) ?>" method="post" enctype='multipart/form-data'>
                        <div class="box-body">                            
                            <div class="row">
                                <div class="col-md-12">        
                                    <div class="form-group">
                                        <label for="tahun_skp">Tahun SKP</label>
                                        <input readonly='true' type="text" class="form-control required" id="tahun" name="tahun" maxlength="4" value='<?php echo $laporan->tahun_laporan ?>'>
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
                                                    if ($s->id_detail_skp == $laporan->id_skp_detail) {
                                                ?>
                                                    <option value=<?php echo "$s->id_detail_skp";?> selected>
                                                        <?php echo "$s->keg_tgs_jbtn";?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value=<?php echo "$s->id_detail_skp";?>>
                                                        <?php echo "$s->keg_tgs_jbtn";?>
                                                    </option>
                                                <?php } ?>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bln_mulai">Bulan Mulai</label>
                                        <select readonly='true' class="form-control" name="bln_mulai">
                                            <?php
                                                $bulan_arr = array(
                                                    "Januari",
                                                    "Februari",
                                                    "Maret",
                                                    "April",
                                                    "Mei",
                                                    "Juni",
                                                    "Juli",
                                                    "Agustus",
                                                    "September",
                                                    "Oktober",
                                                    "November",
                                                    "Desember"
                                                );
                                                foreach ($bulan_arr as $bulan) {
                                                if ($laporan->bln_mulai == $bulan) {
                                            ?>
                                                <option value="<?php echo $bulan ?>" selected><?php echo $bulan ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $bulan ?>"><?php echo $bulan ?></option>
                                            <?php }
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bln_selesai">Bulan Selesai</label>
                                        <select readonly='true' class="form-control" name="bln_selesai">
                                             <?php
                                                foreach ($bulan_arr as $bulan) {
                                                if ($laporan->bln_selesai == $bulan) {
                                            ?>
                                                <option value="<?php echo $bulan ?>" selected><?php echo $bulan ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $bulan ?>"><?php echo $bulan ?></option>
                                            <?php }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="laporan">File Data Pendukung</label>
                                        <input type="text" class="form-control required" id="laporan" name="laporan"' value='<?php echo $laporan->laporan ?>' readonly='true'>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <!-- /.box-body -->
                        
                        <div class="box-footer">
                            <div></div>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('kasiptk/data_laporan/downloadLaporan/' . $laporan->id_laporan) ?>" title="Download"><i class="fa fa-download"></i></a>
                            <input type="submit" class="btn btn-primary" value="Validasi" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
