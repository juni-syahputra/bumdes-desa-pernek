<?php
session_start();
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>phpBayar</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<style type="text/css">
	body {
	min-height: 200px;
	padding-top: 70px;
	background-image: url(../images%20(3).jpg);
	background-image: url(../images%20(3).jpg);
	}
   @media print {
      .noprint {
         display: none;
      }
   }
	.style1 {
	font-family: Algerian;
	color: #3366FF;
}
    .style2 {font-family: "Lucida Calligraphy"}
    .style3 {
	font-family: "old English Text MT";
	color: #3366FF;
	font-size: 36px;
}body,td,th{font-family: "Monotype Corsiva";
color: #000000;
font-size:22PX
    .style4 {font-size: 10px}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

  <body >
  <?php include "menu.php"; ?>

  <div class="container">
	
	<?php
	if( isset($_REQUEST['hlm'] )){
		
		$hlm = $_REQUEST['hlm'];
		
		switch( $hlm ){
			case 'bayar':
				include "pembayaran.php";
				break;
			case 'laporan':
				include "laporan.php";
				break;
			case 'master':
				include "master.php";
				break;
			case 'user':
				include "profil.php";
				break;
		}
	} else {
	?>
      <!-- Main component for a primary marketing message or call to action -->
      
	 	 <p align="center" class="style3"><marquee>
	 	 Selamat Datang Admin
	 	 </marquee></p>
         <h2 align="center" class="style1"> bumdes desa pernek </h2>
         <p align="center" class="style1 style2">Jln lintas sumbawa-lunyuk </p>
         <p align="center" class="style1 style2"><img src="bmds.jpg" width="700" height="393"></p>
  </div>
	<?php
	}
	?>
   <!-- /container -->


    <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(".force-logout").alert().delay(3000).slideUp('slow', function(){
			window.location = "./logout.php";
		});
      function fnCetak() {
         window.print();
      }
	</script>
  </body>

</html>
<?php
}
?>