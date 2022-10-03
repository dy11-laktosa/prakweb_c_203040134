<?php

require 'function.php';

$id = $_GET['id'];
$b = query("SELECT * FROM buku WHERE id =$id")[0];

if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
            alert('Data Change Success');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
                alert('Data Change Fail');
                document.location.href = 'index.php';
            </script>";
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <h3 class="center">Ubah Data</h3>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?= $b['id']; ?>">
            <div class="input-field">
                <input type="text" name="judul_buku" id="judul_buku" class="validate" required value="<?= $b['judul_buku']; ?>">
                <label for="nama">Judul Buku</label>
            </div>
            <div class="input-field">
                <input type="text" name="pengarang" id="pengarang" class="validate" required value="<?= $b['pengarang']; ?>">
                <label for="harga">Pengarang</label>
            </div>
            <div class="input-field">
                <input type="text" name="tahun_terbit" id="tahun_terbit" class="validate" required value="<?= $b['tahun_terbit']; ?>">
                <label for="stock">Tahun Terbit</label>
            </div>
            <div class="input-field">
                <input type="text" name="stok_buku" id="stok_buku" class="validate" required value="<?= $b['stok_buku']; ?>">
                <label for="stock">Stok Buku</label>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Choose Picture</span>
                    <input type="file" name="gambar" id="Gambar" class="gambar" onchange="previewImage()">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" name="gambar" id="Gambar" onchange="previewImage()">
                </div>
                <img src="img/<?= $b['gambar']; ?>" style="display: block;" width="120px" class="img-preview">
            </div>
            <button type="submit" name="ubah" class="waves-effect waves-light btn tosca lighten-3">Submit Data</button>
            <a href="index.php" class="waves-effect waves-light btn tosca lighten-3"><i class="material-icons left">arrow_back</i>Back</a>


        </form>



    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="javascript/scriptphoto.js"></script>
</body>

</html>