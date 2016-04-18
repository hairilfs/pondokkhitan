<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->username; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li <?php echo ($page_title=="Dashboard") ? 'class="active"' : '';?>>
              <a href="index.php/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>              
            </li>
            <li <?php echo ($page_title=="Report") ? 'class="active"' : '';?>>
              <a href="index.php/report">
                <i class="fa fa-file"></i> <span>Report</span>
              </a>              
            </li>            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>