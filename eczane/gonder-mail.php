<?php
require_once('admin/db.php'); // veritabanı bağlantısı
    $name=$_POST["isim"];
    $surname=$_POST["soyisim"];
    $email=$_POST["email"];
    $subject=$_POST["konu"];
    $message=$_POST["mesaj"];
    
    // ekleme yani gönderme SQL kodu
    $conn->prepare("INSERT INTO `email` (`isim`, `soyisim`, `email`, `konu`, `mesaj`) VALUES (?,?,?,?,?)")->execute([$name, $surname, $email, $subject, $message]);

    echo "<script>alert('Mesaj Başarıyla Gönderildi.')</script>";


?> 