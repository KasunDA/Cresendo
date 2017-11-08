<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_group');
define('DB_USER','root');
define('DB_PASSWORD','');

function operationExam($class_id1,$instrument,$year1,$term1){

    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
    $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());



    $stmt1 = $con->prepare('select Instrument_id from instrument where Title=?');
    $stmt1->bind_param("s", $instrument);
    $stmt1->execute();
    $stmt1->bind_result($Instrument_id);
    $stmt1->fetch();
    $stmt1->close();

        $count = 0;
        $stmt3 = $con->prepare("SELECT Count(Exam_Title) FROM exam WHERE Class_id=? AND Instrument_id=? AND Year=? AND Term=? ");
        $stmt3->bind_param("ssss",$class_id1, $Instrument_id, $year1, $term1);
        $stmt3->execute();
        $stmt3->bind_result($count);
        $stmt3->fetch();
        $stmt3->close();

        $Exam_Title='';
        #echo $count;
        if ($count == 0) {
            $Exam_Title='Exam-1';

        } elseif ($count == 1) {
            $Exam_Title='Exam-2';

        } elseif ($count == 2) {
            $Exam_Title='Exam-Final';

        }else{
            echo "<script>alert('All the marks are already entered')</script>";
        }
        #echo $Exam_Title;
        return $Exam_Title;
    $con->close();
}

function operationInsert($exam_id,$class_id1,$instrument,$year1,$term1,$date,$Exam_Title){

    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
    $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());


    #mysqli_autocommit($con,false);

    $stmt1 = $con->prepare('select Instrument_id from instrument where Title=?');
    $stmt1->bind_param("s", $instrument);
    $stmt1->execute();
    $stmt1->bind_result($Instrument_id);
    $stmt1->fetch();
    $stmt1->close();

    #$Exam=uniqid();
    #echo $Exam;

    $stmt = $con->prepare("INSERT INTO exam (Exam_id,Class_id,Instrument_id,Term,Year,Exam_Title,Date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiiss", $exam_id, $class_id1, $Instrument_id, $term1, $year1, $Exam_Title, $date);
    $stmt->execute();
    $stmt->close();



   # $stmt=$con->prepare("insert into exam (Exam_id,Class_id,Instrument_id,Term,Year,Exam_Title,date) VALUES (?,?,?,?,?,?,?,?)");
    #$stmt->bind_param("ssssiiss",$exam_id,$class_id1,$Instrument_id,$term1,$year1,$Exam_Title,$date);
   # $stmt->execute();
    #$stmt->close();

    #mysqli_autocommit($con,true);

    $con->close();
}

?>
