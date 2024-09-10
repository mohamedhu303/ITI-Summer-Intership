<?php


// 1.
//Write a PHP script to insert a string at the specified position in a given string.
//
//Original String : 'The brown fox'
//Insert 'quick' between 'The' and 'brown'.
function insertText($origin, $word, $strpos){
    return substr($origin, 0, $strpos) . $word . " " . substr($origin,$strpos);
}

$word = "quick";
$origin = "The brown fox";
$strpos = strpos($origin, "brown");
$result = insertText($origin, $word, $strpos);

echo $result;




echo "<br>";
echo "<br>";



//2.
//Write a PHP script to remove all leading zeroes from a string.
//Original String : '000547023.24'
$origin = "000547023.24";
$newStr = trim($origin, 0);
echo $newStr;



echo "<br>";
echo "<br>";



//3.
//Write a PHP script to remove comma(s) from the following numeric string.
//
//Sample String : '2,543.12'
$origin = "2,543.12";
$remove_comma = str_replace(",", "" ,$origin);
echo $remove_comma;
?>