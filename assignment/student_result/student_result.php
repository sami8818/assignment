<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marks = $_POST['marks'];

    foreach ($marks as $mark) {
        if (!is_numeric($mark) || $mark < 0 || $mark > 100) {
            echo "Mark range is invalid.<br>";
            exit;
        }
    }

    $hasFailed = false;
    foreach ($marks as $mark) {
        if ($mark < 33) {
            $hasFailed = true;
            break;
        }
    }

    if ($hasFailed) {
        echo "The student has failed.<br>";
    } else {
        
        $totalMarks = array_sum($marks);
        $averageMarks = $totalMarks / count($marks);

        switch (true) {
            case ($averageMarks >= 80):
                $grade = "A+";
                break;
            case ($averageMarks >= 70):
                $grade = "A";
                break;
            case ($averageMarks >= 60):
                $grade = "A-";
                break;
            case ($averageMarks >= 50):
                $grade = "B";
                break;
            case ($averageMarks >= 40):
                $grade = "C";
                break;
            case ($averageMarks >= 33):
                $grade = "D";
                break;
            default:
                $grade = "F";
                break;
        }

        echo "Total Marks: $totalMarks<br>";
        echo "Average Marks: $averageMarks<br>";
        echo "Grade: $grade<br>";
    }
}
?>
