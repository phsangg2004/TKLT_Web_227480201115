<?php

echo "Chào bạn, <br>";

// Kiểm tra nếu cookie 'thoiGianTruyCap' đã tồn tại
if (isset($_COOKIE['thoiGianTruyCap'])) {
    // Hiển thị thời gian truy cập gần đây nhất
    echo "Thời gian truy cập gần đây nhất là: " . date('d/m/Y H:i:s', $_COOKIE['thoiGianTruyCap']) . "<br>";
} else {
    // Nếu chưa có cookie, thông báo chưa truy cập lần nào
    echo "Bạn chưa truy cập trang này trước đó.<br>";
}

// Cập nhật thời gian truy cập mới và lưu vào cookie (hạn cookie 10 phút)
setcookie('thoiGianTruyCap', time(), time() + 600);  // Hết hạn sau 600 giây (10 phút)

?>

