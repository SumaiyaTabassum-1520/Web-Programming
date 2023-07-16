<?php
function bubbleSort(&$digit) {
    $n = count($digit);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($digit[$j] < $digit[$j + 1]) {
                $temp = $digit[$j];
                $digit[$j] = $digit[$j + 1];
                $digit[$j + 1] = $temp;
            }
        }
    }
}

$array = [5,6,18,80,78,23,1,10,3,4,56,100,99,234];
bubbleSort($array);

for ($i = 0; $i < count($array); $i++) {
    echo $array[$i] ."\n";
}

?>
