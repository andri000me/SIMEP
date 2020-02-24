<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file"></i> Daftar Sasaran Kerja Pegawai
      </h1>
    </section>
    
    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Sasaran Kerja Pegawasi (SKP)</h3>
                </div><!-- /.box-header -->
                
                <div class="col-sm-12 box-body table-responsive ">
                  <table class="table table-bordered table-striped dtable" >
                    <thead> 
                      <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Nama Pengawas</th>
                        <th>NIP</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Tanggal Validasi</th>
                        <th>Tanggal Penilaian</th>
                        <th>Total Nilai Capaian SKP</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        foreach ($skp as $s) {
                      ?>
                      <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $s->tahun_skp?></td>
                        <td><?php echo $s->nama_pegawai?></td>
                        <td><?php echo $s->nip_nik?></td>
                        <td><?php echo $s->status_skp?></td>
                        <td><?php echo $s->tanggal_pengajuan?></td>
                        <td><?php echo $s->tanggal_validasi?></td>
                        <td><?php echo $s->tanggal_penilaian?></td>
                        <td><?php echo round($s->total_nilai_capaian_skp, 2) ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('kabidptk/skp/detailSKP/'.$s->id_header_skp) ?>" title="Detail SKP"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('kabidptk/skp/validasiSKP/'.$s->id_header_skp) ?>" title="Validasi SKP"><i class="fa fa-check-square"></i></a>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('kabidptk/skp/nilaiSKP/'.$s->id_header_skp) ?>" title="Penilaian Realisasi"><i class="fa fa-book"></i></a>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('kabidptk/skp/perhitunganNilaiSKP/'.$s->id_header_skp) ?>" title="Pengukuran dan Capaian Akhir"><i class="fa fa-file"></i></a>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('kabidptk/skp/penilaianPerilakuKerja/'.$s->id_header_skp) ?>" title="Penilaian Perilaku Kerja"><i class="fa fa-newspaper-o"></i>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('kabidptk/skp/penilaianAkhir/'.$s->id_header_skp) ?>" title="Penilaian Akhir"><i class="fa fa-file-o"></i></a>
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('kabidptk/skp/downloadSKP/'.$s->id_header_skp) ?>" title="Download"><i class="fa fa-download"></i></a>
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