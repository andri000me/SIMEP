<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Tambah Data Validator
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Masukkan Data Validator</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="addPenilai" action="<?php echo site_url('admin/data_validator/addValidator') ?>" method="post">
                        <div class="box-body">
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_pegawai">Pegawai</label>
                                        <select class="form-control" name="id_pegawai">
                                            <option>--Select--</option>
                                            <?php foreach ($pegawai as $p) {?>
                                                <option value=<?php echo "$p->id_pegawai";?>>
                                                    <?php echo "$p->nip_nik - $p->nama_pegawai";?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan Validator</label>
                                        <select class="form-control" name="jabatan">
                                            <input type="text" class="form-control required" id="jabatan" name="jabatan" maxlength="128">
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
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
