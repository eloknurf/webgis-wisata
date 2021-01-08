<?php
    $setTemplate=false;
    $errfull_name="";
    $errnm_pengguna="";
    $errkt_sandi="";
    if(isset($_POST['register'])){
        $data['full_name']=$_POST['full_name'];
        $data['nm_pengguna']=$_POST['nm_pengguna'];
        $data['kt_sandi']=$_POST['kt_sandi'];
        if(empty($data['full_name'])){
            $errfull_name="<font color='red'>Full Name cannot be empty.</font><br>";
        }
        if(empty($data['nm_pengguna'])){
            $errnm_pengguna="<font color='red'>Username cannot be empty.</font><br>";
        }
        if(empty($data['kt_sandi'])){
            $errkt_sandi="<font color='red'>Password cannot empty.</font><br>";
        }
        if( !empty($data['full_name']) and !empty($data['nm_pengguna']) and !empty($data['kt_sandi']) ){
            $db->insert("pengguna",$data);
            $session->set("info",'<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Success!</h4> Login to WebGIS Wisata
                        </div>');
            redirect(url("login"));       
        }   
    }

    $id_pengguna="";
    $full_name="";
    $nm_pengguna="";
    $kt_sandi="";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Register</title>
	<?php include '_layouts/head.php'?>
	<link rel="stylesheet" href="<?=templates()?>plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Register</b>WebgisWisata</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form method="post">
    <?=input_hidden('id_pengguna',$id_pengguna)?>
      <div class="form-group has-feedback">
        <label>Full Name</label>
        <?=input_text('full_name',$full_name)?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php echo $errfull_name; ?>
      </div>
      <div class="form-group has-feedback">
        <label>Email</label> <!-- /username -->
        <?=input_text('nm_pengguna',$nm_pengguna)?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php echo $errnm_pengguna; ?>
      </div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <input type="password" class="form-control" name="kt_sandi">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo $errkt_sandi; ?>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <a href="<?=url('login')?>" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
</body>
</html>