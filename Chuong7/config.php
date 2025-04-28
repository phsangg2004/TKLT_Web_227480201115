<?php
$host = 'localhost';
$dbname = 'baclieu_university';
$username = 'root'; // Thay bằng username MySQL của bạn
$password = '';     // Thay bằng password MySQL của bạn

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    echo "Lỗi kết nối: " . $e->getMessage();
}
?>