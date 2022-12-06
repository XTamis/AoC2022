<?php
    $total_count = $total_count_two = 0;

    $handle = fopen("input.txt", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $values = explode(",", $line);

            $in_range_one = $in_range_two = true;
            $in_range_three = $in_range_four = false;

            $first_numbers = explode("-", $values[0]);
            $second_numbers = explode("-", $values[1]);

            for ($x = $first_numbers[0]; $x <= $first_numbers[1]; $x++) {
                if ($second_numbers[0] <= $x && $x <= $second_numbers[1]) {
                    $in_range_three = true;
                } else {
                    $in_range_one = false;
                }
            }

            for ($x = $second_numbers[0]; $x <= $second_numbers[1]; $x++) {
                if ($first_numbers[0] <= $x && $x <= $first_numbers[1]) {
                    $in_range_four = true;
                } else {
                    $in_range_two = false;
                }
            }

            if ($in_range_one || $in_range_two) {
                $total_count++;
            }

            if ($in_range_three || $in_range_four) {
                $total_count_two++;
            }
        }
        fclose($handle);
    }

    echo "$total_count - $total_count_two";
?>