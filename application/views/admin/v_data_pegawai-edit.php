<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Ubah Data Pegawai
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Masukkan Data Pegawai</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="editPegawai" action="<?php echo site_url('admin/data_pegawai/updatePegawai/' . $data_pegawai->id_pegawai) ?>" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">        
                                    <div class="form-group">
                                        <label for="nama_pegawai">Nama Lengkap</label>
                                        <input type="text" class="form-control required" value="<?php echo $data_pegawai->nama_pegawai ?>" id="nama_pegawai" name="nama_pegawai" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nip_nik">NIP/NIK</label>
                                        <input type="text" class="form-control required" id="nip_nik" value="<?php echo $data_pegawai->nip_nik; ?>" name="nip_nik" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pangkat_gol_ruang">Pangkat/Gol.Ruang</label>
                                        <input type="text" class="form-control required" id="pangkat_gol_ruang" name="pangkat_gol_ruang" maxlength="20" value="<?php echo $data_pegawai->pangkat_gol_ruang; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control required" id="jabatan" name="jabatan" maxlength="20" value="<?php echo $data_pegawai->jabatan; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tmt_jabatan">TMT. Jabatan</label>
                                        <br/><input type="text" class="datepicker required" placeholder="yyyy/mm/dd" data-date-format="yyyy/mm/dd" id="tmt_jabatan" name="tmt_jabatan" value="<?php echo $data_pegawai->tmt_jabatan; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin">
                                            <?php if ( $data_pegawai->jenis_kelamin == "L" ) {?>
                                                <option value="L" selected>Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            <?php } else {?>
                                                <option value="L">Laki-laki</option>
                                                <option value="P" selected>Perempuan</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="otoritas">Otoritas</label>
                                        <select class="form-control" name="otoritas">
                                            <option>--Select--</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Pegawai Bidang PTK">Pegawai Bidang PTK</option>
                                            <option value="Kepala Bidang PTK">Kepala Bidang PTK</option>
                                            <option value="Kepala Dinas Pendidikan">Kepala Dinas Pendidikan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status">
                                            <?php if ( $data_pegawai->status == "Aktif" ) {?>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unit_kerja">Unit Kerja</label>
                                        <input type="text" class="form-control required" id="unit_kerja" name="unit_kerja" maxlength="20" value="<?php echo $data_pegawai->unit_kerja; ?>">
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

<script>
  $(function () {
    $("#searchList").DataTable();
    $('#searchList').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!--
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
-->
