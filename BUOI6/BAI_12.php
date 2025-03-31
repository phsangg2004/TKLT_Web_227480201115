<!DOCTYPE html>
<html>
<head>
    <title>Bàn cờ vua</title>
    <style>
        table {
            margin: 0 auto;
            border: 1px solid black;
        }
        td {
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>
    <h2 align ="center" >Bàn cờ vua</h2>
    <table>
        <?php
        for ($row = 0; $row < 8; $row++) {
            echo "<tr>";
            for ($col = 0; $col < 8; $col++) {
                $color = (($row + $col) % 2 == 0) ? "black" : "white";
                echo "<td style='background-color: " . $color . ";'></td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>