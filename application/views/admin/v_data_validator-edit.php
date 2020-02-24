<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Edit Data Validator
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
                    <form role="form" id="updateValidator" action="<?php echo site_url('admin/data_validator/updateValidator/' . $validator->id_validator) ?>" method="post">
                        <div class="box-body">
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_pegawai">Pegawai</label>
                                        <select class="form-control" name="id_pegawai">
                                            <!-- <option>--Select--</option> -->
                                            <?php foreach ($data_validator as $v) 
                                            {
                                                if ($v->id_validator == $validator->id_penilai)
                                                {
                                            ?>    
                                                <option value=<?php echo "$v->id_pegawai";?> selected>
                                                    <?php echo "$v->nip_nik - $v->nama_pegawai";?>
                                                </option>
                                            <?php }
                                                else{ ?>
                                                    <option value=<?php echo "$v->id_pegawai";?> >
                                                        <?php echo "$v->nip_nik - $v->nama_pegawai";?>
                                                    </option>
                                            <?php }
                                            }?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan Validator</label>
                                            <input type="text" class="form-control required" value="<?php echo $validator->jabatan ?>" id="jabatan" name="jabatan" maxlength="128">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status">
                                            <?php if ( $data_penilai->status == "Aktif" ) {?>
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
