<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=templates()?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$session->get("full_name") ?> [<?=$session->get("level") ?>]</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=url('beranda')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php if($session->get('level')=='Admin'): ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=url('kecamatan')?>"><i class="fa fa-circle-o"></i> Kecamatan</a></li>
          </ul>
        </li>
        <?php endif ?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=url('hotspot2')?>"><i class="fa fa-circle-o"></i> Tambah Spot Wisata</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-map-marker"></i>
            <span>Peta</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=url('leaflet-standar')?>"><i class="fa fa-circle-o"></i> Peta Kecamatan</a></li>
            <li><a href="<?=url('leaflet-point')?>"><i class="fa fa-circle-o"></i> Peta Spot Wisata</a></li>
            <li><a href="<?=url('leaflet-routing')?>"><i class="fa fa-circle-o"></i> Rute ke Spot Wisata</a></li>
            <!-- <li><a href="<?=url('leaflet-wisata')?>"><i class="fa fa-circle-o"></i> Wisata</a></li> -->
          </ul>
        </li>

        <?php if($session->get('level')=='Admin'): ?>
        <li>
          <a href="<?=url('pengguna')?>">
            <i class="fa fa-user"></i> <span>Data Pengguna</span>
          </a>
        </li>
        <?php endif ?>
        
        <li>
          <a href="<?=url('logout')?>">
            <i class="fa fa-sign-out"></i> <span>Keluar</span>
          </a>
        </li>
   
    </section>
    <!-- /.sidebar -->
  </aside>