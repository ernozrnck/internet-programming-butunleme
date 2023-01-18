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
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                    role="img">
                                    <title>Menu</title>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                        stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                </svg>
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
                        <a class="app-logo" href="index.php"><img class="logo-icon me-2"
                                src="assets/images/app-logo.svg" alt="logo"><span class="logo-text">PORTAL</span></a>

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
                                <a class="nav-link active" href="add-product.php">
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

    <div class="row">
    <div class="col-12 col-xl-12">
      <div class="card card-body border-0 shadow mb-4">
        <h2 class="h5 mb-4">Urun Ekle</h2>
        <form action="" method="post" enctype="multipart/form-data">
         
          <div class="row">

            <div class="col-md-6 mb-3">
              <div>

                <label for="urun-adi">Urun Adi</label>
                <input class="form-control" name="name" id="urunadi" type="text" placeholder="Urun Adi" required>
              </div>
            </div>
            
          </div>
          <div class="row align-items-center">
            <div class="col-md-6 mb-3">
              <label for="urun-fiyat">Urun Fiyati</label>
              <div class="input-group">
                </span>
                <input class="form-control" name="price" id="urun-fiyat" type="text" placeholder="Ürün Fiyatı" required>
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="detay">Urun Detayi</label>
                <input class="form-control" id="img" name="img"  type="file" placeholder="50" required>
              </div>
            </div>
           
          </div>
          <div class="col-md-12 mb-3">
            <div class="form-group">
              <input class="form-control btn-outline-indigo btn btn-primary" name="ekleUrun" type="submit" placeholder="50" style="width: 400px; color:white;" required>
            </div>
          </div>

        </form>

        <?php
        // ürün ekleme fonksiyonu
        if (isset($_POST['ekleUrun'])) {
          
          $name = $_POST['name'];
          $price = $_POST['price'];
          $img = file_get_contents($_FILES['img']['tmp_name']);
          // resmin adını kayıt ettirmek için kullandık 
          $ekleİmgName=addslashes($_FILES['img']['name']);
          

          // SQL, ekleme sorgusu
          $conn->prepare("INSERT INTO `urunler`(`name`, `price`, `img`) VALUES (?,?,?)")->execute([$name, $price, $ekleİmgName]);
        }

        echo "<script>alert('Ürün Başarı İle kayıt Edildi..')</script>"
        ?>


      </div>

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