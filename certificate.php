<?php
  session_start();
    $course = $_GET['course'];
    $name = $_GET['name'];
    // echo $name;
    // echo $course;
    if($_SESSION['st_id'] == -1){
        header("location: homee.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-image: url("./Images/certificate.png");
        background-repeat: no-repeat;
        background-position: -210px -110px;
        background-size: 1950px 850px;
        overflow-x: hidden;
        font-family: monospace;
    }
    .name{
        position: relative;
        top: 270px;
        /* left: 660px; */
    }
    .text{
        position: relative;
        top: 310px;
        /* left: 500px; */
        font-size: 40px;
        font-family: 'Times New Roman', Times, serif;
        color: rgb(81, 24, 24);
    }
    .cer_no{
        position: relative;
        top: 450px;
        left: 345px;
    }
    .date{
        position: relative;
        top: 405px;
        left: 1220px;
    }
</style>
<body>
    <h1 class="name" align="center"><?php echo $name ?></h1>
    <h1 class="text" align="center">Completing the <?php echo $course ?> Course</h1>
</body>
</html>