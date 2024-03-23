<?php
    error_reporting(0);
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">WEB GALERI FOTO</a></h1>
        <ul>
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="galeri.php">Galeri</a></li>
          <li><a href="profil.php">Profil</a></li>
          <li><a href="data-image.php">Data Foto</a></li>
          <li><a href="Keluar.php">Keluar</a></li>
        </ul>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" value="<?php echo $_GET['search'] ?>" />
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
    <div class="container">
       <h3>Galeri Foto</h3>
       <div class="box">
          <?php
		      if($_GET['search'] != '' || $_GET['kat'] != ''){
			     $where = "AND image_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
			  }
              $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 $where ORDER BY image_id DESC");
			  if(mysqli_num_rows($foto) > 0){
				  while($p = mysqli_fetch_array($foto)){
		  ?>
          <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
          <div class="col-4">
              <img src="foto/<?php echo $p['image'] ?>" height="150px" />
              <p class="nama"><?php echo substr($p['image_name'], 0, 30) ?></p>
              <p class="harga"><?php echo substr($p['admin_name']) ?></p>
              <p class="admin">Nama User : <?php echo $p['admin_name'] ?></p>
              <p class="nama"><?php echo $p['date_created']  ?></p>
          </div>
          </a>
          <?php }}else{ ?>
              <p>Foto tidak ada</p>
          <?php } ?>
       </div>
    </div>
    </div>
    
    <!-- footer -->
     <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


<?php
    error_reporting(0);
    include 'db.php';
  $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
  $a = mysqli_fetch_object($kontak);
  
  $produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '".$_GET['id']."' ");
  $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="index.php">WEB GALERI FOTO</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="galeri-dash.php">Galeri</a></li>
        </ul>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" value="<?php echo $_GET['search'] ?>" />
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>
    
    <!-- product detail -->
    <div class="section">
        <div class="container">
             <h3>Detail Foto</h3>
            <div class="box">
                <div class="col-2">
                   <img src="foto/<?php echo $p->image ?>" width="100%" /> 
                </div>
                <div class="col-2">
                   <h3><?php echo $p->image_name ?><br />Kategori : <?php echo $p->category_name  ?></h3>
                   <h4>Nama User : <?php echo $p->admin_name ?><br />
                   Upload Pada Tanggal : <?php echo $p->date_created  ?></h4>
                   <p>Deskripsi :<br />
                        <?php echo $p->image_description ?>
                   </p>
                   
                </div>
            </div>
           
    <!--like-->
    <div class="col-2">
    <form method="post" action="">
        <input type="hidden" name="gam" value="<?php echo $p->image_id ?>">
        <input type="hidden" name="adname" value="<?php echo $_SESSION['a_global']->admin_name ?>" required>
        <input type="hidden" name="like">
        <?php
        $qt=mysqli_query($conn, "SELECT SUM(suka) AS jm FROM tb_like WHERE image_id= '".$_GET['id']."'");
        if(mysqli_num_rows($qt) > 0){
            ?>
            <button name="suka" class="btn1">Like <?php echo $q['jm'] ?></button><br>
        <?php }else{ ?>
            <p>Tidak ada like</p>
        <?php } ?>
    </form>
    <?php
    if(isset($_POST['suka'])){
        $gam=$_POST['gam'];
        $adname=$_POST['adname'];
        $like=$_POST['like'];
        $cekk=mysqli_query($conn,"SELECT * FROM tb_like WHERE admin_name='".$adname."' AND image_id='".$gam."'");
        if(mysqli_num_rows($cekk) > 0){
            echo $hapus=mysqli_query($conn,"DELETE FROM tb_like WHERE admin_name='".$adname."' AND image_id='".$gam."'");
            if($hapus){
                echo '<script>window.location="detail-image-dashboard.php? id=' .$_GET['id'].'"</script>';
            }else{
                echo 'gagal'.mysqli_error($conn);
            }
        }else{
            $insert=mysqli_query($conn,"INSERT INTO tb_like VALUES(null,'".$gam."','".$adname."','1',CURRENT_TIMESTAMP)");
            if($insert){
                echo '<script>window.location="detail-image-dashboard.php? id=' .$_GET['id'].'"</script>';
                $com;
            }else{
                echo 'gagal'.mysqli_error($conn);
            }
        }
    }
    ?>
    <br>
    <!--comment-->
    <form method="post" action="">
        <input type="hidden" name="image" value="<?php echo $p->image_id ?>">
        <input type="hidden" name="adminid" value="<?php echo $_SESSION['a_global']->admin_id ?>">
        <input type="hidden" name="adminnm" value="<?php echo $_SESSION['a_global']->admin_name ?>">
        <textarea name="komentar" class="input-control" maxlength="80" placeholder="Tulis Komentar..." required></textarea>
        <input type="submit" name="submit" value="kirim" class="btn">
    </form>
    <?php
    if(isset($_POST['submit'])){
        $image=$_POST['image'];
        $adminid=$_POST['adminid'];
        $adminnm=$_POST['adminnm'];
        $komentar=$_POST['komentar'];
        $insert=mysqli_query($conn,"INSERT INTO komentarfoto VALUES(null,'$image','$adminid','$adminnm','$komentar',CURRENT_TIMESTAMP)");
        if($insert){
            echo '<script>alert("f1");</script>';
            //echo '<script>window.location="detail-image-dashboard.php? id=' .$_GET['id'].'"</script>';
            $com; 
        }else{
            echo 'gagal'.mysqli_error($conn);
        }
    }
    ?>
    <br>
    <div class="f">
        <h3>Komentar</h3>
        <div class="f1"></div>
            <?php
            $up=mysqli_query($conn,"SELECT * FROM komentarfoto WHERE image_id='".$_GET['id']."' ORDER BY tanggal_komentar DESC");
            if(mysqli_num_rows($up) > 0){
                while($u-mysqli_fetch_array($up)){
                    ?>
                    <div class="input">
                        <h4><?php echo $u['admin_name'] ?><br></h4>
                        <h5><?php echo $u['isi_komentar'] ?><br></h5>
                        <h6><?php echo $u['tanggal_komentar'] ?></h6>
                    </div>
                </a>
            <?php }}else{ ?>
                <p>Komentar tidak ada</p>
            <?php } ?>
        </div>
    </div>
     </div>
        </div>
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
</body>
</html>