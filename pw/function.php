<?php
function koneksi()
{

    return mysqli_connect("localhost", "root", "", "prakweb_c_203040134_pw");
}

function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload()
{
    $conn = koneksi();
    $nama_file = $_FILES['gambar']['name'];
    $tipe_file = $_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    //ketika tidak ada gambar
    if ($error == 4) {
        return 'nophoto.png';
    }

    //cek ekstensi file 
    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $daftar_gambar)) {
        echo "<script>
     alert('wrong file upload, please try again!');
  </script>";
        return false;
    }

    //cek tipe file
    if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
        echo "<script>
     alert('wrong file upload, please try again!');
  </script>";
        return false;
    }

    //cek ukuran file
    if ($ukuran_file > 10000000) {
        echo "<script>
     alert('File size too big, please upload another file');
  </script>";
        return false;
    }

    //upload file
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, './img/' . $nama_file_baru);

    return $nama_file_baru;
}



function tambah($Buku)
{
    $conn = koneksi();

    $judul_buku = htmlspecialchars($Buku['judul_buku']);
    $pengarang = htmlspecialchars($Buku['pengarang']);
    $tahun_terbit = htmlspecialchars($Buku['tahun_terbit']);
    $stok_buku = htmlspecialchars($Buku['stok_buku']);
    // $pict = htmlspecialchars($Buku['pict']);

    //upload
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO buku
                VALUES
                ('','$judul_buku','$pengarang','$tahun_terbit','$gambar','$stok_buku')";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    $conn = koneksi();
    //menghapus gambar di folder
    $Buku = query("SELECT * FROM buku WHERE id =$id");
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    if ($Buku['gambar'] != 'nophoto.png') {
        unlink('img/' . $Buku['pict']);
    }


    mysqli_query($conn, "DELETE FROM buku WHERE id =$id");

    return mysqli_affected_rows($conn);
}


function ubah($Buku)
{
    $conn = koneksi();

    $id = htmlspecialchars($Buku['id']);
    $judul_buku = htmlspecialchars($Buku['judul_buku']);
    $pengarang = htmlspecialchars($Buku['pengarang']);
    $tahun_terbit = htmlspecialchars($Buku['tahun_terbit']);
    $stok_buku = htmlspecialchars($Buku['stok_buku']);
    $gambar = htmlspecialchars($Buku['gambar']);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "UPDATE buku SET
            judul_buku ='$judul_buku',
            pengarang ='$pengarang',
            tahun_terbit = '$tahun_terbit',
            gambar = '$gambar',
            stok_buku = '$stok_buku'
            WHERE id = '$id'
    ";

    // var_dump($query);
    // die();
    // salah didie teu ditambahan ieu dihandap
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
