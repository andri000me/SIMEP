<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Daftar Program dan Jadwal Kerja
        </h1>
    </section>
    
    <section class="content">        
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Program & Jadwal</h3>
                    </div><!-- /.box-header -->
                    
                    <div class="col-sm-12 box-body table-responsive">
                        <table class="table table-bordered table-striped dtable" >
                            <thead> 
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Semester</th>
                                    <th>Jenis Program</th>
                                    <th>Program dan Jadwal</th>
                                    <th>Tanggal Unggah</th>
                                    <th>Tanggal Validasi</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $no = 1;
                                  foreach ($program_jadwal as $p) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $p->tahun_program?></td>
                                    <td><?php echo $p->semester?></td>
                                    <td><?php echo $p->jenis_program_jadwal?></td>
                                    <td><?php echo $p->program_jadwal?></td>
                                    <td><?php echo $p->tgl_unggah?></td>
                                    <td><?php echo $p->tgl_validasi?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('kasiptk/program_jadwal/editProgramJadwal/' . $p->id_program_jadwal) ?>" title="Edit"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }                    
                                ?>
                            </tbody>
                        </table>                  
                    </div>
                    <!-- /.box-body -->                    
                    
                    <div class="box-footer clearfix">
                        <?php  ?>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>