<?php

$string = 'The quick brown [dog].';
$extractString = '';

$start = 0;
for ($i = 0; $i < strlen($string); $i++) {
    if ($string[$i] === '[') {
        $start = $i + 1;
        break;
    }
}

$end = 0;
for ($i = $start; $i < strlen($string); $i++) {
    if ($string[$i] === ']') {
        $end = $i;
        break;
    }
}

if ($start !== 0 && $end !== 0) {
    for ($i = $start; $i < $end; $i++) {
        $extractString .= $string[$i];
    }
}

echo $extractString;

?>
