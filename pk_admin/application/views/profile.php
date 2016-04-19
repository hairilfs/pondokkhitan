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
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header" style="background-color: #D2D6DE;">
                  <h3 class="widget-user-username">Administrator</h3>
                  <h5 class="widget-user-desc">Profile.</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="assets/dist/img/user1-128x128.jpg" alt="User Avatar">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Username</h5>
                        <span><?php echo $data->username; ?></span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Email</h5>
                        <span><?php echo $data->email; ?></span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3">
                      <div class="description-block">
                        <h5 class="description-header">Last Login</h5>
                        <span><?php echo date('d F Y h:i:s',$data->last_login); ?></span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3">
                      <div class="description-block">
                        <h5 class="description-header">Last Update</h5>
                        <span><?php echo date('d F Y h:i:s',$data->mdate); ?></span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.widget-user -->
            </div>
        </div>
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modat">Change data</button> &nbsp;
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modpass">Change password</button>

        <!-- Modal edit data-->
        <div class="modal fade" id="modat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="add_edit_label">Ubah data</h4>
              </div>
              <div class="modal-body">
                <div id="state_dit" class="text-center bg-info"></div>
                <form role="form" id="form_edit" method="post" action="index.php/profile/update/data/<?php echo $data->id ; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username" value="<?php echo $data->username; ?>" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" value="<?php echo $data->email; ?>" placeholder="Email">
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

        <!-- Modal edit password-->
        <div class="modal fade" id="modpass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="add_edit_label">Ubah Password</h4>
              </div>
              <div class="modal-body">
                <div id="state_dit" class="text-center bg-info"></div>
                <form role="form" id="form_edit" method="post" action="">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Current password</label>
                      <input type="password" class="form-control" name="pass1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label>New password</label>
                      <input type="password" class="form-control" name="pass2" placeholder="New password">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary">Simpan</button>&nbsp; -->
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Batal</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->        
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
