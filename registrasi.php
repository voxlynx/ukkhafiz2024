<?php
	include 'db.php';
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
           <li><a href="index.php">Home</a></li>
           <li><a href="login.php">Galeri</a></li>
           <li><a href="registrasi.php">Registrasi</a></li>
           <li><a href="login.php">Login</a></li>
        </ul>
        </div>
    </header>
    
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Registrasi Akun</h3>
            <div class="box">
               <form action="" method="POST">
                   <input type="text" name="nm" placeholder="Nama User" class="input-control" required>
                   <input type="text" name="us" placeholder="Username" class="input-control" required>
                   <input type="password" name="pass" placeholder="Password" class="input-control" required>
                   <input type="tel" name="tlp" placeholder="Nomor Telpon" class="input-control" required>
                   <input type="email" name="em" placeholder="E-mail" class="input-control" required>
                   <input type="text" name="alm" placeholder="Alamat" class="input-control" required>
                   <input type="submit" name="submit" value="Submit" class="btn">
               </form>
               <?php
                   if(isset($_POST['submit'])){
					   
					   $nm = ucwords($_POST['nm']);
					   $us = $_POST['us'];
					   $p = $_POST['pass'];
					   $tlp = $_POST['tlp'];
					   $em = $_POST['em'];
					   $alm = ucwords($_POST['alm']);
             $sel="SELECT COUNT(admin_email) AS em FROM tb_admin WHERE admin_email='$em'";
             $cek=mysqli_query($conn,$sel);
             $val=mysqli_fetch_assoc($cek);
             if($val['em'] > 0){
              $_SESSION['e1']="Email anda sudah pernah digunakan.";
             }else if($val['em'] <= 0){
               $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
                                  null,
                      '".$nm."',
                      '".$us."',
                      '".$p1."',
                      '".$tlp."',
                      '".$em."',
                      '".$alm."')
                      
                      ");
               $_SESSION['b']="Registrasi Berhasil!";
             }else{
						    echo 'gagal '.mysqli_error($conn);
						}
						
					   }
           
			   ?>
            </div>
            
            </div>
        </div>
        </div>
    </div>
    
    <!-- footer -->
    <center>
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
    <center>
    <?php if(@$_SESSION['b']){ ?>
    <script>
        swal("Registrasi Berhasil!","", "success");
    </script>
    <?php unset($_SESSION['b']);} ?>
    <?php if(@$_SESSION['e1']){ ?>
    <script>
        swal("Registrasi Gagal!", "<?php echo $_SESSION['e1'] ?>", "error");
    </script>
    <?php unset($_SESSION['e1']);} ?>
</body>
</html>