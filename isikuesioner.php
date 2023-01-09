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
    <title>Isi Kuesioner</title>    
    <link rel="stylesheet" href="style.css">
    <link href="logobaby.png" rel="icon">
</head>
<body>
    <header>
    <img class="logo" src="logobaby.png" alt="logo" width="100px" height="200px">
    
    <a class="cta" href="#"><button class="button button1"><?php echo $_SESSION['id_pengguna']; ?></button></a>
        <a class="cta" href="logoutpengguna.php"><button class="button button1">Logout</button></a>
    </header>    
      <div style='vertical-align:middle; display:inline; padding: 10px;'><a>Isi Pertanyaan Di Bawah Ini</div>
     
</div>
<?php
// --- koneksi ke database
$conn=mysqli_connect("localhost","root","","uascrm")or die(mysqli_error());
// --- Fngsi tambah data (Create)
    function tambah($conn){
        if (isset($_POST['simpan'])){
            $id_kuesioner=$_POST['id_kuesioner'];
            $nama_pelanggan=$_POST['nama_pelanggan'];
            $no_hp_pelanggan=$_POST['no_hp_pelanggan'];
            $alamat=$_POST['alamat'];
            $jawaban1=$_POST['jawaban1'];
            $jawaban2=$_POST['jawaban2'];
            $jawaban3=$_POST['jawaban3'];
            $jawaban4=$_POST['jawaban4'];
            $jawaban5=$_POST['jawaban5'];
            
            
            if(!empty($nama_pelanggan) || !empty($no_hp_pelanggan)|| !empty($alamat)|| !empty($id_kuesioner)
            || !empty($jawaban1)|| !empty($jawaban2)|| !empty($jawaban3)|| !empty($jawaban4)|| !empty($jawaban5)){
                $sql = "insert into kuesioner ( id_kuesioner, nama_pelanggan, no_hp_pelanggan, alamat)" . 
                  "values ( '$id_kuesioner','$nama_pelanggan','$no_hp_pelanggan','$alamat')";
                $simpan = mysqli_query($conn, $sql);
                if($simpan && isset($_GET['aksi'])){
                    if($_GET['aksi'] == 'create'){
                        header('location: isikuesioner.php');
                       
                    }
                }
            } else {
                $pesan = "Tidak dapat menyimpan, data belum lengkap!";
            }
            if(!empty($jawaban1)){
                $sql1 = "insert into jawaban1 (jawaban1)" . 
                  "values ( '$jawaban1')";
                $simpan1 = mysqli_query($conn, $sql1);
                if($simpan1 && isset($_GET['aksi'])){
                    if($_GET['aksi'] == 'create'){
                        header('location: isikuesioner.php');
                       
                    }
                }
            } else {
                $pesan = "Tidak dapat menyimpan, data belum lengkap!";
            }
            if(!empty($jawaban2)){
                $sql2 = "insert into jawaban2 (jawaban2)" . 
                  "values ( '$jawaban2')";
                $simpan2 = mysqli_query($conn, $sql2);
                if($simpan2 && isset($_GET['aksi'])){
                    if($_GET['aksi'] == 'create'){
                        header('location: isikuesioner.php');
                       
                    }
                }
            } else {
                $pesan = "Tidak dapat menyimpan, data belum lengkap!";
            }
            if(!empty($jawaban3)){
                $sql3 = "insert into jawaban3 (jawaban3)" . 
                  "values ( '$jawaban3')";
                $simpan3 = mysqli_query($conn, $sql3);
                if($simpan3 && isset($_GET['aksi'])){
                    if($_GET['aksi'] == 'create'){
                        header('location: isikuesioner.php');
                       
                    }
                }
            } else {
                $pesan = "Tidak dapat menyimpan, data belum lengkap!";
            }
            if(!empty($jawaban4)){
                $sql4 = "insert into jawaban4 (jawaban4)" . 
                  "values ( '$jawaban4')";
                $simpan4 = mysqli_query($conn, $sql4);
                if($simpan4 && isset($_GET['aksi'])){
                    if($_GET['aksi'] == 'create'){
                        header('location: isikuesioner.php');
                       
                    }
                }
            } else {
                $pesan = "Tidak dapat menyimpan, data belum lengkap!";
            }
            if(!empty($jawaban5)){
                $sql5 = "insert into jawaban5 (jawaban5)" . 
                  "values ( '$jawaban5')";
                $simpan5 = mysqli_query($conn, $sql5);
                if($simpan5 && isset($_GET['aksi'])){
                    if($_GET['aksi'] == 'create'){
                        header('location: isikuesioner.php');
                       
                    }
                }
            } else {
                $pesan = "Tidak dapat menyimpan, data belum lengkap!";
            }
            
        }
        ?> 
        <?php 
        $query4 = mysqli_query($conn, "SELECT max(id_kuesioner) as kodeTerbesar FROM kuesioner");
        $data4 = mysqli_fetch_array($query4);
        $id_kuesioner = $data4['kodeTerbesar'];
        $urutan = (int) substr($id_kuesioner, 3, 3);
        $urutan++;
        $huruf = "KUE";
        $id_kuesioner= $huruf . sprintf("%03s", $urutan);
        ?>
           <form method="POST" action="isikuesioner.php">
    <table>
    <tr><td>ID Jawaban<td>
        <tr><td><input type="text" name="id_kuesioner" required="required" value="<?php echo $id_kuesioner ?>" readonly></td></tr>
  
        <tr><td>Nama Pelanggan</td></tr>
        <tr><td><input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" required autocomplete="off"></td></tr>
        <tr><td>Nomor HP</td></tr>
        <tr><td><input type="text" name="no_hp_pelanggan" placeholder="Nomor HP" required autocomplete="off"></td></tr>
        <tr><td>Alamat</td></tr>
        <tr><td><input type="text" name="alamat" placeholder="Alamat" required autocomplete="off"></td></tr>
        <tr>
        <tr><td>1. Bahan baju apa yang menurut Anda cocok untuk digunakan pada buah hati Anda?</td></tr>
        <tr><td><input type="radio" name="jawaban1" value="Cotton Viscose (CVC)">Cotton Viscose (CVC)
        <tr><td><input type="radio" name="jawaban1" value="Cotton Bamboo">Cotton Bamboo
        <tr><td><input type="radio" name="jawaban1" value="Cotton Modal">Cotton Modal
        <tr><td><input type="radio" name="jawaban1" value="US Pima Cotton">US Pima Cotton
        
        <tr><td>2. Varian warna baru apa yang cocok digunakan untuk baju pada buah hati Anda?</td></tr>
        <tr><td><input type="radio" name="jawaban2" value="Ungu">Ungu
        <tr><td><input type="radio" name="jawaban2" value="Orange">Orange
        <tr><td><input type="radio" name="jawaban2" value="Krem">Krem
        <tr><td><input type="radio" name="jawaban2" value="Hijau Tua">Hijau Tua
        
        <tr><td>3. Motif baru apa yang cocok digunakan untuk baju pada buah hati Anda?  </td></tr>
        <tr><td><input type="radio" name="jawaban3" value="Translam">Translam
        <tr><td><input type="radio" name="jawaban3" value="Polkadot ">Polkadot 
        <tr><td><input type="radio" name="jawaban3" value="Lebah">Lebah
        <tr><td><input type="radio" name="jawaban3" value="Strip">Strip  

        <tr><td>4. Model baru apa yang cocok digunakan untuk baju pada buah hati Anda?</td></tr>
        <tr><td><input type="radio" name="jawaban4" value="Berkancing">Berkancing
        <tr><td><input type="radio" name="jawaban4" value="Sleepsuite">Sleepsuite
        <tr><td><input type="radio" name="jawaban4" value="Zipper">Zipper
        <tr><td><input type="radio" name="jawaban4" value="Hoodiie">Hoodiie 

        <tr><td>5. Berapa harga baju yang sesuai dengan kriteria yang sudah dipilih oleh Anda?</td></tr>
        <tr><td><input type="radio" name="jawaban5" value="Diatas Rp. 50.000">Diatas Rp. 50.000
        <tr><td><input type="radio" name="jawaban5" value="Rp. 50.000">Rp. 50.000
        <tr><td><input type="radio" name="jawaban5" value="Dibawah Rp. 50.000">Dibawah Rp. 50.000 
        <tr> 
    </table>
    <div class="btn-customer">
        <br>
        <button class="button button10" type="submit" name="simpan">Save</button><button class="button button10" type="reset">Reset</button><a href="isikuesioner.php" class="button button10">Refresh</a>
    </div>
                    
            </form>
        <?php
    }
    // --- Tutup Fungsi tambah data
    
    
    // ===================================================================
    // --- Program Utama
    if (isset($_GET['aksi'])){
        switch($_GET['aksi']){
            case "create":
                echo '<a href="isikuesioner.php"> &laquo; Home</a>';
                tambah($conn); 
                break;
            case "read":
     
                //tampil_data_jawaban($conn);
                break;
            case "update":
                //ubah($conn);
    
                //tampil_data_jawaban($conn);
                break;
            case "delete":
                //hapus($conn);
                tambah($conn);
    
                //tampil_data_jawaban($conn);
                break;
            default:
                echo "<h3>Aksi<i>".$_GET['aksi']."</i> tidak ada!</h3>";
                tambah($conn);
    
                //tampil_data_jawaban($conn);
        }
    } else {
        tambah($conn);
    
        //tampil_data_jawaban($conn);
        
    }
    ?>
    </body><br>
    <a class="cta" href="menuutama.php"><button class="button button1">Kembali</button></a>
    </html>