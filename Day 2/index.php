<?php
    $total_score = 0;

    $handle = fopen("input.txt", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $values = explode(" ", $line);

            $str = ['A', 'B', 'C', 'X', 'Y', 'Z'];
            $rplc =[1, 2, 3, 1, 2, 3];

            $values = str_replace($str, $rplc, $values);

            echo $line."<br>";

            echo $total_score.' - ';
            // Win
            if ($values[0] < $values[1]) {
                $total_score += $values[1] + 6;
            }
            // Draw
            else if ($values[0] == $values[1]) {
                $total_score += $values[1] + 3;
            }
            // Loss
            else if ($values[0] > $values[1]) {
                $total_score += $values[1];
            }

            echo $total_score.'<br>';
        }
        fclose($handle);
    }

    echo $total_score;
?>