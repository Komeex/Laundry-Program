<?php   
$conn = new mysqli("localhost", "root", "", "pos_laundry");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>