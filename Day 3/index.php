<?php
    $total_score = 0;
    $total_score_three = 0;
    $line_counter = 0;
    $line_array = array();

    function compare($str1, $str2){
        $used_letter = array();
        $alphachar = array_merge(range('a', 'z'), range('A', 'Z'));
    
        for($i = 0; $i < strlen($str1); $i++){
    
            for($j = 0; $j < strlen($str2); $j++){
                if($str1[$i] == $str2[$j]) {
                    if(!in_array($str1[$i], $used_letter)){
                        $letter_in_common = $str1[$i];
                    }
                }
            }
        }
    
        return intval(array_search($letter_in_common, $alphachar, true)) + 1;
    }

    function compare_three($str1, $str2, $str3){
        $used_letter = array();
        $alphachar = array_merge(range('a', 'z'), range('A', 'Z'));
    
        for($i = 0; $i < strlen($str1); $i++){
            for($j = 0; $j < strlen($str2); $j++){
                for($k = 0; $k < strlen($str3); $k++){
                    if(($str1[$i] == $str2[$j]) && ($str2[$j] == $str3[$k])) {
                        if(!in_array($str1[$i], $used_letter) && (!in_array($str2[$j], $used_letter))){
                            $letter_in_common = $str1[$i];

                            return intval(array_search($letter_in_common, $alphachar, true)) + 1;
                        }
                    }
                }
            }
        }
    }

    $handle = fopen("input.txt", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $values = explode(" ", $line);

            if ($line_counter < 3) {
                array_push($line_array, trim($line));
                $line_counter++;
            } else {
                $line_counter = 1;
                $line_array = array(trim($line));
            }

            if(count($line_array) == 3) {
                $total_score_three += compare_three($line_array[0], $line_array[1], $line_array[2]);
            }
            
            $str_len = strlen(trim($line)).'<br>';

            $first_half = substr($line, 0, (intval($str_len) / 2));
            $second_half = substr($line, (intval($str_len) / 2));

            $total_score += compare($first_half, $second_half);
        }
        fclose($handle);
    }

    echo $total_score_three.'<br>';
    echo $total_score;
?>