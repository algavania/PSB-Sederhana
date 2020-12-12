<?php

require 'functions.php';
$result = query("SELECT * FROM siswa");

if (isset($_POST['cari'])) {
    $result = cari($_POST['keyword']);
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
    <title>Lihat Siswa</title>
</head>

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
                <li class="nav-item">
                    <a class="nav-link" href="tambah-data.php">Daftar Baru</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">Lihat Siswa</a>
                </li>
            </ul>
        </div>
        <?php if ($isLogged) : ?>
            <a href="admin/logout.php" class="btn btn-outline-danger">Logout</a>
        <?php else : ?>
            <a href="login.php" class="btn btn-outline-info">Login as Admin</a>
        <?php endif; ?>
    </nav>
    <div class="d-flex flex-column align-items-center mt-5">
        <h1>List Calon Siswa</h1>
        <form class="form-inline mt-3" action="" method="post">
            <div class="form-group mx-sm-3 mb-2">
                <input id="keyword" type="text" class="form-control" id="keyword" name="keyword" autofocus autocomplete="off" placeholder="Masukkan pencarian...">
            </div>
            <button type="submit" id="cari" style="display: none;" name="cari" class="btn btn-primary mb-2">Cari</button>
        </form>
        <div id="container" class="mt-3 card p-3 mb-5">
            <table class="mt-3 mx-auto table text-center">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <?php if ($isLogged) : ?>
                            <th scope="col">Aksi</th>
                        <?php endif; ?>
                        <th scope="col">NISN</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Nama Ayah</th>
                        <th scope="col">Nama Ibu</th>

                    </tr>
                </thead>


                <?php $i = 1; ?>
                <?php foreach ($result as $user) : ?>

                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <?php if ($isLogged) : ?>
                            <td>
                                <a href="admin/ubah.php?id=<?php echo $user['id'] ?>">ubah</a> |
                                <a href="admin/hapus.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Hapus?')">hapus</a>
                            </td>
                        <?php endif; ?>
                        <td><?php echo $user['nisn'] ?></td>
                        <td><img src="images/<?php echo $user['gambar'] ?>" alt="Foto" width="100"></td>
                        <td><?php echo $user['nama'] ?></td>
                        <td><?php echo $user['agama'] ?></td>
                        <td><?php echo $user['alamat'] ?></td>
                        <td><?php echo $user['asal_sekolah'] ?></td>
                        <td><?php echo $user['no_hp'] ?></td>
                        <td><?php echo $user['nama_ayah'] ?></td>
                        <td><?php echo $user['nama_ibu'] ?></td>
                    </tr>
                    <?php $i++; ?>

                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>