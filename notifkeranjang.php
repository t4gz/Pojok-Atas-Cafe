<?php
session_start();
require 'function.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $t => $items) {
            foreach ($items as $qty) $total += $qty;
        }
    }
    echo json_encode(['success' => true, 'total' => $total]);
    exit;
}

$type = $_POST['type'] ?? '';
$id = (int)($_POST['id'] ?? 0);

if (!in_array($type, ['makanan','minuman','cemilan']) || $id <= 0) {
  echo json_encode(['success' => false]);
  exit;
}

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (!isset($_SESSION['cart'][$type][$id])) $_SESSION['cart'][$type][$id] = 0;
$_SESSION['cart'][$type][$id]++;

// Hitung total item
$total = 0;
foreach ($_SESSION['cart'] as $t => $items)
  foreach ($items as $qty) $total += $qty;

echo json_encode(['success'=>true, 'total'=>$total]);

?>
