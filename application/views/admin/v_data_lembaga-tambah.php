<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Tambah Data Lembaga
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Masukkan Data Lembaga</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="addLembaga" action="<?php echo site_url('admin/data_lembaga/addLembaga') ?>" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">        
                                    <div class="form-group">
                                        <label for="npsn">NPSN</label>
                                        <input type="text" class="form-control required" id="npsn" name="npsn" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_sekolah">Nama Lembaga</label>
                                        <input type="text" class="form-control required" id="nama_sekolah" name="nama_sekolah" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_kepsek">Nama Kepala Sekolah</label>
                                        <input type="text" class="form-control required" id="nama_kepsek" name="nama_kepsek" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control required" id="alamat" name="alamat" maxlength="20">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tingkat">Tingkat</label>
                                        <select class="form-control" name="tingkat">
                                           <option>--Select--</option>
                                           <option value="TK">TK</option>
                                           <option value="SD">SD</option>
                                           <option value="SMP">SMP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_pegawai">Pengawas</label>
                                        <select class="form-control" name="id_pegawai">
                                            <option>--Select--</option>
                                            <?php foreach ($pengawas as $p) {?>
                                                <option value=<?php echo "$p->id_pegawai";?>>
                                                    <?php echo "$p->nip_nik - $p->nama_pegawai";?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
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
