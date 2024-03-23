<?php

   include 'db.php';
   session_start();
   if(isset($_GET['idp'])){
	   $foto = mysqli_query($conn, "SELECT image FROM tb_image WHERE image_id = '".$_GET['idp']."' ");
	   $p = mysqli_fetch_object($foto);
	   
	   unlink('./foto/'.$p->image);
	   
	  $delete = mysqli_query($conn, "DELETE FROM tb_image WHERE image_id = '".$_GET['idp']."' ");
	  $_SESSION['h']="Yakin ingin menghapus foto ini?";

	  echo '<script>window.location="data-image.php"</script>';
   }

?>