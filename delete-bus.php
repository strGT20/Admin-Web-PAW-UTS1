<?php
session_start();
include 'db-connect.php';
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$bus_id = $_GET['id']; // Ambil ID bus dari URL

// Hapus data di tabel bus_rental atau bus_reguler terlebih dahulu
$query_delete_r = "DELETE FROM bus_reguler WHERE id_bus = $bus_id";
$query_delete_rt = "DELETE FROM bus_rental WHERE id_bus = $bus_id";
mysqli_query($connect, $query_delete_r);
mysqli_query($connect, $query_delete_rt);

// Hapus data di tabel Bus
$query = "DELETE FROM Bus WHERE id_bus = $bus_id";
mysqli_query($connect, $query);

// Redirect setelah delete
header("Location: index.php");
exit();
?>
