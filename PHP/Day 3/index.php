<?php

// 1- Write a PHP function to calculate the factorial of a number (a non-negative integer). The function accepts the number as an argument.
function factorialNum($num)
{
    if ($num <= 0) {
        return "Not Excepted";
    } else if ($num == 0 || $num == 1) {
        return 1;
    } else {
        $result = 1;
        for ($i = 2; $i <= $num; $i++) {
            $result *= $i;
        }
        return $result;
    }
}

echo "Factorial number " . factorialNum(10);
?>



<br>
<br>
<br>



<!-- // 2- Using loop: Write a PHP script using nested for loop that creates a chess board as shown below. Use table width="270px" and take 30px as cell height and width. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 270px;
        }

        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>
<body>
    <table>
        <?php
        for ($row = 1; $row <= 8; $row++) {
            echo "<tr>";
            for ($col = 0; $col <= 8; $col++) {
                $total = $row + $col;
                if ($total % 2 == 0) {
                    echo "<td style='background-color: black;'></td>";
                } else {
                    echo "<td style='background-color: white;'></td>";
                }
            }
            echo "<tr>";
        }
        ?>
    </table>
</body>
</html>



<br>
<br>
<br>



<!-- 3- Write a PHP program to print alphabet pattern 'M'. -->
<?php
echo "<pre>";
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 5; $j++) {
        if ($j == 0 || $j == 4 || ($i == 1 && $j == 1) || ($i == 1 && $j == 3) || ($i == 2 && $j == 2)) {
            echo "* ";
        } else {
            echo "  ";
        }
    }
    echo "\n";
}
echo "</pre>";
?>



<br>
<br>
<br>



<!-- // 4- Write a PHP function to check whether all array values are strings or not.  -->
<?php 
function checkWhether($arr){
    foreach($arr as $i){
        if(is_string($i)){
            return "true";
        }
        return "false";
    }
}
$arr = [10,"rr", "tt"];
echo checkWhether($arr);
echo "<br>";

$arr = ["rr", "tt"];
echo checkWhether($arr);
?>