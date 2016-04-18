<!DOCTYPE html>
<html>
<head>
  <?php include 'inc/meta.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'inc/header.php'; ?>
    <?php include 'inc/sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">              
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Pendaftar</h3>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>                    
                      <th>No.</th>
                      <th>Nama Pasien</th>
                      <th>Nama Orangtua/Wali</th>
                      <th>No. HP</th>
                      <th>Klinik</th>
                      <th>Tgl. Tindakan</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>          
                  </thead>
                  
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal detail-->
        <div class="modal fade" id="modet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail data pendaftar</h4>
              </div>
              <div class="modal-body">
                <div id="state_det" class="text-center bg-info"></div>
                <table id="det_tab" class="table table-bordered table-striped">
                  <tr>
                    <th>Nama Pasien</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>Nama Orangtua/Wali</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>No. KTP</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>No. HP</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>Tempat Lahir</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>Tanggal Lahir</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>Agama</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>Berat Badan</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>Jenis Khitan</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>Lokasi Klinik</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>Tgl. Khitan</th>
                    <td class="modetisi"></td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td class="modetisi"></td>
                  </tr>

                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->

        <!-- Modal edit data-->
        <div class="modal fade" id="modit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="add_edit_label">Edit data pendaftar</h4>
              </div>
              <div class="modal-body">
                <div id="state_dit" class="text-center bg-info"></div>
                <form role="form" id="form_edit" method="post" action="">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama Pasien</label>
                          <input type="text" class="form-control edit-isi" name="nama" placeholder="Masukkan nama...">
                        </div>
                        <div class="form-group">
                          <label>Nama Orangtua/Wali</label>
                          <input type="text" class="form-control edit-isi" name="ortuwali" placeholder="Masukkan nama...">
                        </div>
                        <div class="form-group">
                          <label>No. KTP</label>
                          <input type="number" class="form-control edit-isi" name="noktp" placeholder="">
                        </div>
                        <div class="form-group">
                          <label>No. HP</label>
                          <input type="text" class="form-control edit-isi" name="nohp" placeholder="Masukkan No. HP...">
                        </div>
                        <div class="form-group">
                          <label>Tempat Lahir</label>
                          <input type="text" class="form-control edit-isi" name="tptlhr" placeholder="Masukkan tempat lahir...">
                        </div>
                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control edit-isi datepicker" name="tgllhr">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Agama</label>
                          <select name="agama" class="form-control edit-isi">
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                          </select>
                        </div>

                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Alamat</label>
                          <textarea name="alamat" class="form-control edit-isi" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label>Berat Badan</label>
                          <input type="number" class="form-control edit-isi" name="bdn" placeholder="Masukkan berat badan">
                        </div>
                        <div class="form-group">
                          <label>Jenis Khitan</label>
                          <select name="jnskhit" class="form-control edit-isi">
                            <option value="Khitan Bayi">Khitan Bayi</option>
                            <option value="Khitan Anak">Khitan Anak</option>
                            <option value="Khitan Dewasa">Khitan Dewasa</option>
                            <option value="Khitan Autis">Khitan Autis</option>
                            <option value="Khitan Gemuk">Khitan Gemuk</option>
                            <option value="Khitan Home Visit">Khitan Home Visit</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Lokasi Klinik</label>
                          <select name="loklik" class="form-control edit-isi">
                            <option value="Ciledug">Ciledug</option>
                            <option value="Cipondoh">Cipondoh</option>
                            <option value="Perigi Lama">Perigi Lama</option>
                            <option value="Joglo">Joglo</option>
                            <option value="Depok">Depok</option>
                            <option value="Anyer">Anyer</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Tgl. Khitan</label>                              
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control edit-isi datepicker2" name="tglkhit">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                          <select name="status" class="form-control edit-isi">
                            <option value="daftar">Daftar</option>
                            <option value="konsultasi">Konsultasi</option>
                            <option value="selesai">Selesai</option>
                          </select>
                        </div>

                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Batal</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->

        <!-- Modal -->
        <div class="modal fade" id="model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus data pendaftar</h4>
              </div>
              <div class="modal-body">
                Yakin akan menghapus data tersebut?
              </div>
              <div class="modal-footer">
                <form action="" method="post" id="delpas">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <input type="submit" class="btn btn-danger" value="Ya, hapus">
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modelwelcome" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Administrator Panel</h4>
              </div>
              <div class="modal-body text-center">
                <p>Hello, welcome back <?php echo $this->session->username; ?>!</p>
              </div>
            </div>
          </div>
        </div>

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php include 'inc/footer.php'; ?>    
    <script type="text/javascript">
    var id_pendaftar_det = 0;
    var id_pendaftar_dit = 0;

    $(function(){

        var table_num = 0;
        $("#example1").DataTable({
            "responsive": true,
            "ajax": {
              "url": "dashboard/json_data",
              "dataSrc": "pendaftar"
            },
            "bProcessing": true,
            "bServerSide": false,
            "columns": [
                {
                  "data": function(){
                    table_num++;
                    return table_num;
                    }
                },
                {"data": "nama_lengkap"},
                {"data": "ortu_wali"},
                {"data": "no_hp"},
                {"data": "lokasi_klinik"},
                {
                  "mRender": function(data, type, full) {
                    moment.locale();
                    var tgl_khitan = moment.unix(full.tgl_khitan).format("dddd, DD MMMM YYYY");
                    return tgl_khitan;
                    }
                },
                {"data": "status"},
                {
                  "mRender": function(data, type, full){
                    var btn =   '<button type="button" class="btn btn-sm btn-info modal-detail" data-toggle="modal" data-target="#modet" data-id="'+full.id_daftar_khitan+'" title="Detail">';
                    btn +=      '<i class="fa fa-search-plus"></i>';
                    btn +=  '</button>&nbsp;';
                    btn +=  '<button type="button" class="btn btn-sm btn-warning modal-edit" data-toggle="modal" data-target="#modit" data-id="'+full.id_daftar_khitan+'" title="Edit">';
                    btn +=      '<i class="fa fa-pencil"></i>';
                    btn +=  '</button>&nbsp;';
                    btn +=  '<button type="button" class="btn btn-sm btn-danger modal-delete"  data-toggle="modal" data-target="#model" data-id="'+full.id_daftar_khitan+'" title="Remove">';
                    btn +=      '<i class="fa fa-trash"></i>';
                    btn +=  '</button>&nbsp;';

                    return btn;
                    }

                }
            ]
        });

        $('<button type="button" class="btn btn-primary btn-flat btn-sm add-new" data-toggle="modal" data-target="#modit"><i class="fa fa-plus-circle"></i> Add New</buton>')
        .appendTo('#example1_length');
        $('.add-new').css('margin-left', '20px');

        //Date picker
        $('.datepicker').datepicker({
          autoclose: true,
          format: 'dd-mm-yyyy',
          startView: 2,          
          forceParse: false,
          language: 'id'
        });

        $('.datepicker2').datepicker({
          autoclose: true,
          format: 'dd-mm-yyyy',
          language: 'id',
          todayHighlight: true,
          forceParse: false,
          startDate : 'Date'
        });

        $('#example1').on('click', '.modal-detail', function(){
          var id_dk = $(this).data('id');

          if(id_pendaftar_det != id_dk) {
            var json_data = "dashboard/detail_pendaftar/"+id_dk;
            $('#state_det').html('<i class="fa fa-refresh fa-spin"></i> Loading data, please wait...');

            $.get(json_data, function(response){
              moment.locale();
              var tgl_lhr = moment.unix(response.tgl_lahir).format("dddd, DD MMMM YYYY");
              var tgl_tin = moment.unix(response.tgl_khitan).format("dddd, DD MMMM YYYY");
              $('#state_det').html('');
              $('.modetisi').eq(0).html(response.nama_lengkap);
              $('.modetisi').eq(1).html(response.ortu_wali);
              $('.modetisi').eq(2).html(response.no_ktp);
              $('.modetisi').eq(3).html(response.no_hp);
              $('.modetisi').eq(4).html(response.tempat_lahir);
              $('.modetisi').eq(5).html(tgl_lhr);
              $('.modetisi').eq(6).html(response.agama);
              $('.modetisi').eq(7).html(response.berat_badan);
              $('.modetisi').eq(8).html(response.alamat);
              $('.modetisi').eq(9).html(response.jns_khitan);
              $('.modetisi').eq(10).html(response.lokasi_klinik);
              $('.modetisi').eq(11).html(tgl_tin);
              $('.modetisi').eq(12).html(response.status);

              id_pendaftar_det = id_dk;
            }, 'json');          
        }
    });

    $('#example1').on('click', '.modal-edit', function(){
        $('#add_edit_label').html('Edit data pendaftar');
        var id_dk = $(this).data('id');    
        if(id_pendaftar_dit != id_dk) {
            var json_data = "dashboard/detail_pendaftar/"+id_dk;
            $('#state_dit').html('<i class="fa fa-refresh fa-spin"></i> Loading data, please wait...');

            $.get(json_data, function(response){
                moment.locale();
                var tgl_lhr = moment.unix(response.tgl_lahir).format("DD-MM-YYYY");
                var t_tindakan = moment.unix(response.tgl_khitan).format("DD-MM-YYYY");
                $('#state_dit').html('');
                $('.edit-isi').eq(0).val(response.nama_lengkap);
                $('.edit-isi').eq(1).val(response.ortu_wali);
                $('.edit-isi').eq(2).val(response.no_ktp);
                $('.edit-isi').eq(3).val(response.no_hp);
                $('.edit-isi').eq(4).val(response.tempat_lahir);
                $('.edit-isi').eq(5).val(tgl_lhr);
                $('.edit-isi').eq(6).val(response.agama);
                $('.edit-isi').eq(7).val(response.alamat);
                $('.edit-isi').eq(8).val(response.berat_badan);
                $('.edit-isi').eq(9).val(response.jns_khitan);
                $('.edit-isi').eq(10).val(response.lokasi_klinik);
                $('.edit-isi').eq(11).val(t_tindakan);
                $('.edit-isi').eq(12).val(response.status);

                id_pendaftar_dit = id_dk;
                $('#form_edit').attr('action', 'dashboard/edit_pasien/'+id_dk);
            }, 'json');          
        }            
    });

    $('#example1').on('click', '.modal-delete', function(){
        var id = $(this).data('id');
        $('#delpas').attr('action', 'dashboard/delete_pasien/'+id);
    });

    $('.add-new').on('click',function(){
        $('#add_edit_label').html('Tambah data pendaftar');
        $('.edit-isi').eq(0).val('');
        $('.edit-isi').eq(1).val('');
        $('.edit-isi').eq(2).val('');
        $('.edit-isi').eq(3).val('');
        $('.edit-isi').eq(4).val('');
        $('.edit-isi').eq(5).val('');
        $('.edit-isi').eq(6).val('');
        $('.edit-isi').eq(7).val('');
        $('.edit-isi').eq(8).val('');
        $('.edit-isi').eq(9).val('');
        $('.edit-isi').eq(10).val('');
        $('.edit-isi').eq(11).val('');
        $('.edit-isi').eq(12).val('');
        $('#form_edit').attr('action', 'dashboard/edit_pasien/');
    });

    <?php if($this->session->flashdata('msg') == 'success') { ?>
        $('#modelwelcome').modal('show');
    <?php } ?>
});
</script>
</body>
</html>
