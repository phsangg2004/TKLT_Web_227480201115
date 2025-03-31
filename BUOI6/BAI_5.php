<!DOCTYPE html>
<html>
<head>
    <title>Tính USCLN và BSCNN</title>
</head>
<body>
    <form method="post" action="">
        <label for="num1">Số thứ nhất:</label>
        <input type="number" name="num1" id="num1" required><br><br>

        <label for="num2">Số thứ hai:</label>
        <input type="number" name="num2" id="num2" required><br><br>

        <input type="submit" name="submit" value="Tính USCLN và BSCNN">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        // Hàm tính USCLN
        function uscln($a, $b) {
            if ($b == 0) {
                return $a;
            }
            return uscln($b, $a % $b);
        }

        // Hàm tính BSCNN
        function bscnn($a, $b) {
            return ($a * $b) / uscln($a, $b);
        }

        $uscln = uscln($num1, $num2);
        $bscnn = bscnn($num1, $num2);

        echo "<h2>Kết quả:</h2>";
        echo "USCLN: " . $uscln . "<br>";
        echo "BSCNN: " . $bscnn;
    }
    ?>
</body>
</html>