<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma trận số thực</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 10%;
        }
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>Chương trình xử lý ma trận số thực</h2>

    <form method="post">
        <label for="rows">Nhập số hàng (m): </label>
        <input type="number" name="rows" id="rows" required><br><br>
        <label for="cols">Nhập số cột (n): </label>
        <input type="number" name="cols" id="cols" required><br><br>
        <input type="submit" value="Tạo ma trận">
    </form>

    <?php
    // Hàm nhập ma trận
    function inputMatrix($rows, $cols) {
        $matrix = [];
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $matrix[$i][$j] = rand(1, 100) / 10; // Số thực ngẫu nhiên
            }
        }
        return $matrix;
    }

    // Hàm tìm số lớn nhất trong ma trận
    function findMax($matrix) {
        $max = $matrix[0][0];
        foreach ($matrix as $row) {
            foreach ($row as $val) {
                if ($val > $max) {
                    $max = $val;
                }
            }
        }
        return $max;
    }

    // Hàm tìm số nhỏ nhất trong ma trận
    function findMin($matrix) {
        $min = $matrix[0][0];
        foreach ($matrix as $row) {
            foreach ($row as $val) {
                if ($val < $min) {
                    $min = $val;
                }
            }
        }
        return $min;
    }

    // Hàm tính tổng các số trong ma trận
    function sumMatrix($matrix) {
        $sum = 0;
        foreach ($matrix as $row) {
            foreach ($row as $val) {
                $sum += $val;
            }
        }
        return $sum;
    }

    // Hàm in ma trận
    function printMatrix($matrix) {
        echo "<table>";
        foreach ($matrix as $row) {
            echo "<tr>";
            foreach ($row as $val) {
                echo "<td>" . number_format($val, 2) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    // Kiểm tra nếu form đã được gửi
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Nhận số hàng và số cột từ form
        $rows = $_POST['rows'];
        $cols = $_POST['cols'];

        // Tạo ma trận ngẫu nhiên
        $matrix = inputMatrix($rows, $cols);

        // In ma trận
        echo "<h3>Ma trận số thực đã nhập:</h3>";
        printMatrix($matrix);

        // Thực hiện các yêu cầu
        $max = findMax($matrix);
        $min = findMin($matrix);
        $sum = sumMatrix($matrix);

        echo "<h3>Kết quả:</h3>";
        echo "a) Số lớn nhất trong ma trận: " . number_format($max, 2) . "<br>";
        echo "b) Số nhỏ nhất trong ma trận: " . number_format($min, 2) . "<br>";
        echo "c) Tổng các số trong ma trận: " . number_format($sum, 2) . "<br>";
    }
    ?>

</body>
</html>
