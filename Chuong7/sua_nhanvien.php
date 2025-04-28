<?php
require_once 'config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM nhanvien WHERE id = :id");
$stmt->execute(['id' => $id]);
$nhanvien = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ho_ten = $_POST['ho_ten'];
    $khoa = $_POST['khoa'];
    $chuc_vu = $_POST['chuc_vu'];
    $luong = $_POST['luong'];
    $ngay_vao_lam = $_POST['ngay_vao_lam'];

    $stmt = $conn->prepare("UPDATE nhanvien SET ho_ten = :ho_ten, khoa = :khoa, chuc_vu = :chuc_vu, luong = :luong, ngay_vao_lam = :ngay_vao_lam WHERE id = :id");
    $stmt->execute([
        'ho_ten' => $ho_ten,
        'khoa' => $khoa,
        'chuc_vu' => $chuc_vu,
        'luong' => $luong,
        'ngay_vao_lam' => $ngay_vao_lam,
        'id' => $id
    ]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa nhân viên</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="images/logo.png" alt="Bac Lieu University Logo" class="logo">
        </div>
        <div class="sidebar">
            <h3>Menu</h3>
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="#">Đơn vị trực thuộc</a>
                    <ul>
                        <li><a href="#">Khoa KT & CN</a>
                            <ul>
                                <li><a href="index.php?khoa=KT&CN">Xem hồ sơ</a></li>
                                <li><a href="them_nhanvien.php">Thêm hồ sơ</a></li>
                                <li><a href="#">Sửa hồ sơ</a></li>
                                <li><a href="#">Xóa hồ sơ</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Khoa Sư phạm</a>
                            <ul>
                                <li><a href="index.php?khoa=Su pham">Xem hồ sơ</a></li>
                                <li><a href="them_nhanvien.php">Thêm hồ sơ</a></li>
                                <li><a href="#">Sửa hồ sơ</a></li>
                                <li><a href="#">Xóa hồ sơ</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Khoa NN&TS</a></li>
                        <li><a href="#">Khoa Kinh tế và Luật</a></li>
                    </ul>
                </li>
                <li><a href="#">Hồ sơ nhân viên</a>
                    <ul>
                        <li><a href="index.php">Xem hồ sơ</a></li>
                        <li><a href="them_nhanvien.php">Thêm hồ sơ</a></li>
                        <li><a href="#">Sửa hồ sơ</a></li>
                        <li><a href="#">Xóa hồ sơ</a></li>
                    </ul>
                </li>
                <li><a href="quanly_luong.php">Quản lý tiền lương</a>
                    <ul>
                        <li><a href="quanly_luong.php">Bảng lương</a></li>
                        <li><a href="#">Cấp nhật hồ sơ</a></li>
                        <li><a href="#">Tìm kiếm</a></li>
                        <li><a href="#">Tính lương</a></li>
                        <li><a href="#">Tính thưởng</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content">
            <h2>Sửa thông tin nhân viên</h2>
            <form method="POST">
                <label>Họ tên:</label><br>
                <input type="text" name="ho_ten" value="<?php echo $nhanvien['ho_ten']; ?>" required><br>
                <label>Khoa:</label><br>
                <input type="text" name="khoa" value="<?php echo $nhanvien['khoa']; ?>" required><br>
                <label>Chức vụ:</label><br>
                <input type="text" name="chuc_vu" value="<?php echo $nhanvien['chuc_vu']; ?>" required><br>
                <label>Lương:</label><br>
                <input type="number" name="luong" value="<?php echo $nhanvien['luong']; ?>" required><br>
                <label>Ngày vào làm:</label><br>
                <input type="date" name="ngay_vao_lam" value="<?php echo $nhanvien['ngay_vao_lam']; ?>" required><br><br>
                <button type="submit">Cập nhật</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Trường Đại học Bạc Liêu - Chất lượng - Sáng tạo - Trách nhiệm - Hội nhập</p>
    </div>
</body>
</html>