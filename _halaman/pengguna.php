<?php
  $title="Data Pengguna";
  $judul=$title;
  $url='pengguna';
  if ($session->get('level')!='Admin'){
    redirect(url('beranda'));
    }

    if(isset($_POST['simpan'])){
    $data['id_pengguna']=$_POST['id_pengguna'];
	$data['full_name']=$_POST['full_name'];
	$data['nm_pengguna']=$_POST['nm_pengguna'];
	$data['kt_sandi']=$_POST['kt_sandi'];
	$data['level']=$_POST['level'];
	if($_POST['id_pengguna']==""){
		$exec=$db->insert("pengguna",$data);
		$info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses Ditambah </div>';
		
        }
        else{
            $db->where('id_pengguna',$_POST['id_pengguna']);
            $exec=$db->update("pengguna",$data);
            $info='<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses diubah </div>';
        }
    
        if($exec){
            $session->set('info',$info);
        }
        else{
          $session->set("info",'<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4> Proses gagal dilakukan
                  </div>');
        }
        redirect(url($url));
    }

    if(isset($_GET['hapus'])){
        $setTemplate=false;
        $db->where("id_pengguna",$_GET['id']);
        $exec=$db->delete("pengguna");
        $info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses dihapus </div>';
        if($exec){
            $session->set('info',$info);
        }
        else{
          $session->set("info",'<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4> Proses gagal dilakukan
                  </div>');
        }
        redirect(url($url));
    }

    elseif(isset($_GET['tambah']) OR isset($_GET['ubah'])){
        $id_pengguna="";
        $full_name="";
        $nm_pengguna="";
        $kt_sandi="";
        $level="";
        if(isset($_GET['ubah']) AND isset($_GET['id'])){
            $id=$_GET['id'];
            $db->where('id_pengguna',$id);
          $row=$db->ObjectBuilder()->getOne('pengguna');
          if($db->count>0){
              $id_pengguna=$row->id_pengguna;
              $full_name=$row->full_name;
              $nm_pengguna=$row->nm_pengguna;
              $kt_sandi=$row->kt_sandi;
              $level=$row->level;
          }
        }
?>

<?=content_open('Form Data Pengguna')?>
<form method="post" enctype="multipart/form-data">
  <?=input_hidden('id_pengguna',$id_pengguna)?>
  <div class="form-group">
    <label>Full Name</label>
    <?=input_text('full_name',$full_name)?>
  </div>
  <div class="form-group">
    <label>Email</label>
    <?=input_text('nm_pengguna',$nm_pengguna)?>
  </div>
  <div class="form-group">
    <label>Password</label>
    <?=input_text('kt_sandi',$kt_sandi)?>
  </div>
  <div class="form-group">
  <label>Level</label>
    <?=input_text('level',$level)?>
  </div>
  <div class="form-group">
    <button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
    <a href="<?=url($url)?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
  </div>
</form>
<?=content_close()?>
<?php } else { ?>

<?=content_open('Data Pengguna')?>
<a href="<?=url($url.'&tambah')?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
<hr>
<?=$session->pull("info") ?>

<table class="table table-bordered">
  <thead>
    <tr>
    <th>No</th>
	<th>Full Name</th>
	<th>Email</th>
	<th>Level</th>
	<th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no=1;
      $getdata=$db->ObjectBuilder()->get('pengguna');
      foreach ($getdata as $row) {
        ?>
          <tr>
            <td><?=$no?></td>
			<td><?=$row->full_name?></td>
			<td><?=$row->nm_pengguna?></td>
			<td><?=$row->level?></td>
			<td>
				<a href="<?=url($url.'&ubah&id='.$row->id_pengguna)?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
				<a href="<?=url($url.'&hapus&id='.$row->id_pengguna)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
			</td>
          </tr>
        <?php
        $no++;
      }
    ?>
  </tbody>  
</table>

<?=content_close()?>
<?php } ?>
