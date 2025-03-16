<?php
    include '../../php/koneksi.php';

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];


    if (!is_numeric($harga) || $harga < 0) {
        die("Invalid price value.");
    }

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);

        if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            die("Error uploading file.");
        }

        $sql = "INSERT INTO makanan (nama, harga, deskripsi, foto, aktif) 
                VALUES ('$nama', '$harga', '$deskripsi', '$target_file', 1)";

        if (mysqli_query($konek, $sql)) {
            header("location:../Admin_makanan.php?p=Makanan_Tambah");
        } else {
            die("Database insert error: " . mysqli_error($konek));
        }
    } else {
        die("File upload error.");
    }
?>
