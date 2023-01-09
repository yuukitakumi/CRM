<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style.css">
    
    <link href="logobaby.png" rel="icon">
</head>
<body>
    <!-- cek apakah sudah login -->
	<?php 
	session_start();
    if (!isset($_SESSION['id_pengguna'])){
        header("Location: loginpengguna.php");
    }
    ?>
    <header>        
        
        <img class="logo" src="logobaby.png" alt="logo" width="100px" height="200px">
        <a class="cta" href="#"><button class="button button1"><?php echo $_SESSION['id_pengguna']; ?></button></a>
        <a class="cta" href="logoutpengguna.php"><button class="button button1">Logout</button></a>
    </header>
    <p>MENU UTAMA</p>
    <div class="grid-container">
        <div><a class="cta" href="isikuesioner.php"><button class="button button6">Isi Kuesioner</button></a></div>
        <div><a class="cta" href="hasilkuesioner.php"><button class="button button6">Hasil Kuesioner</button></a></div>
        <div><a class="cta" href="diskonpelanggan.php"><button class="button button2">Diskon Pelanggan</button></a></div>
    </div>
</body>
</html>