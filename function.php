<?php
$db = mysqli_connect('localhost','root','','pojok_atas_cafe');

// ambil data dari table makanan
function getAllMakanan($query){
    global $db;
    $query = "SELECT * FROM makanan";
    $result = mysqli_query($db, $query);
    $data = [];
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    return $data;
}

// mengambil data makanan dari id untuk ditampilkan
function getMakananById($id){
    global $db;
    $query = "SELECT * FROM makanan WHERE id_makanan = $id";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_assoc($result);
}

// ambil data dari table minuman
function getAllMinuman($query){
    global $db;
    $query = "SELECT * FROM minuman";
    $result = mysqli_query($db, $query);
    $data = [];
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    return $data;
}

// mengambil data minuman dari id untuk ditampilkan
function getMinumanById($id){
    global $db;
    $query = "SELECT * FROM minuman WHERE id_minuman = $id";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_assoc($result);
}

// ambil data dari table cemilan
function getAllCemilan($query){
    global $db;
    $query = "SELECT * FROM cemilan";
    $result = mysqli_query($db, $query);
    $data = [];
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    return $data;
}

// mengambil data cemilan dari id untuk ditampilkan
function getCemilanById($id){
    global $db;
    $query = "SELECT * FROM cemilan WHERE id_cemilan = $id";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_assoc($result);
}

?>