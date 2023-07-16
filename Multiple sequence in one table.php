<?php

$rows = 10;
$columns = 10;

// Create the table
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $columns; $j++) {
        echo ($i * $j) . "\t";
    }
    echo "\n";
}

?>
