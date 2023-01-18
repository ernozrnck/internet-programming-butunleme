<?php
// -----------------------giriş yapma denetimi
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: login.php");
  }
  require_once('db.php'); // veritabanı bağlantısı
  

// güncelleme butonu 
if(isset($_POST['guncelleUrun'])){
    $name = $_POST['name'];
    $price= $_POST['price'];
    $img = $_GET['duzenle'].$_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($img_tmp, "./assets/images/gallery/uploads/$img");
    // SQL, ekleme sorgusu
    $guncelle = $conn->prepare("UPDATE urunler SET name=:name,price=:price,img=:img WHERE id=:id");
    $kontrol = $guncelle->execute(array(
        'name' => $name,
        'price' => $price,
        'img' => $img,
        'id' => $_GET['duzenle']
    ));

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
					        <a class="nav-link active" href="shop.php">
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
					        <a class="nav-link " href="inbox.php">
		                         <span class="nav-link-text">Gelen Kutusu</span>
					        </a>
					    </li>
						<li class="nav-item">
					        <a class="nav-link  " href="users.php">
		                         <span class="nav-link-text">Kullanıcılar</span>
					        </a>
					    </li>
						<li class="nav-item">
					        <a class="nav-link " href="add_users.php">
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
                                // çıkış butonu
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
<div class="secc">
            <div class="body flex-grow-1 px-3" style="    width: 923px;
    margin-left: 16rem;">
                <h2 style="margin: 20px 5px;">Kullanıcı Düzenle / Sil</h2>
                <hr>

<?php
// tüm ürünleri listeliyoruz
    $veri = $conn
        ->query("SELECT * FROM urunler")
        ->fetchAll();
    ?>
    <?php

    foreach ($veri as $row) {

    ?>
    <div class="user-content" style="display: flex;
    width: 80%;
    max-width: 1200px;
    justify-content: space-between;
    align-items:center;">
        <div class="user-name">
        <h6>Ürün İsmi</h6>
        <!-- tablodan name verisini çekip yazdırıyoruz -->
        <textarea name="isim" id="isim" cols="25" rows="2">  <?php echo $row['name'] ?></textarea>
        </div>
        <div class="user-nick">
        <h6>Ürün Fiyatı</h6>
        <!-- tablodan price verisini çekip yazdırıyoruz -->
        <textarea name="isim" id="isim" cols="25" rows="2">  <?php echo $row['price'] ?></textarea>

        </div>
        <!-- tablodan image verisinin ismini alıp klasörde arayıp ekrana yansıtıyor -->
        <img src="assets/images/gallery/uploads/<?php echo $row['img'] ?>" alt="" width="100px" height="100px">
        <a href="shop.php?duzenle=<?php echo $row['id'] ?>" class="btn btn-info" style="width:90px; text-align: center;
    height: 40px;">Duzenle</a>  

        <a href="shop.php?sil=<?php echo $row['id'] ?>" class="btn btn-danger" style="width: 90px;
    text-align: center;
    height: 40px;">Sil</a>
    </div>
    <hr>
    <?php
    }
    ?>
</div>






<div class="body flex-grow-1 px-3" style="width: 300px;
    /* border-right: 1px solid #0000003b; */
    position: fixed;
    right: 20px;
    top: 85px;
    padding-bottom:5px">

<h2 style="margin: 20px 5px;">Düzenle</h2>


<?php

// ürünü silme butonu
if (isset($_GET['sil'])) {
    $sil = $conn->prepare("DELETE FROM urunler WHERE id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['sil']
    ));

}

// düzenle kısmını açma butonu
if (isset($_GET['duzenle'])) {
    $duzenle = $conn->prepare("SELECT * FROM urunler WHERE id=:id");
    $duzenle->execute(array(
        'id' => $_GET['duzenle']
    ));

    $row = $duzenle->fetch(PDO::FETCH_ASSOC);
    
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="    margin-bottom:5px;">
            <label for="isim">Ürün İsmi</label>
            <input type="text" class="form-control" name="name" id="isim" value="<?php echo $row['name'] ?>">
        </div>
        <div class="form-group" style="    margin-bottom: 5px;">
            <label for="unvan">Ürün Fiyatı</label>
            <input type="text" class="form-control" name="price" id="unvan" value="<?php echo $row['price'] ?>">
        </div>
        <div class="form-group" style="    margin-bottom: 5px;">
            <label for="img">Ürün Resmi</label>
			<img src="assets/images/gallery/uploads/<?php echo $row['img'] ?>" alt="" width="100px" height="100px">

            <input type="file" accept="image/*" class="form-control" name="img" id="img" value="<?php echo $row['img'] ?>">
        </div>
        <button type="submit" name="guncelleUrun" class="btn btn-primary">Guncelle</button>
    </form>
    
    <?php
}
?>


</div>

<?php


if (isset($_GET['sil'])) {
    $sil = $conn->prepare("DELETE FROM urunler WHERE id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['sil']
    ));

}


if (isset($_GET['duzenle'])) {
    $duzenle = $conn->prepare("SELECT * FROM urunler WHERE id=:id");
    $duzenle->execute(array(
        'id' => $_GET['duzenle']
    ));

    $row = $duzenle->fetch(PDO::FETCH_ASSOC);


}
?>


</div>
</div>
</div>




















 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

