<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Ubah Data Pengawas
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Masukkan Data Pengawas</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="updatePengawas" action="<?php echo site_url('admin/data_pengawas/updatePengawas/' . $data_pengawas->id_pengawas) ?>" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">        
                                    <div class="form-group">
                                        <label for="nama_pegawai">Nama Lengkap</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_pengawas->nama_pegawai ?>" id="nama_pegawai" name="nama_pegawai" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nip_nik">NIP/NIK</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_pengawas->nip_nik ?>" id="nip_nik" name="nip_nik" maxlength="128">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pangkat_gol_ruang">Pangkat/Gol.Ruang</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_pengawas->pangkat_gol_ruang ?>" id="pangkat_gol_ruang" name="pangkat_gol_ruang" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nuptk">NUPTK</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_pengawas->nuptk ?>" id="nuptk" name="nuptk" maxlength="25">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_pengawas->jabatan ?>" id="jabatan" name="jabatan" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tmt_jabatan">TMT. Jabatan</label>
                                        <br/><input type="text" class="datepicker required" placeholder="yyyy/mm/dd" data-date-format="yyyy/mm/dd" value="<?php echo $data_pengawas->tmt_jabatan ?>" id="tmt_jabatan" name="tmt_jabatan">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bidang">Bidang Pengawasan</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_pengawas->bidang ?>" id="bidang" name="bidang" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan Terakhir</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_pengawas->pendidikan ?>" id="pendidikan" name="pendidikan" maxlength="75">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tmp_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_pengawas->tmp_lahir ?>" id="tmp_lahir" name="tmp_lahir" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label><br>
                                        <input class="datepicker" placeholder="yyyy/mm/dd" data-date-format="yyyy/mm/dd" value="<?php echo $data_pengawas->tgl_lahir ?>" id="tgl_lahir" name="tgl_lahir" maxlength="75">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin">
                                           <?php if ( $data_pengawas->jenis_kelamin == "L" ) {?>
                                                <option value="L" selected>Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            <?php } else {?>
                                                <option value="L">Laki-laki</option>
                                                <option value="P" selected>Perempuan</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status">
                                           <?php if ( $data_pengawas->status == "Aktif" ) {?>
                                                <option value="Aktif" selected>Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            <?php } else {?>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif" selected>Tidak Aktif</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unit_kerja">Unit Kerja</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_pengawas->unit_kerja ?>" id="unit_kerja" name="unit_kerja" maxlength="20">
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div></div>
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
