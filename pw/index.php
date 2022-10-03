<?php
//koneksi
require 'function.php';

$Buku = query("SELECT * FROM buku");

//isi tabel


?>


<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>



  <div class="container">

    <table>
      <thead>
        <tr>
          <th>Judul Buku</th>
          <th>Pengarang</th>
          <th>Tahun Terbit</th>
          <th>Stok Buku</th>
          <th>Gambar</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <?php foreach ($Buku as $b) : ?>
        <tbody>

          <tr>

            <td><?= $b["judul_buku"]  ?></td>
            <td><?= $b["pengarang"]  ?></td>
            <td><?= $b["tahun_terbit"]  ?></td>
            <td><?= $b["stok_buku"]  ?></td>
            <td> <img src="img/<?= $b["gambar"] ?>" alt="" width="100px" height="100px"></td>
            <td>
              <a href="ubah.php?id=<?= $b['id'] ?>" class="waves-effect waves-light btn green lighten-3 center"><i class="material-icons left">create</i>Change</a>
              <a href="hapus.php?id=<?= $b['id'] ?>" onclick="return confirm('Delete the data?')" class="waves-effect waves-light btn green lighten-3"><i class="material-icons left">delete</i>Delete</a>

            </td>
          </tr>

        </tbody>


      <?php endforeach; ?>
    </table>

    <div class="button center">
      <a href="tambah.php" class="waves-effect waves-light btn tosca lighten-3 "><i class="material-icons left">tambah</i>tambah data</a>
    </div>
  </div>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>