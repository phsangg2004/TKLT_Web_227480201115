<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trường Đại học Bạc Liêu - Quản lý Nhân sự</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-top">
            <img src="images/logo.jpg" alt="Bac Lieu University Logo" class="logo">
            <h1>TRƯỜNG ĐẠI HỌC BẠC LIÊU - QUẢN LÝ NHÂN SỰ</h1>
        </div>
    </div>

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Menu</h3>
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li>
                    <a href="#">Đơn vị trực thuộc</a>
                    <ul>
                        <li><a href="#">Khoa KT & CN</a></li>
                        <li><a href="#">Khoa Sư phạm</a></li>
                        <li><a href="#">Khoa NN & TS</a></li>
                        <li><a href="#">Khoa Kinh tế và Luật</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Hồ sơ nhân viên</a>
                    <ul>
                        <li><a href="index.php?page=danh_sach">Danh sách</a></li>
                        <li><a href="index.php?page=them_nhanvien">Thêm hồ sơ</a></li>
                    </ul>
                </li>
                <li>
                    <a href="quanly_luong.php">Quản lý tiền lương</a>
                    <ul>
                        <li><a href="quanly_luong.php">Bảng lương</a></li>
                        <li><a href="#">Tính lương</a></li>
                        <li><a href="#">Tính thưởng</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : '';

            if ($page == 'danh_sach') {
                echo "<h2>Danh sách nhân viên</h2>";

                echo "<p><a href='index.php?page=them_nhanvien'>+ Thêm nhân viên mới</a></p>";

                echo "<table border='1' cellpadding='10' cellspacing='0'>";
                echo "<tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Khoa</th>
                        <th>Chức vụ</th>
                        <th>Lương</th>
                        <th>Ngày vào làm</th>
                        <th>Hành động</th>
                      </tr>";

                $stmt = $conn->prepare("SELECT * FROM nhanvien ORDER BY id DESC");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['ho_ten']}</td>";
                    echo "<td>{$row['khoa']}</td>";
                    echo "<td>{$row['chuc_vu']}</td>";
                    echo "<td>" . number_format($row['luong']) . " VND</td>";
                    echo "<td>{$row['ngay_vao_lam']}</td>";
                    echo "<td>
                            <a href='sua_nhanvien.php?id={$row['id']}'>Sửa</a> |
                            <a href='xoa_nhanvien.php?id={$row['id']}' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\")'>Xóa</a>
                          </td>";
                    echo "</tr>";
                }
                echo "</table>";

            } elseif ($page == 'them_nhanvien') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Xử lý lưu dữ liệu
                    $ho_ten = $_POST['ho_ten'];
                    $khoa = $_POST['khoa'];
                    $chuc_vu = $_POST['chuc_vu'];
                    $luong = $_POST['luong'];
                    $ngay_vao_lam = $_POST['ngay_vao_lam'];

                    $stmt = $conn->prepare("INSERT INTO nhanvien (ho_ten, khoa, chuc_vu, luong, ngay_vao_lam) 
                                            VALUES (:ho_ten, :khoa, :chuc_vu, :luong, :ngay_vao_lam)");
                    $stmt->execute([
                        'ho_ten' => $ho_ten,
                        'khoa' => $khoa,
                        'chuc_vu' => $chuc_vu,
                        'luong' => $luong,
                        'ngay_vao_lam' => $ngay_vao_lam
                    ]);

                    // Sau khi thêm xong thì chuyển về danh sách
                    header("Location: index.php?page=danh_sach");
                    exit();
                }

                echo "<h2>Thêm nhân viên mới</h2>";
                echo "<form method='POST'>
                        <label>Họ tên:</label><br>
                        <input type='text' name='ho_ten' required><br><br>

                        <label>Khoa:</label><br>
                        <input type='text' name='khoa' required><br><br>

                        <label>Chức vụ:</label><br>
                        <input type='text' name='chuc_vu' required><br><br>

                        <label>Lương:</label><br>
                        <input type='number' name='luong' required><br><br>

                        <label>Ngày vào làm:</label><br>
                        <input type='date' name='ngay_vao_lam' required><br><br>

                        <button type='submit'>Thêm nhân viên</button>
                    </form>";
            } else {
                // Trang chủ
                echo "<h2>Trang chủ</h2>";
                echo "<p>Trường ĐHBL (ĐHBL) là trường đại học công lập, đa ngành, đa hệ, được thành lập theo Quyết định số 1558/QĐ-TTg ngày 24/11/2006 của Thủ tướng Chính phủ. Việc thành lập trường phù hợp với nguyện vọng của nhân dân tỉnh Bạc Liêu, nhằm đào tạo nguồn nhân lực chất lượng cao cho khu vực Đồng bằng sông Cửu Long.</p>";
                echo "<img src='images/anh1.jpg' alt='Ảnh Trường Đại học Bạc Liêu' style='width:100%; max-width:800px; display:block; margin:auto; margin-top:20px;'>";
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>TRƯỜNG ĐẠI HỌC BẠC LIÊU<br>Chất lượng - Sáng tạo - Trách nhiệm - Hội nhập<br>Điện thoại: 02913822653<br>Email: mail@blu.edu.vn<br>Địa chỉ: Số 178 đường Võ Thị Sáu, P. 8, TP. Bạc Liêu, Tỉnh Bạc Liêu</p>
    </div>
</body>
</html>
