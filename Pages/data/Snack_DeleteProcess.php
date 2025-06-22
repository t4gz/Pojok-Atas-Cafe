<?php
include '../../php/koneksi.php';

if (!isset($_GET['id'])) {
    die("ID snack tidak ditemukan.");
}

$id = $_GET['id'];

$sql = "DELETE FROM cemilan WHERE id_cemilan = ?";
$stmt = mysqli_prepare($konek, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header("Location: ../Admin_Snack.php?p=Snack_EditHapus");
    exit();
} else {
    $error = mysqli_error($konek);
    mysqli_stmt_close($stmt);
    die("Terjadi kesalahan saat menghapus data: " . $error);
}
?>
