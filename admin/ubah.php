<?php

require '../functions.php';

if (!$isLogged) {
    header('Location: ../login.php');
    exit;
}

$id = $_GET['id'];
$result = query("SELECT * FROM siswa WHERE id = '$id'")[0];

if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
            alert('Data berhasil diubah');
            document.location.href = '../lihat-data.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah');
            document.location.href = '../lihat-data.php';
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
    <title>Ubah Data</title>
</head>

<body class="p-5">
    <h1 class="text-center mt-3">Ubah Data</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
        <input type="hidden" name="gambarLama" value="<?php echo $result['gambar'] ?>">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" value="<?php echo $result['nama'] ?>" required>
        </div>
        <div class="form-group">
            <label for="nisn">NISN</label>
            <input type="number" class="form-control" id="nisn" name="nisn" value="<?php echo $result['nisn'] ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $result['alamat'] ?>" required>
        </div>
        <div class="form-group">
            <label for="asal_sekolah">Asal Sekolah</label>
            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?php echo $result['asal_sekolah'] ?>" required>
        </div>
        <div class="form-group">
            <label for="no_hp">Nomor HP</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $result['no_hp'] ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?php echo $result['nama_ayah'] ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo $result['nama_ibu'] ?>" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <br>
            <img src="../images/<?php echo $result['gambar'] ?>" alt="Foto Siswa" width="200" class="mb-3">
            <input type="file" class="custom-file" id="gambar" name="gambar" required>
        </div>
        <button type="submit" class="btn btn-dark" name="submit">Ubah</button>
    </form>
</body>

</html>