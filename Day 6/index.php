<?php
    $file = file_get_contents("input.txt");

    for ($x = 0; $x < strlen(trim($file)); $x++) {
        $code = substr($file, $x, 4);
        $long_code = substr($file, $x, 14);
        if (count(array_unique(str_split($code))) == 4) {
            echo "Character: ".($x + 4)." code: ".$code."<br>";
        }
        if (count(array_unique(str_split($long_code))) == 14) {
            echo "Character: ".($x + 14)." code: ".$long_code."<br>";
        }
    }
?>