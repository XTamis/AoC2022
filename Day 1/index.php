<?php
    $total_val_elf = 0;
    $val_array = [];
    $alphachar = array_merge(range('A', 'Z'), range('a', 'z'));

    $handle = fopen("7532.txt", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            if ('' === trim($line)) {
                array_push($val_array, $total_val_elf);
                $total_val_elf = 0;
            } else {
                if (is_numeric($line)) {
                    $total_val_elf += $line;
                }
            }
        }
        fclose($handle);
    }

    rsort($val_array);

    echo "Highest calories for single elf: ".max($val_array)."<br>";
    echo "Top 3 total: ".$val_array[0] + $val_array[1] + $val_array[2]."<br>";
?>