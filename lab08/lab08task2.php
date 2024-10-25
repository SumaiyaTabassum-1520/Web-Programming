<?php
class Calculator {
    public $ans;

    public function setValue($value) {
        $this->ans = $value;
    }

    public function square() {
        $result = $this->ans * $this->ans;
        echo "Square of {$this->ans} is: {$result}\n";
    }

    public function cube() {
        $result = $this->ans * $this->ans * $this->ans;
        echo "Cube of {$this->ans} is: {$result}\n";
    }
}

$calculator1 = new Calculator();
$calculator1->setValue(3);
$calculator1->square();
$calculator1->cube();

?>
