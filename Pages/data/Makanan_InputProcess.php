<?php
    include '../../php/koneksi.php';

    $nama = $_POST['nama_makanan'];
    $harga = $_POST['harga_makanan'];
    $stok = $_POST['stok_makanan'];

    if (!is_numeric($harga) || $harga < 0) {
        die("Invalid price value.");
    }

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $foto = basename($_FILES['foto']['name']);
        $target_dir = "../../images/";
        $target_file = $target_dir . $foto;
        $db_path = $foto;

        if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            die("Error uploading file.");
        }

        $sql = "INSERT INTO makanan (nama_makanan, harga_makanan, stok_makanan, gambar) 
                VALUES ('$nama', '$harga', '$stok', '$db_path')";

        if (mysqli_query($konek, $sql)) {
            header("location:../Admin_makanan.php?p=Makanan_Tambah");
        } else {
            die("Database insert error: " . mysqli_error($konek));
        }
    } else {
        die("File upload error.");
    }
?>
