<div class="float-start me-4">
    <a class="btn btn-primary" href="?f=menu&m=insert" role="button">Tambah Data</a>
</div>
<h2>Menu</h2>

<?php 

    if (isset($_POST['opsi'])) {
        $opsi = $_POST['opsi'];

        $where = "WHERE idkategori = $opsi";


    }else {
        $opsi = 0;
        $where = "";
    }

?>


<div class="mt-4 mb-4">
    <?php 
        
        $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");
        
    
    ?>
    <form action="" method="post">
        <select name="opsi" id="" onchange="this.form.submit()">
            <?php foreach ($row as $r): ?>
            <option <?php if($r['idkategori']==$opsi) echo"selected"; ?> value="<?php echo $r['idkategori'] ?>"><?php echo $r['kategori'] ?></option>
            <?php endforeach ?>
        </select>
    </form>
</div>


<?php

    $jumlahdata = $db->rowCOUNT("SELECT idmenu FROM tblmenu $where");
    $banyak = 2;

    $halaman = ($jumlahdata / $banyak);

    if (isset($_GET['p'])){
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }else{
        $mulai = 0;
    }


    $sql = "SELECT * FROM tblmenu $where ORDER BY menu ASC LIMIT $mulai, $banyak";
    $row = $db->getALL($sql);

    $no = 1 + $mulai;

?>



<table class="table table-bordered w-80">
    <thead>
        <tr>
            <th>NO</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($row)) { ?>
        <?php foreach ($row as $r): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['menu'] ?></td>
            <td><?php echo $r['harga'] ?></td>
            <td><img style="width: 200px;" src="../upload/<?php echo $r['gambar'] ?>"></td>
            <td><a href="?f=menu&m=delete&id=<?php echo $r['idmenu'] ?>">Delete</a></td>
            <td><a href="?f=menu&m=update&id=<?php echo $r['idmenu'] ?>">Update</a></td>
        </tr>
        <?php endforeach ?>
        <?php } ?>
    </tbody>
</table>


<?php

    for ($i=1; $i <= $halaman ; $i++) { 
            echo '<a href = "?f=menu&m=select&p= '.$i.'">'.$i.'</a>';
            echo '&nbsp &nbsp &nbsp';
    }

?>
