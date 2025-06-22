<?php
include '../../php/koneksi.php';

if (!isset($_GET['id'])) {
    die("ID makanan tidak ditemukan.");
}

$id = $_GET['id'];

$sql_foto = "SELECT gambar FROM makanan WHERE id_makanan = $id";
$result = mysqli_query($konek, $sql_foto);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $foto_path = $row['gambar'];
    if (file_exists($foto_path)) {
        unlink($foto_path);
    }
}

$sql = "DELETE FROM makanan WHERE id_makanan = $id";

if (mysqli_query($konek, $sql)) {
    header("location:../Admin_makanan.php?p=Makanan_EditHapus");

    exit();
} else {
    die("Database delete error: " . mysqli_error($konek));
}
?>
