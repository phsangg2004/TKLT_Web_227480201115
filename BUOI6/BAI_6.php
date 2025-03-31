<!DOCTYPE html>
<html>
<head>
    <title>Danh sách năm</title>
</head>
<body>
    <form method="post" action="">
        <label for="year">Chọn năm:</label>
        <select name="year" id="year">
            <?php
            $currentYear = date("Y");
            for ($i = 1900; $i <= $currentYear; $i++) {
                echo "<option value='" . $i . "'>" . $i . "</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" name="submit" value="Chọn năm">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $selectedYear = $_POST['year'];
        echo "<h2>Năm đã chọn: " . $selectedYear . "</h2>";
    }
    ?>
</body>
</html>