<?php 
 include '_loader.php'; //meload file loader
 $setTemplate=true;
 //mengecek apakah ada parameter halaman, 
 //jika ada maka halaman akan di include
 if(isset($_GET['halaman'])){
    $halaman=$_GET['halaman'];
  }
  else{
    $halaman='beranda';
  }

  ob_start();
  $file='_halaman/'.$halaman.'.php';
  if(!file_exists($file)){
    include '_halaman/error.php';
  }
  else{
    include $file;
  }
  //menggunakan buffer untuk mengambil kontennya
  $content = ob_get_contents();
  ob_end_clean();

if($setTemplate==true){
  if($session->get("logged")!==true){
    redirect(url('login'));
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<?php include '_layouts/head.php'?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
  include '_layouts/header.php';
  include '_layouts/sidebar.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$judul?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$judul?></li>
      </ol>
    </section>
  <?php
  echo $content;
  ?>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include '_layouts/footer.php';
  include '_layouts/javascript.php';
  ?>
</div>
</body>
</html>
<?php
} else {
  echo $content;
}

if(isset($fileJs)){
  include '_halaman/js/'.$fileJs.'.php';
}
?>