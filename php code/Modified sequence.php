<?php

$input = "#-1-2_3#4_5-6#7-8_9#10_#";
$expression = "";

$length = strlen($input);

$start = 0;
for ($i = 0; $i < $length; $i++) {
    if ($input[$i] !== '-' && $input[$i] !== '_' && $input[$i] !== '#') {
        $start = $i;
        break;
    }
}

$end = $length - 1;
for ($i = $length - 1; $i >= 0; $i--) {
    if ($input[$i] !== '-' && $input[$i] !== '_' && $input[$i] !== '#') {
        $end = $i;
        break;
    }
}

for ($i = $start; $i <= $end; $i++) {
    $expression .= $input[$i];
}

echo "Expression: ". $expression;

?>
