<?php

$conn = mysqli_connect("localhost", "root", "", "pas");
$isLogged = false;

session_start();

if (isset($_SESSION['login'])) {
    $isLogged = true;
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    $nisn = htmlspecialchars($data['nisn']);
    $nama = htmlspecialchars($data['nama']);
    $agama = htmlspecialchars($data['agama']);
    $alamat = htmlspecialchars($data['alamat']);
    $asal_sekolah = htmlspecialchars($data['asal_sekolah']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $nama_ayah = htmlspecialchars($data['nama_ayah']);
    $nama_ibu = htmlspecialchars($data['nama_ibu']);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO siswa VALUES ('', '$nisn', '$gambar', '$nama', '$agama', '$alamat', '$asal_sekolah', '$no_hp', '$nama_ayah', '$nama_ibu')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Anda harus memilih gambar!')</script>";
        return false;
    }

    $extensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $namaFile);
    $fileExtension = strtolower(end($fileExtension));
    if (!in_array($fileExtension, $extensions)) {
        echo "<script>alert('Anda harus mengupload file gambar!')</script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>alert('Ukuran gambar terlalu besar!')</script>";
        return false;
    }

    $newNameFile = uniqid();
    $newNameFile .= '.'.$fileExtension;

    move_uploaded_file($tmpName, 'images/'.$newNameFile);
    return $newNameFile;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    
    $id = $data['id'];
    $nisn = htmlspecialchars($data['nisn']);
    $nama = htmlspecialchars($data['nama']);
    $agama = htmlspecialchars($data['agama']);
    $alamat = htmlspecialchars($data['alamat']);
    $asal_sekolah = htmlspecialchars($data['asal_sekolah']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $nama_ayah = htmlspecialchars($data['nama_ayah']);
    $nama_ibu = htmlspecialchars($data['nama_ibu']);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE siswa SET nisn='$nisn', gambar='$gambar', nama='$nama', agama='$agama', alamat='$alamat', asal_sekolah='$asal_sekolah', no_hp='$no_hp', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu' WHERE id='$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM siswa 
    WHERE 
    nama LIKE '%$keyword%' OR
    nisn LIKE '%$keyword%' OR
    agama LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    no_hp LIKE '%$keyword%' OR
    nama_ayah LIKE '%$keyword%' OR
    nama_ibu LIKE '%$keyword%'";
    return query($query);
}

?>