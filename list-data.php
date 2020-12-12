<?php
require 'functions.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM siswa WHERE 
    nama LIKE '%$keyword%' OR
    nisn LIKE '%$keyword%' OR
    agama LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    no_hp LIKE '%$keyword%' OR
    nama_ayah LIKE '%$keyword%' OR
    nama_ibu LIKE '%$keyword%'";
$result = query($query);
?>
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
                    <a href="ubah.php?id=<?php echo $user['id'] ?>">ubah</a> |
                    <a href="hapus.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Hapus?')">hapus</a>
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