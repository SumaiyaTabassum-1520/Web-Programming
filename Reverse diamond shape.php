<?php
echo "<pre>";

$n = 5;
for ($i = 5; $i > 0; $i--) {
    for ($j = $n - $i; $j > 0; $j--)
        echo "  ";
    for ($j = 2 * $i - 1; $j > 0; $j--)
        echo (" *");
    echo "<br>";
}
for ($i = 2; $i <= 5; $i++) {
    for ($j = $i; $j < 5; $j++)
        echo "  ";
    for ($j = 2 * $i - 1; $j > 0; $j--)
        echo (" *");
    echo "<br>";
}
echo "</pre>";
?>