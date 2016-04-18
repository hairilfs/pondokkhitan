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
        </section>

      <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <!-- Horizontal Form -->
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Report Pasien</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="index.php/report/printReport" method="post">
                            <div class="box-body">
                                <p>Please select date range.</p>
                                <!-- Date range -->                                
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="daterange" class="form-control pull-right" id="reservation">
                                </div><!-- /.input group -->
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-file"></i>&nbsp; Print
                                </button>
                            </div><!-- /.box-footer -->
                        </form>
                    </div><!-- /.box -->
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php include 'inc/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/locale/id.js"></script>
    <script type="text/javascript">    
    $(function(){        
        //Daterangepicker
        $('#reservation').daterangepicker();
    });
    </script>
</body>
</html>
