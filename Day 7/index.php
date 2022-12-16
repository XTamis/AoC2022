<?php
    $handle = fopen("input.txt", "r");

    $current_directory = '';
    $current_directory_size = 0;
    $visited_directories = array();

    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $trimmed = trim($line);
            $current_directory = '/';

            if (str_starts_with($trimmed, '$ cd')) {
                echo "$trimmed <br>";
            } else if (str_starts_with($trimmed, '$ ls')) {
                echo "$trimmed <br>";
            } else if (str_starts_with($trimmed, 'dir')) {
                $values = explode(" ", $trimmed);
                echo $values[1]."<br>";
            }
            if (!in_array($trimmed, $visited_directories)) {
                array_push($visited_directories, $trimmed);
            }
        }
        fclose($handle);
    }
?>