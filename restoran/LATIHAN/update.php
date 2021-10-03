<?php 
    
    require_once "../function.php";

    $sql = "SELECT * FROM tblkategori WHERE idkategori = $id";
    $result = mysqli_query($koneksi,$sql);

    $row=mysqli_fetch_assoc($result);

    
    // $kategory = 'Jelly bean';
    // $id=18;
    // $sql = "UPDATE tblkategori SET kategory= '$kategory' WHERE idkategory= $id ";

    // $result = mysqli_query($koneksi, $sql);

    // echo $sql;


?>



<form action="" method="post">
    kategory :
    <input type="text" name="kategori" value="<?php echo $row['kategori'] ?>">
    <br>
    <input type="submit" name="simpan" value="simpan">
</form>


<?php 

if (isset($_POST['simpan'])) {

    $kategory = $_POST['kategori'];
    
    $sql = "UPDATE tblkategori SET kategori= '$kategori' WHERE idkategori= $id ";

    $result = mysqli_query($koneksi, $sql);

    header ("location:http://localhost/PHPSMK/restoran/kategori/select.php");

}


?>