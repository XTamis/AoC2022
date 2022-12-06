<?php
    $stacks = [
        1 => ['W', 'D', 'G', 'B', 'H', 'R', 'V'],
        2 => ['J','N','G','C','R','F'],
        3 => ['L', 'S', 'P', 'H', 'D', 'N', 'J'],
        4 => ['J', 'D', 'S', 'V'],
        5 => ['S', 'H', 'D', 'R', 'Q', 'W', 'N', 'V'],
        6 => ['P', 'G', 'H', 'C', 'M'],
        7 => ['F', 'J', 'B', 'G', 'L', 'Z', 'H', 'C'],
        8 => ['S', 'J', 'R'],
        9 => ['L', 'G', 'S', 'R', 'B', 'N', 'V', 'M']
    ];

    $handle = fopen("input.txt", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            if(str_starts_with($line, 'move')) {
                preg_match_all('!\d+!', $line, $numbers);
                $result = $numbers[0];
                $crates = array_splice($stacks[$result[1]], -1 * $result[0], $result[0]);

                // Uncomment for answer of part 1.
                //$crates = array_reverse($crates);
                array_push($stacks[$result[2]], ...$crates);
            }
        }
        fclose($handle);
    }

    foreach ($stacks as $stack) {
        echo end($stack);
    }
?>