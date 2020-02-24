<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Data Pengawas
        </h1>
    </section>
    
    <section class="content">        
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Pengawas</h3>
                    </div>
                    <!-- /.box-header -->
                    
                    <div class="col-sm-12 box-body table-responsive">
                        <table class="table table-bordered table-striped dtable">
                            <thead> 
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP/NIK</th>
                                    <th>NUPTK</th>
                                    <th>Pangkat/Gol.ruang</th>
                                    <th>Jabatan</th>
                                    <th style="width: 90px">Bidang Pengawasan</th>
                                    <th style="width: 90px">Jenis Kelamin</th>
                                    <th style="width: 150px">Pendidikan Terakhir</th>
                                    <th style="width: 90px">Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Unit Kerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $no = 1;
                                  foreach ($pengawas as $w) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $w->nama_pegawai?></td>
                                    <td><?php echo $w->nip_nik?></td>
                                    <td><?php echo $w->nuptk?></td>
                                    <td><?php echo $w->pangkat_gol_ruang?></td>
                                    <td><?php echo $w->jabatan?></td>
                                    <td><?php echo $w->bidang?></td>
                                    <td><?php echo $w->jenis_kelamin?></td>
                                    <td><?php echo $w->pendidikan?></td>
                                    <td><?php echo $w->tmp_lahir?></td>
                                    <td><?php echo $w->tgl_lahir?></td>
                                    <td><?php echo $w->unit_kerja?></td>
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

