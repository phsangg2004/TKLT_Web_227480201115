<?php
// Xử lý đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id_code = $_POST['id_code'];

    // Kiểm tra email có đúng định dạng @blu.edu.vn không
    if (substr($email, -11) != "@blu.edu.vn") {
        echo "<div class='error-message'>Email phải có đuôi @blu.edu.vn!</div>";
    } else {
        // Đọc tệp users.ini
        $users = parse_ini_file("users.ini");

        // Kiểm tra xem email có tồn tại trong tệp users.ini không
        if (isset($users[$email])) {
            // Lấy thông tin mật khẩu và mã số từ tệp
            list($stored_password, $stored_id_code) = explode(",", $users[$email]);

            // Kiểm tra mật khẩu và mã số có khớp không
            if ($password == $stored_password && $id_code == $stored_id_code) {
                // Tạo cookie lưu trữ thông tin đăng nhập
                setcookie("email", $email, time() + 180, "/");  // Thời gian tồn tại cookie là 3 phút (180 giây)
                setcookie("login_time", time(), time() + 180, "/");  // Lưu thời gian đăng nhập

                // Thông báo đăng nhập thành công
                echo "<div class='success-message'>Đăng nhập thành công! Bạn sẽ được chuyển hướng sau 3 giây.</div>";
                header("Refresh: 3;url=welcome.php");  // Chuyển hướng đến trang khác sau 3 giây
            } else {
                echo "<div class='error-message'>Mật khẩu hoặc mã số không đúng!</div>";
            }
        } else {
            echo "<div class='error-message'>Email không tồn tại!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        input[type="email"], input[type="password"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 10px;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        

        .error-message {
            color: red;
            text-align: center;
        }

        .success-message {
            color: green;
            text-align: center;
        }

        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 33px;
            font-size: 16px;
        }

        
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" required>
            <span class="password-toggle" onclick="togglePassword()">👁️</span>

            <label for="id_code">Mã số:</label>
            <input type="text" name="id_code" id="id_code" required>

            <input type="submit" value="Đăng nhập">
            <input type="submit" value="Đăng ký tài khoản">
        </form>

        

        <?php
        // Nếu cookie đã được thiết lập và hết hạn, đăng xuất người dùng
        if (isset($_COOKIE['email']) && isset($_COOKIE['login_time'])) {
            $login_time = $_COOKIE['login_time'];

            // Nếu đã qua 3 phút (180 giây), đăng xuất
            if (time() - $login_time > 180) {
                // Hủy cookie và đăng xuất người dùng
                setcookie("email", "", time() - 3600, "/");
                setcookie("login_time", "", time() - 3600, "/");
                echo "<div class='error-message'>Phiên đăng nhập của bạn đã hết hạn, vui lòng đăng nhập lại!</div>";
            } else {
                echo "Bạn vẫn đang đăng nhập. Thời gian còn lại: " . (180 - (time() - $login_time)) . " giây.";
            }
        } else {
            echo "<div class='error-message'>Vui lòng đăng nhập để tiếp tục.</div>";
        }
        ?>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
        }
    </script>

</body>
</html>
