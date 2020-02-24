    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version 1.0</b>
        </div>
        <strong>Copyright &copy; 2018 <a href="#">Dinas Pendidikan Kota Malang</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/chart.js/Chart.js'); ?>"></script>

<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 -->

<script type="text/javascript">
    $(function () 
    {
        //Data Table
        $('.dtable').DataTable()

        //Date picker
        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
            startDate: '-50y'
        });
        $('.datepicker').datepicker({
            startDate: '-50y'
        });
        $('#datepicker').datepicker({
            autoclose: true
        })
    });



    $(document).ready(function() // Ketika halaman sudah diload dan siap
    { 

        $("#btn-tambah-baris-form-skp").click(function() // Ketika tombol Tambah Data Form di klik
        { 
            var jumlah_skp = parseInt($("#jumlah-baris-form-skp").val()); // Ambil jumlah baris data form pada textbox jumlah-baris-form
            var nextform_skp = jumlah_skp + 1; // Tambah 1 untuk jumlah baris formnya
          
            // Menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#list-form-skp").append(
                "<tr>" +
                    "<td>" + nextform_skp + "</td>" +
                    "<td>" +
                        "<select class='form-control' name='jenis_unsur[]' id='skp-jenis_unsur-" + nextform_skp + "'>" +
                            "<option value='Unsur Utama'>Unsur Utama</option>" +
                            "<option value='Unsur Pendukung'>Unsur Pendukung</option>" +
                            "<option value='Tugas Tambahan'>Tugas Tambahan</option>" +
                            "<option value='Kreativitas'>Kreativitas</option>" +
                        "</select>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='keg_tgs_jbtn[]' id='skp-keg_tgs_jbtn-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='ak_asli[]' id='skp-ak_asli-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='kuan_output_tgt[]' id='skp-kuan_output_tgt-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='satuan_kuan_output_tgt[]' id='skp-satuan_kuan_output_tgt-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='kual_mutu_tgt[]' id='skp-kual_mutu-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='wkt_tgt[]' id='skp-wkt_tgt-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='satuan_wkt_tgt[]' id='skp-satuan_wkt_tgt-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='biaya_tgt[]' id='skp-biaya_tgt-" + nextform_skp + "'>" +
                    "</td>" +
                "</tr>"
            );

            $("#jumlah-baris-form-skp").val(nextform_skp); // Ubah value textbox jumlah-baris-form dengan variabel nextform
        });
        
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form-skp").click(function()
        {
            nextform_skp = 1;
            $("#list-form-skp").html(
                "<tr>" +
                    "<td>" + nextform_skp + "</td>" +
                    "<td>" +
                        "<select class='form-control' name='jenis_unsur[]' id='skp-jenis_unsur-" + nextform_skp + "'>" +
                           "<option value='Unsur Utama'>Unsur Utama</option>" +
                           "<option value='Unsur Pendukung'>Unsur Pendukung</option>" +
                           "<option value='Tugas Tambahan'>Tugas Tambahan</option>" +
                           "<option value='Kreativitas'>Kreativitas</option>" +
                        "</select>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='keg_tgs_jbtn[]' id='skp-keg_tgs_jbtn-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='ak_asli[]' id='skp-ak_asli-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='kuan_output_tgt[]' id='skp-kuan_output_tgt-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='satuan_kuan_output_tgt[]' id='skp-satuan_kuan_output_tgt-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='kual_mutu_tgt[]' id='skp-kual_mutu-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='wkt_tgt[]' id='skp-wkt_tgt-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='satuan_wkt_tgt[]' id='skp-satuan_wkt_tgt-" + nextform_skp + "'>" +
                    "</td>" +
                    "<td>" +
                        "<input class='form-control' type='text' name='biaya_tgt[]' id='skp-biaya_tgt-" + nextform_skp + "'>" +
                    "</td>" +
                "</tr>"
            ); // Kita kosongkan isi dari div insert-form
            $("#jumlah-baris-form-skp").val(nextform_skp);
        });
    });
</script>
</body>
</html>
