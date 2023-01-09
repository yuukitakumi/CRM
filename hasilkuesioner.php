<?php
// Include config file
require_once "koneksi.php";

    session_start();
    if (!isset($_SESSION['id_pengguna'])){
        header("Location: loginpengguna.php");
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penilaian</title>    
    <link rel="stylesheet" href="style.css">
    <link href="logobaby.png" rel="icon">
</head>
<body>
    <header>
    <img class="logo" src="logobaby.png" alt="logo" width="100px" height="200px">
    
    <a class="cta" href="#"><button class="button button1"><?php echo $_SESSION['id_pengguna']; ?></button></a>
        <a class="cta" href="logoutpengguna.php"><button class="button button1">Logout</button></a>
    </header>    
      <div style='vertical-align:middle; display:inline; padding: 10px;'><a>Hasil Penilaian</div>
     
</div>
<?php
// --- koneksi ke database
$conn=mysqli_connect("localhost","root","","uascrm")or die(mysqli_error());
// --- Fungsi Baca Data (Read)
function tampil_data($conn){
    $sql = "SELECT jawaban1, Count(jawaban1) AS jumlah1 FROM jawaban1 Group by jawaban1 order by jumlah1 desc LIMIT 1";
    $query = mysqli_query($conn, $sql);

    $sql2 = "SELECT jawaban2, Count(jawaban2) AS jumlah2 FROM jawaban2 Group by jawaban2 order by jumlah2 desc LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);

    $sql3 = "SELECT jawaban3, Count(jawaban3) AS jumlah3 FROM jawaban3 Group by jawaban3 order by jumlah3 desc LIMIT 1";
    $query3 = mysqli_query($conn, $sql3);

    $sql4 = "SELECT jawaban4, Count(jawaban4) AS jumlah4 FROM jawaban4 Group by jawaban4 order by jumlah4 desc LIMIT 1";
    $query4 = mysqli_query($conn, $sql4);

    $sql5 = "SELECT jawaban5, Count(jawaban5) AS jumlah5 FROM jawaban5 Group by jawaban5 order by jumlah5 desc LIMIT 1";
    $query5 = mysqli_query($conn, $sql5);
       
    echo "<table id='customers'>";
    echo "
    <tr>
    <th colspan ='5'>Didapatkan Rekomendasi Pengembangan Produk sebagai Berikut</th>
    <tr>
        
        </tr>";
    
        $data = mysqli_fetch_array($query)
        ?>
                <td><?php echo $data['jawaban1']; ?></td>
        <?php
        $data2 = mysqli_fetch_array($query2)
        ?>
                <td><?php echo $data2['jawaban2']; ?></td>
        <?php
        $data3 = mysqli_fetch_array($query3)
        ?>
                <td><?php echo $data3['jawaban3']; ?></td>
        <?php
        $data4 = mysqli_fetch_array($query4)
        ?>
                <td><?php echo $data4['jawaban4']; ?></td>
        <?php
        $data5 = mysqli_fetch_array($query5)
        ?>
                <td><?php echo $data5['jawaban5']; ?></td>
        <?php

    }
    echo "</table>";


// ===================================================================
// --- Program Utama
if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "create":
            echo '<a href="hasilkuesioner.php"> &laquo; Home</a>';
            //tambah($conn); 
            break;
        case "read":
            tampil_data($conn);
            break;
        case "update":
            //ubah($conn);
            tampil_data($conn);
            break;
        case "delete":
            //hapus($conn);
            //tambah($conn);
            tampil_data($conn); 
            break;
        default:
            echo "<h3>Aksi<i>".$_GET['aksi']."</i> tidak ada!</h3>";
            //tambah($conn);
            tampil_data($conn);
    }
} else {
    //tambah($conn);
    tampil_data($conn);
    
}
?>
</body>
<br>
<a class="cta" href="menuutama.php"><button class="button button1">Kembali</button></a>
</html>