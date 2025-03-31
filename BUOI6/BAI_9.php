<!DOCTYPE html>
<html>
<head>
    <title>Bảng Cửu Chương</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .row {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .table {
            margin: 10px;
            padding: 10px;
            border: 1px solid while;
            width: 120px;
            text-align: center;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Bảng Cửu Chương</h2>

<div class="container">
    <div class="row">
        <?php
        for ($i = 1; $i <= 5; $i++) {
            echo "<div class='table'>";
            
            for ($j = 1; $j <= 10; $j++) {
                echo "$i x $j = " . ($i * $j) . "<br>";
            }
            echo "</div>";
        }
        ?>
    </div>

    <div class="row">
        <?php
        for ($i = 6; $i <= 10; $i++) {
            echo "<div class='table'>";
            
            for ($j = 1; $j <= 10; $j++) {
                echo "$i x $j = " . ($i * $j) . "<br>";
            }
            echo "</div>";
        }
        ?>
    </div>
</div>

</body>
</html>