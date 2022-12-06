<?php
    $handle = fopen("input.txt", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $values = explode(",", $line);
        }
        fclose($handle);
    }
?>