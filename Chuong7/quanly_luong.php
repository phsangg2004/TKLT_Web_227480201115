<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý tiền lương</title>
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
            <h2>Bảng lương nhân viên</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Khoa</th>
                    <th>Chức vụ</th>
                    <th>Lương</th>
                </tr>
                <?php
                $stmt = $conn->query("SELECT * FROM nhanvien");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['ho_ten'] . "</td>";
                    echo "<td>" . $row['khoa'] . "</td>";
                    echo "<td>" . $row['chuc_vu'] . "</td>";
                    echo "<td>" . number_format($row['luong']) . " VND</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <div class="footer">
        <p>Trường Đại học Bạc Liêu - Chất lượng - Sáng tạo - Trách nhiệm - Hội nhập</p>
    </div>
</body>
</html>