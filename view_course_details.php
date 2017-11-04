<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="course details" content="width=device-width, initial-scale=1">

    <title>Class Details</title>

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/view_course_details.css">

</head>


<body>


<div class="main-content">



    <div class="form-mini-container">


        <h1>Course Details</h1>

        <form class="course" method="post" action="#">

            <div class="form-row">
                <li>
                    <label for="Instrument"><b>Instrument :</b></label>
                    <label id="Instrument"><?php echo $user->getInstrument();?></label>
                </li>
            </div>



        </form>
    </div>


</div>


