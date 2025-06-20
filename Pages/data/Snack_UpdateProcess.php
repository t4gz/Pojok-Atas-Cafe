<?php
include '../../php/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request method.");
}

if (!isset($_POST['id'])) {
    die("ID cemilan tidak ditemukan.");
}

if (!isset($_POST['nama_cemilan']) || !isset($_POST['harga_cemilan']) || !isset($_POST['stok_cemilan'])) {
    die("Data cemilan tidak lengkap.");
}

$id = $_POST['id'];
$nama = trim($_POST['nama_cemilan']);
$harga = $_POST['harga_cemilan'];
$stok = $_POST['stok_cemilan'];

// Validate inputs
if (empty($nama)) {
    die("Nama cemilan tidak boleh kosong.");
}

if (!is_numeric($harga) || $harga < 0) {
    die("Harga cemilan tidak valid.");
}

if (!is_numeric($stok) || $stok < 0) {
    die("Stok cemilan tidak valid.");
}

$update_foto = false;
$foto_path = '';

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $file_type = mime_content_type($_FILES['foto']['tmp_name']);
    $file_size = $_FILES['foto']['size'];

    if (!in_array($file_type, $allowed_types)) {
        die("Tipe file foto tidak diperbolehkan. Hanya JPG, PNG, GIF yang diizinkan.");
    }

    if ($file_size > 2 * 1024 * 1024) { // 2MB limit
        die("Ukuran file foto terlalu besar. Maksimal 2MB.");
    }

    $foto = basename($_FILES['foto']['name']);
    $target_dir = "../../images/";
    $target_file = $target_dir . uniqid() . "_" . $foto;

    if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        die("Gagal mengunggah file foto.");
    }
    $update_foto = true;
    $foto_path = basename($target_file);
}

if ($update_foto) {
    $sql = "UPDATE cemilan SET nama_cemilan=?, harga_cemilan=?, stok_cemilan=?, gambar=? WHERE id_cemilan=?";
    $stmt = mysqli_prepare($konek, $sql);
    mysqli_stmt_bind_param($stmt, "sdisi", $nama, $harga, $stok, $foto_path, $id);
} else {
    $sql = "UPDATE cemilan SET nama_cemilan=?, harga_cemilan=?, stok_cemilan=? WHERE id_cemilan=?";
    $stmt = mysqli_prepare($konek, $sql);
    mysqli_stmt_bind_param($stmt, "sdii", $nama, $harga, $stok, $id);
}

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header("location:../Admin_Snack.php?p=Snack_EditHapus");
    exit();
} else {
    $error = mysqli_error($konek);
    mysqli_stmt_close($stmt);
    die("Terjadi kesalahan saat memperbarui data: " . $error);
}
?>
