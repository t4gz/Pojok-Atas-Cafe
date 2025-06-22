<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../php/Login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if (!isset($_SESSION['pending_order'])) {
        $_SESSION['admin_notification'] = 'Tidak ada pesanan pending untuk diproses.';
        header('Location: Admin_Dashboard.php');
        exit;
    }

    if ($action === 'approve') {
        // Pindahkan pesanan dari pending ke approved
        $_SESSION['approved_order'] = $_SESSION['pending_order'];
        unset($_SESSION['pending_order']);
        $_SESSION['admin_notification'] = 'Pesanan telah disetujui.';
    } elseif ($action === 'reject') {
        // Hapus pesanan pending
        unset($_SESSION['pending_order']);
        $_SESSION['admin_notification'] = 'Pesanan telah ditolak.';
    } else {
        $_SESSION['admin_notification'] = 'Aksi tidak dikenal.';
    }

    header('Location: Admin_Dashboard.php');
    exit;
} else {
    header('Location: Admin_Dashboard.php');
    exit;
}
?>
