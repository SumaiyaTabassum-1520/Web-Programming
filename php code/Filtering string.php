<?php

$string = "Hello!@#$%^&*-_=+\\<>?/World";
$spChar = ['!', '@', '#', '$', '%', '^', '&', '*', '-', '_', '=', '+', '\\', '<', '>', '?', '/'];
$resultString = '';

for ($i = 0; $i < strlen($string); $i++) {
    $isSpecialChar = false;
    for ($j = 0; $j < sizeof($spChar); $j++) {
        if ($string[$i] === $spChar[$j]) {
            $isSpecialChar = true;
            break;
        }
    }
    if (!$isSpecialChar) {
        $resultString .= $string[$i];
    }
}

echo $resultString;

?>
