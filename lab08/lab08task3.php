<?php
class Student {
    private $name;
    private $id;
    private $cgpa;

    public function __construct($name, $id, $cgpa) {
        $this->name = $name;
        $this->id = $id;
        $this->cgpa = $cgpa;
    }

    public function getCGPA() {
        return $this->cgpa;
    }
}

$stdnt1 = new Student("sumaiya", "2021-1-60-042", 2.81);
$stdnt2 = new Student("tabassum", "2021-1-60-045", 3.06);

$averageCGPA = ($stdnt1->getCGPA() + $stdnt2->getCGPA()) / 2;

echo "Average CGPA: {$averageCGPA}\n";
?>
