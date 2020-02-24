<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Data Tahun SKP
        </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo site_url('admin/data_tahun_skp/addNewTahunSKPPage');?>"><i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Tahun SKP</h3>
                    </div><!-- /.box-header -->
                    
                    <div class="col-sm-12 box-body table-responsive">
                        <table class="table table-bordered table-striped dtable">
                            <thead> 
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Status</th>
                                    <th>SK</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $no = 1;
                                  foreach ($skp_tahun as $st) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $st->tahun_skp?></td>
                                    <td><?php echo $st->status?></td>
                                    <td><?php echo $st->surat_keterangan?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/data_tahun_skp/editTahunSKP/'.$st->id_tahun_skp) ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <!--<a class="btn btn-sm btn-danger deleteUser" href="#"  data-userid="<?php echo $u->id_user; ?>" title="Delete"><i class="fa fa-trash"></i></a>-->
                                    </td>
                                </tr>
                                <?php
                                    }                    
                                ?>
                            </tbody>
                        </table>                  
                    </div><!-- /.box-body -->
                    
                    <div class="box-footer clearfix">
                        <?php  ?>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

