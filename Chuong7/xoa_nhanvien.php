<?php
require_once 'config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM nhanvien WHERE id = :id");
$stmt->execute(['id' => $id]);

header("Location: index.php");
exit();
?>