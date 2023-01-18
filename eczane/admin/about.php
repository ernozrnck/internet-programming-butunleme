<?php
// -----------------------giriş yapma denetimi
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: login.php");
  }
try {
	// --------------------veritabanı bağlantısı
	require_once('db.php');
	} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
} 

//  ------------------------güncelle butonu fonksiyonu
if(isset($_POST["guncelle"])){
  $baslik = $_POST["baslik"];
  $icerik= $_POST["icerik"];
  $sql = "UPDATE `hakkimizda` SET `baslik`='".$baslik."',`icerik`='".$icerik."' WHERE id = 1";
  $conn->exec($sql);


  echo "<script>alert('Güncelleme tamamlandı')</script>";
}

// ------------------------  2. güncelle butonu fonksiyonu
if(isset($_POST["guncellesub"])){
  $baslik = $_POST["baslik"];
  $icerik= $_POST["icerik"];
  $sql = "UPDATE `hakkimzdasub` SET `baslik`='".$baslik."',`icerik`='".$icerik."' WHERE id = 1";
  $conn->exec($sql);


  echo "<script>alert('Güncelleme tamamlandı')</script>";
}
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="assets/css/style.css">

</head> 

<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div>
		            
		            
		            
	            </div>
	        </div>
        </div>
        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="index.php"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"><span class="logo-text">PORTAL</span></a>
	
		        </div>  
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">


					    <li class="nav-item">
					        <a class="nav-link" href="index.php">
		                         <span class="nav-link-text">Anasayfa</span>
					        </a>
					    </li>
					    <li class="nav-item">
					        <a class="nav-link " href="shop.php">
		                         <span class="nav-link-text">Satış</span>
					        </a>
					    </li>
						<li class="nav-item">
                                <a class="nav-link" href="add-product.php">
                                    <span class="nav-link-text">Ürün Ekle</span>
                                </a>
                            </li>
					    <li class="nav-item">
					        <a class="nav-link active" href="about.php">
		                         <span class="nav-link-text">Hakkımızda</span>
					        </a>
					    </li>
						<li class="nav-item">
					        <a class="nav-link " href="inbox.php">
		                         <span class="nav-link-text">Gelen Kutusu</span>
					        </a>
					    </li>
						<li class="nav-item">
					        <a class="nav-link " href="users.php">
		                         <span class="nav-link-text">Kullanıcılar</span>
					        </a>
					    </li>
						<li class="nav-item">
					        <a class="nav-link  " href="add_users.php">
		                         <span class="nav-link-text">Kullanıcı Ekle</span>
					        </a>
					    </li>
						

				    </ul>
			    </nav>
			    <div class="app-sidepanel-footer">
				    <nav class="app-nav app-nav-footer">
					    <ul class="app-menu footer-menu list-unstyled">
						    <li class="nav-item">
								<form action="" method="post">
									<input class="nav-link-text" type="submit" name="cikis" value="Çıkış Yap">
								</form>
									<!-- çıkış butonu  -->
								<?php
										if (isset($_POST['cikis'])) {
											session_destroy();

											echo ("<script> window.location.href='login.php'; </script>");
										}
								?>

						    </li>
					    </ul>
				    </nav>
			    </div>
		       
	        </div>
	    </div>
    </header>


	<?php
		$veri = $conn
		->query("SELECT baslik, icerik FROM hakkimizda")
		->fetchAll();  
	?>

	<div class="main">
		<label for="" class="title-label">HAKKIMIZDA</label>
			<form action="" method="post" class="update-form">
					<label for="">Başlık</label>
					<!-- hakkımızda tablosundan başlık verisini çekiyoruz -->
					<input type="text" name="baslik" placeholder="Baslik" id="slogan" value="<?php print_r($veri[0][0]) ?>">
					<label for="">İçerik</label>
					<!-- hakkımızda tablosundan içerik  verisini çekiyoruz -->
					<input type="text" name="icerik" placeholder="İcerik" id="baslik" value="<?php print_r($veri[0][1]) ?>">
					<input type="submit" value="Güncelle" name="guncelle">
			</form>
	</div>
	<hr><hr>



	<?php
		$sub = $conn
		->query("SELECT baslik, icerik FROM hakkimzdasub")
		->fetchAll();  
	?>
	<div class="main">
	<label for="" class="title-label">NASIL BAŞLADIK</label>

			<form action="" method="post" class="update-form">
					<label for="">Başlık</label>
					<!-- hakkımızdasub tablosundan başlık verisini çekiyoruz -->
					<input type="text" name="baslik" placeholder="Baslik" id="slogan" value="<?php print_r($sub[0][0]) ?>">
					<label for="">İçerik</label>
					<!-- hakkımızda tablosundan icerik verisini çekiyoruz -->
					<input type="text" name="icerik" placeholder="İcerik" id="baslik" value="<?php print_r($sub[0][1]) ?>">
					<input type="submit" value="Güncelle" name="guncellesub">
			</form>
	</div>

 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

