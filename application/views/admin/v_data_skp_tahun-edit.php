<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
                <i class="fa fa-users"></i> Edit Data Tahun SKP
          </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Masukkan Data Tahun SKP</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="updateTahunSKP" action="<?php echo site_url('admin/data_tahun_skp/updateTahunSKP/' . $data_tahun_skp->id_tahun_skp) ?>" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">        
                                    <div class="form-group">
                                        <label for="tahun_skp">Tahun SKP</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_tahun_skp->tahun_skp; ?>" id="tahun_skp" name="tahun_skp" maxlength="4">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status">
                                           <?php if ( $data_tahun_skp->status == "Aktif" ) {?>
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="surat_keterangan">SK</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_tahun_skp->surat_keterangan; ?>" id="surat_keterangan" name="surat_keterangan">
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

