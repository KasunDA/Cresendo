<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="class details" content="width=device-width, initial-scale=1">

    <title>Class Details</title>

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/view_class_details.css">



</head>


<body>


<div class="main-content">



    <div class="form-mini-container">


        <h1>Class Details</h1>

        <form class="form-mini" method="post" action="#">

            <div class="form-row">
                <li>
                    <label for="Course"><b>Course :</b></label>
                    <label id="Course"><?php echo $user->getCourse();?></label>
                </li>
            </div>

            <div class="form-row">
                <li>
                    <label for="Term"><b>Term :</b></label>
                    <label id="Term"><?php echo $user->getTerm();?></label>
                </li>
            </div>
            <div class="form-row">
                <li>
                    <label for="Year"><b>Year :</b></label>
                    <label id="Year"><?php echo $user->getYear();?></label>
                </li>
            </div>
            <div class="form-row">
                <li>
                    <label for="Time Slot"><b>Time Slot :</b></label>
                    <label id="Time Slot"><?php echo $user->getTimeSlot();?></label>
                </li>
            </div>
            <div class="form-row">
                <li>
                    <label for="Class Type"><b>Class Type :</b></label>
                    <label id="Class Type"><?php echo $user->getClassType();?></label>
                </li>
            </div>
            <div class="form-row">
                <li>
                    <label for="No Of Students"><b>No Of Students :</b></label>
                    <label id="No Of Students"><?php echo $user->getNoOfStudents();?></label>
                </li>
            </div>
            <div class="form-row">
                <li>
                    <label for="Teacher"><b>Teacher :</b></label>
                    <label id="Teacher"><?php echo $user->getTeacher();?></label>
                </li>
            </div>
            <div class="form-row">
                <li>
                    <label for="Building"><b>Building :</b></label>
                    <label id="Building"><?php echo $user->getBuilding();?></label>
                </li>
            </div>
            <div class="form-row">
                <li>
                    <label for="Charge"><b>Charge :</b></label>
                    <label id="Charge"><?php echo $user->getCharge();?></label>
                </li>
            </div>



        </form>
    </div>


</div>


