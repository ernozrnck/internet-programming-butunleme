<?php
// -----------------------giriş yapma denetimi

  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: login.php");
  }
  require_once('db.php'); // veritabanı bağlantısı

//   kullanıcı güncelleme butonu fonksiyonu
if(isset($_POST['updateUser'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $mail = $_POST['mail'];

// SQL, güncelle sorgusu
    $guncelle = $conn->prepare("UPDATE kullanicilar SET username=:username,mail=:mail,password=:password WHERE id=:id");
    $kontrol = $guncelle->execute(array(
        'username' => $username,
        'password' => $password,
        'mail' => $mail,
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
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
                                <a class="nav-link active " href="users.php">
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
            <div class="body flex-grow-1 px-3" style="width: 780px; border-right: 1px solid #0000003b;">
                <h2 style="margin: 20px 5px;">Kullanıcı Düzenle / Sil</h2>
                <hr>
                <?php
    $veri = $conn
    // kullanıcılar tablosundan tüm verileri çekiyoruz
        ->query("SELECT * FROM kullanicilar")
        ->fetchAll();
    ?>
                <?php

    foreach ($veri as $row) {

    ?>
                <div class="user-content" style="display: flex;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    justify-content: space-between;
    align-items:center;">
                    <div class="user-name">
                        <h6>Kullanıcı Adı</h6>
                        <!-- kullanıcı adı bilgisini çekiyoruz -->
                        <textarea name="username" id="isim" cols="20"
                            rows="2">  <?php echo $row['username'] ?></textarea>
                    </div>
                    <div class="user-nick">
                        <h6>Şifre</h6>
                        <!-- şifre bilgisini çekiyoruz -->
                        <textarea name="password" id="isim" cols="20"
                            rows="2">  <?php echo $row['password'] ?></textarea>
                    </div>
                    <div class="user-nick">
                        <h6>mail Adresi</h6>
                        <!-- mail bilgisini çekiyoruz -->
                        <textarea name="mail" id="isim" cols="30" rows="2">  <?php echo $row['mail'] ?></textarea>
                    </div>
                    <!-- düzenle kısmını açtırıyoruz -->
                    <a href="users.php?duzenle=<?php echo $row['id'] ?>" class="btn btn-info changesave">
                        Düzenle
                    </a>
                    <!-- silme butonu -->
                    <a href="users.php?sil=<?php echo $row['id'] ?>" class="btn btn-danger" style="width: 90px;
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

// silme fonksiyonu
if (isset($_GET['sil'])) {
    $sil = $conn->prepare("DELETE FROM kullanicilar WHERE id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['sil']
    ));

}

// güncelle fonksiyonu
if (isset($_GET['duzenle'])) {
    $duzenle = $conn->prepare("SELECT * FROM kullanicilar WHERE id=:id");
    $duzenle->execute(array(
        'id' => $_GET['duzenle']
    ));

    $row = $duzenle->fetch(PDO::FETCH_ASSOC);
    
    ?>

                <!--  -->
                <form action="" method="POST" enctype=multipart/form-data>
                    <div class="form-group" style="    margin-bottom:5px;">
                        <label for="isim">Kullanıcı Adı</label>
                        <!-- username verisini çektik -->
                        <input type="text" class="form-control" name="username" id="isim"
                            value="<?php echo $row['username'] ?>">
                    </div>
                    <div class="form-group" style="    margin-bottom: 5px;">
                        <label for="unvan">Şifre</label>
                        <!-- şifre verisini çektik -->
                        <input type="text" class="form-control" name="password" id="unvan"
                            value="<?php echo $row['password'] ?>">
                    </div>
                    <div class="form-group" style="    margin-bottom: 5px;">
                        <label for="unvan">Email</label>
                        <!-- email verisini çektik -->
                        <input type="text" class="form-control" name="mail" id="unvan"
                            value="<?php echo $row['mail'] ?>">
                    </div>
                        <!-- içeriği değiştirip butona bastığımız anda tüm bilgiler güncelleniyor -->
                    <button type="submit" name="updateUser" class="btn btn-primary">Guncelle</button>
                </form>

                <?php
}
?>


            </div>


                <?php


// silme kodu
if (isset($_GET['sil'])) {
    $sil = $conn->prepare("DELETE FROM kullanicilar WHERE id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['sil']
    ));

}

// güncelle kodu
if (isset($_GET['duzenle'])) {
    $duzenle = $conn->prepare("SELECT * FROM kullanicilar WHERE id=:id");
    $duzenle->execute(array(
        'id' => $_GET['duzenle']
    ));

    $row = $duzenle->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['submitEkle'])){
  $username= $_POST['username'];
  $password = $_POST['password'];
  $mail = $_POST['mail'];

        // SQL, Güncelle sorgusu
    $conn->prepare("INSERT INTO `kullanicilar`(`username`,`password`,`mail`) VALUES (?,?,?)")->execute([$username,$password,$mail]);

}
    ?>


                <?php
}
?>
        </div>
    </div>



<!-- SAYFALAMA KODU -->
<?php
$sayfalar = 1;


?>




    <form method='GET' action="">
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center m-4">
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo ($page > 1) ? $page - 1 : 1; ?>">Geri</a>
        </li>
        <?php for ($i = 1; $i <= $sayfalar; $i++) : ?>
          <li class="page-item <?php if ($i === $page) echo "active"; ?>">
            <a class="page-link" href="?page=<?php echo $i; ?>" ><?php echo $i; ?></a>
          </li>
        <?php endfor; ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo ($page < $sayfalar) ? $page + 1 : $sayfalar; ?>">İleri</a>
        </li>
      </ul>
    </nav>
  </form>








    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>