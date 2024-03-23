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
            <li><a href="galeri.php">Galeri</a></li>
            <li><a href="Keluar.php">Logout</a></li>
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
<!--Like-->
    <div class="col-2">
        <form method="post" action="">
        <input type="hidden" name="gam" value="<?php echo $p->image_id ?>">
        <input type="hidden" name="adname" value="<?php echo $_SESSION['a_global']->admin_name ?>" required>
        <input type="hidden" name="like">
            <?php
            $qt = mysqli_query($conn, "SELECT SUM(suka) AS jm FROM tb_like WHERE image_id = '".$_GET['id']."'");
                if(mysqli_num_rows($qt) > 0){
                    while($q=mysqli_fetch_array($qt)){
                        ?>
                        <button name="suka" class="btn1">Like <?php echo $q['jm'] ?></button><br>
                        <?php }}else{ ?>
                            <p>Tidak ada like</p>
                        <?php } ?>
                    </form>
                    <?php
                    if(isset($_POST['suka'])){                
        echo '<script>alert("Login terlebih dahulu!")</script>';
        echo '<script>window.location="login.php"</script>';
    }
 ?><br>
<!--comment-->
<div class="content">
    <form method="post" action="">
        <input type="hidden" name="image" value="<?php echo $p->image_id ?>">
        <input type="hidden" name="adminid" value="<?php echo $_SESSION['a_global']->admin_id ?>">
        <input type="hidden" name="adminnm" value="<?php echo $_SESSION['a_global']->admin_name ?>">
        <input name="komentar" class="input-control" maxlength="80" placeholder="Tulis Komentar..." required>
        <input type="submit" name="submit" value="kirim" class="btn1">
        <br>

    <div class="">
        <h3>Komentar</h3>
        <div class=""></div>
            <?php
            $up=mysqli_query($conn,"SELECT * FROM komentarfoto WHERE image_id='".$_GET['id']."' ORDER BY tanggal_komentar DESC");
            if(mysqli_num_rows($up) > 0){
                while($u=mysqli_fetch_array($up)){
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
<?php
if(isset($_POST['submit'])){
        echo '<script>alert("Login terlebih dahulu!")</script>';
        echo '<script>window.location="login.php"</script>';
   }
    ?>
                        </div>
    
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
</body>
</html>