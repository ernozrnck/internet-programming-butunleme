<?php

session_start();
if(isset($_SESSION['username'])){
  header("Location: index.php");
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

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Log in to Portal</h2>
			        <div class="auth-form-container text-start">



						<form class="auth-form login-form" action="" method="POST">         
							<div class="email mb-3">
								<input id="username" name="username" type="text" class="form-control signin-email" placeholder="Username" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<input id="password" name="password" type="text" class="form-control signin-password" placeholder="Password" required="required">
								
							</div><!--//form-group-->
							<div class="text-center">
								<input type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto" value="Giriş Yap">

							</div>
						</form>

						<?php 

						
  							require_once('db.php'); // veritabanı bağlantısı

							// kullanıcı adı ve şifreyi istiyoruz
  							if(isset($_POST['username']) && isset($_POST['password'])){
							$username = $_POST['username'];
							$password = $_POST['password'];
								$etk = $conn
								// tablodan bilgileri çekiyoruz
								->query("SELECT * FROM kullanicilar WHERE username = '".$_POST['username'] ."'")
								->fetch();
								
								// eğer kullanıcı adı ve şifre boş gönderilirse hata veriyor
								if($etk[1] == $_POST[''] && $etk[3] == $_POST['']){
								echo "<p class='text-danger'>Bilgiler Yanlış Girildi</p>";
								}

								// eğer girilen değerler tablodaki değerler ile uyuşuyor ise doğrudur, panele yönlendiriyor
								else if($etk[1] == $_POST['username'] && $etk[3] == $_POST['password']){
								echo "<p class='text-success'>Giris Basarili</p>";
								$_SESSION['username'] = $_POST['username'];
								echo("<script> window.location.href='index.php'; </script>");
								}


								// yanlış girilirse hata veriliyor
								else{
								echo "<p class='text-danger'>Parola Veya Kullanici adi yanlis</p>";
								}
							
							}
							
						?>














					
					</div>
			    </div>
		    

		    </div>
	    </div>
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    
		    </div>
	    </div>
    
    </div>


</body>
</html> 

