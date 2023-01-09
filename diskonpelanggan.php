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
    <title>Diskon Pelanggan</title>    
    <link rel="stylesheet" href="style.css">
    <link href="logobaby.png" rel="icon">
</head>
<body>
    <header>
    <img class="logo" src="logobaby.png" alt="logo" width="100px" height="200px">
    
    <a class="cta" href="#"><button class="button button1"><?php echo $_SESSION['id_pengguna']; ?></button></a>
        <a class="cta" href="logoutpengguna.php"><button class="button button1">Logout</button></a>
    </header>    
      <div style='vertical-align:middle; display:inline; padding: 10px;'><a>Diskon Pelanggan</div>
     
</div>
<?php
// --- koneksi ke database
$conn=mysqli_connect("localhost","root","","uascrm")or die(mysqli_error());
// --- Fungsi Baca Data (Read)
function tampil_data($conn){
    $sql = "SELECT id_pelanggan, nama_pelanggan, no_hp, belanja FROM pelanggan Where belanja >= 500000";
    $query = mysqli_query($conn, $sql);

       
    echo "<table id='customers'>";
    echo "
    <tr>
    <th colspan ='5'>Pelanggan Yang Berhak Mendapatkan Diskon</th>
    <tr>
    <th>ID Pelanggan</th>
    <th>Nama Pelanggan</th>
    <th>Nomor HP Pelanggan</th>
    <th>Total Belanja</th>
    <tr>
        
        </tr>";
    
        while($data = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $data['id_pelanggan']; ?></td>
                    <td><?php echo $data['nama_pelanggan']; ?></td>
                    <td><?php echo $data['no_hp']; ?></td>
                    <td><?php echo $data['belanja']; ?></td>
                    
                </tr>
            <?php
        }


    }
    echo "</table>";


// ===================================================================
// --- Program Utama
if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "create":
            echo '<a href="diskonpelanggan.php"> &laquo; Home</a>';
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