<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Daftar Program Jadwal
        </h1>
    </section>
    
    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Program Jadwal</h3>
                    </div><!-- /.box-header -->
                    
                    <div class="col-sm-12 box-body table-responsive">
                        <table class="table table-bordered table-striped dtable" >
                            <thead> 
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Program</th>
                                    <th>Semester</th>
                                    <th>Jenis Program Jadwal</th>
                                    <th>File Pendukung</th>
                                    <th>Tanggal Unggah</th>
                                    <th>Tanggal Validasi</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $no = 1;
                                  foreach ($program_jadwal as $pj) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $pj->tahun_program?></td>
                                    <td><?php echo $pj->semester?></td>
                                    <td><?php echo $pj->jenis_program_jadwal?></td>
                                    <td><?php echo $pj->program_jadwal?></td>
                                    <td><?php echo $pj->tgl_unggah?></td>
                                    <td><?php echo $pj->tgl_validasi?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('kabidptk/program_jadwal/downloadProgramJadwal/'.$pj->id_program_jadwal) ?>" title="Download"><i class="fa fa-download"></i></a>
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
