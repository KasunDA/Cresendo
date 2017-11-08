<?php
    include 'connect.php';
    function getdetails($id){
        try {
            $con = connect();
            #student details
            $query = mysqli_query($con, "select FirstName,LastName,Gender,DoB,Address,Province,City from person where ID='$id'");
            if (!$query) {
                die("database query failed." . mysqli_error($con));
            }
            $result =mysqli_fetch_array($query);
            $fname=$result['FirstName'];
            $lname=$result['LastName'];
            $gender=$result['Gender'];
            $dob=$result['DoB'];
            $address=$result['Address'];
            $province=$result['Province'];
            $city=$result['City'];

            #Both parents details except telephone numbers
            $query1 = mysqli_query($con, "select Parent_id,FirstName,LastName,Relation,Address,Province,City from parent where Student_id='$id'");
            if (!$query1) {
                die("database query failed." . mysqli_error($con));
            }
            $parents = [];

            while ($parent = $query1->fetch_array()) {
                $parents[] = $parent["Parent_id"];
                $parents[] = $parent["FirstName"];
                $parents[] = $parent["LastName"];
                $parents[] = $parent["Relation"];
                $parents[] = $parent["Address"];
                $parents[] = $parent["Province"];
                $parents[] = $parent["City"];

            }
            #parents ids
            $pid1=$parents[0];
            $pid2=$parents[7];




            #get student telephone numbers
            $query2 = mysqli_query($con, "select TP from tel_numbers where ID='$id'");
            if (!$query2) {
                die("database query failed." . mysqli_error($con));
            }
            $tels = [];
            while ($tel = $query2->fetch_array()) {
                $tels[] = $tel["TP"];

            }

            $stp1=NULL;
            $stp2=NULL;
            if(sizeof($tels)==1){
                $stp1=$tels[0];
            }else if(sizeof($tels)==2){
                $stp1=$tels[0];
                $stp2=$tels[1];
            }


            #parents telephone numbers
            $ptel1=NULL;
            $ptel2=NULL;
            $ptel3=NULL;
            $ptel4=NULL;
            $query3 = mysqli_query($con, "select TP from parent_tel_numbers where ID='$pid1'");
            if (!$query3) {
                die("database query failed." . mysqli_error($con));
            }
            $p1tels = [];
            while ($p1tel = $query3->fetch_array()) {
                $p1tels[] = $p1tel["TP"];

            }
            if(sizeof($p1tels)==1){
                $ptel1=$p1tels[0];
            }else if(sizeof($p1tels)==2){
                $ptel1=$p1tels[0];
                $ptel2=$p1tels[1];
            }

            $query4 = mysqli_query($con, "select TP from parent_tel_numbers where ID='$pid2'");
            if (!$query4) {
                die("database query failed." . mysqli_error($con));
            }
            $p2tels = [];
            while ($p2tel = $query4->fetch_array()) {
                $p2tels[] = $p2tel["TP"];

            }
            if(sizeof($p2tels)==1){
                $ptel3=$p2tels[0];
            }else if(sizeof($p1tels)==2){
                $ptel3=$p2tels[0];
                $ptel4=$p2tels[1];
            }

            $sib1=NULL;
            $sib2=NULL;
            $query5 = mysqli_query($con, "select Sib_ID from sibling where s_ID='$id'");
            if (!$query5) {
                die("database query failed." . mysqli_error($con));
            }
            $sibs = [];
            while ($sib = $query5->fetch_array()) {
                $sibs[] = $sib["TP"];

            }
            if(sizeof($sibs)==1){
                $sib1=$sibs[0];
            }else if(sizeof($sibs)==2){
                $sib1=$sibs[0];
                $sib2=$sibs[1];
            }
            $array=array($fname,$lname,$dob,$address,$province,$city,$gender,$stp1,$stp2,$parents[1],$parents[2],$parents[3],$parents[4],$parents[5],$parents[6],$ptel1,$ptel2,$parents[8],$parents[9],$parents[10],$parents[11],$parents[12],$parents[13],$ptel3,$ptel4,$sib1,$sib2);
            return $array;
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('Error Occur in connecting to the Database!')</script>";
        }catch (Exception $e){
            echo "<script>alert('Enter Valid Inputs!')</script>";
        }

    }

?>