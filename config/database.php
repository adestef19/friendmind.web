<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "mental_health_test_db";

// Menggunakan gaya Object Oriented agar konsisten dengan file login Anda
$db = new mysqli($hostname, $username, $password, $database_name);

if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}
// JANGAN tambahkan penutup php di akhir file jika file ini murni berisi kode PHP.
// Ini untuk mencegah spasi tidak sengaja yang menyebabkan "Header Already Sent"