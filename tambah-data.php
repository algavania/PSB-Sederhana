<?php

require 'functions.php';

$conn = mysqli_connect("localhost", "root", "", "pas");

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'lihat-data.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan');
            document.location.href = 'lihat-data.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Daftar</title>
</head>

<style>
    @media only screen and (max-width: 800px) {
        #form-card {
            width: 80% !important;
        }
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">Daftar Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lihat-data.php">Lihat Siswa</a>
                </li>
            </ul>
        </div>
        <?php if ($isLogged) : ?>
            <a href="admin/logout.php" class="btn btn-outline-danger">Logout</a>
        <?php else : ?>
            <a href="login.php" class="btn btn-outline-info">Login as Admin</a>
        <?php endif; ?>
    </nav>
    <h1 class="text-center mt-5">Formulir Pendaftaran</h1>
    <div class="card mx-auto my-5" style="width: 800px" id="form-card">
        <form action="" method="post" enctype="multipart/form-data" class="p-5">
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" class="form-control" id="nisn" aria-describedby="nisn" name="nisn" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <select class="form-control" name="agama" id="agama">
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Katolik</option>
                    <option>Buddha</option>
                    <option>Hindu</option>
                    <option>Konghucu</option>
                    <option>Kepercayaan</option>
                    <option>Ateis</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" required>
            </div>
            <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <div class="form-group">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
            </div>
            <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
            </div>
            <div class="form-group">
                <label for="gambar">Foto Siswa</label>
                <input type="file" class="custom-file" id="gambar" name="gambar">
            </div>
            <center><button type="submit" class="btn btn-dark" name="submit">Tambah</button></center>
        </form>
    </div>
</body>

</html>