<?php
error_reporting(0);
include 'db.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login | Web Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body id="bg-login">
     <div class="box-login">
         <h2>Login</h2>
         <form action="" method="POST">
             <input type="text" name="user" placeholder="Username" class="input-control">
             <input type="password" name="pass" placeholder="Password" class="input-control">
             <input type="submit" name="submit" value="Login" class="btn">
         </form>
         <?php
		     if(isset($_POST['submit'])){
				 $user = mysqli_real_escape_string($conn, $_POST['user']);
				 $pass = mysqli_real_escape_string($conn, $_POST['pass']);
				 $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."'AND password = '".$pass."'");
				 if($val === false){
				 	$_SESSION['e1']="Data anda tidak ditemukan.";
				 }else{ 
					 $d = mysqli_fetch_object($cek);
					 $_SESSION['status_login'] = true;
					 $_SESSION['a_global'] = $d;
					 $_SESSION['id'] = $d->admin_id;
					 $_SESSION['s'] = $_SESSION['id'];
					 echo '<script>window.location="dashboard.php"</script>';
				 }
				}
			
	     ?><br />
         <p>Belum punya akun? daftar <a style="color:#00C;" href="registrasi.php">DISINI</a></p>
         <p>atau klik <a style="color:#00C;" href="index.php">Kembali</a></p>
      </div>
<?php if(@$_SESSION['e1']){ ?>
    <script>
        swal("Login Gagal!", "<?php echo $_SESSION['e1'] ?>", "error");
    </script>
    <?php unset($_SESSION['e1']);} ?>
    <?php if(@$_SESSION['e2']){ ?>
    <script>
        swal("Login Gagal!", "<?php echo $_SESSION['e2'] ?>, silahkan coba lagi", "error");
    </script>
    <?php unset($_SESSION['e2']);} ?>      
</body>
</html>