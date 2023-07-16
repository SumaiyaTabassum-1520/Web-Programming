<?php
function prime($digit) {
    if ($digit <= 1) {
        return false;
    }

    for ($i = 2; $i < $digit; $i++) {
        if ($digit % $i === 0) {
            return false;
        }
    }

    return true;
}

$sum = 0;

for ($j = 1000; $j <= 3000; $j++) {
    if (prime($j)) {
        $sum += $j;
    }
}

echo "Sum = " . $sum;
?>


