<?php
// -----------------------giriş yapma denetimi
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: login.php");
  }
// veritabanı bağlantısı
  require_once('db.php');
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
					        <a class="nav-link " href="index.php">
		                         <span class="nav-link-text">Anasayfa</span>
					        </a>
					    </li>
					    <li class="nav-item">
					        <a class="nav-link" href="shop.php">
		                         <span class="nav-link-text">Satış</span>
					        </a>
					    </li>
						<li class="nav-item">
                                <a class="nav-link" href="add-product.php">
                                    <span class="nav-link-text">Ürün Ekle</span>
                                </a>
                            </li>
						<li class="nav-item">
					        <a class="nav-link " href="about.php">
		                         <span class="nav-link-text">Hakkımızda</span>
					        </a>
					    </li>
						<li class="nav-item">
					        <a class="nav-link active" href="inbox.php">
		                         <span class="nav-link-text">Gelen Kutusu</span>
					        </a>
					    </li>
						<li class="nav-item">
					        <a class="nav-link  " href="users.php">
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

								<?php
								// çıkış yapma butonu
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



















<div class="main">

    <div class="body flex-grow-1 px-3" style="width: 1000px; ">
    <h2 style="margin: 20px 5px;">Mailleri Oku</h2>
    <hr>
    <?php
	// tüm mesajları listeleme fonksiyonu
    $veri = $conn
        ->query("SELECT * FROM email")
        ->fetchAll();
    ?>
    <?php

    foreach ($veri as $row) {

    ?>
    <div class="user-content" >
        <div class="user-name">
        <h6>İsim</h6>
		<!-- mesajı gönderenin adını soyadını yazdırma -->
        <textarea name="isim" id="isim" cols="35" rows="2">  <?php echo $row['isim']," ", $row['soyisim'] ?></textarea>
        </div>

		<div class="user-name">
        <h6>Konu</h6>
		<!-- mesajın konusunu yazdırma -->
        <textarea name="konu" id="isim" cols="35" rows="2">  <?php echo $row['konu'] ?></textarea>
        </div>

		<div class="user-name">
        <h6>Mesaj</h6>
		<!-- mesajın içeriğini yazdırma -->
        <textarea name="mesaj" id="isim" cols="35" rows="2">  <?php echo $row['mesaj'] ?></textarea>
        </div>

		<!-- cevap ver butonu, butonun adresine mesajı gönderenin mail adresini yazdık direk ona cevap verdiriyor -->
		<a href="mailto:<?php echo $row['email']?>" class="btn btn-info"  style="margin-left:20px; margin-top:25px;">Cevap Gönder</a>  
    </div>
    <hr>
    <?php
    }
    ?>





</div>






























    
				

 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

