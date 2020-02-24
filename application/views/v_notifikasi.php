<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Notifikasi
        </h1>
    </section>
    
    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="col-sm-12 box-body table-responsive">

                        <table class="table table-bordered table-striped dtable" >
                            <thead> 
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Hal</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  if (isset($notifikasi)) {
                                    foreach ($notifikasi as $n) {
                                ?>
                                    <tr>
                                        <td><?php echo $n->tanggal_dibuat?></td>
                                        <td><?php echo $n->hal?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info" href="<?php echo site_url('notifikasi/read/' . $n->id) ?>" title="Edit"><i class="fa fa-check"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                    }
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
