<?php
  include("connection.php");
  session_start();
  $c_id = $_GET['c_id'];
  $select = mysqli_query($connection,"SELECT * FROM `quiz` ORDER BY RAND() LIMIT 14");
  if($_SESSION['s_id'] == -1 && $_SESSION['st_id'] == -1){
    header("location: homee.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/quizes.css">
</head>
<style>
  .navbarr{
    background-color: #e5cfab !important;
  }
</style>
<body>
    <nav class="navbar navbar-expand-lg bg-light navbarr">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CodeFair</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="homee.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="our_courses.php">Our Courses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="faq.php">FAQ</a>
              </li>
              <?php
                if($_SESSION['st_id']!=-1){
                  echo'<li class="nav-item">';
                    echo'<a class="nav-link" href="certificates.php">My Certificates</a>';
                  echo'</li>';
                  echo'<li class="nav-item">';
                    echo'<a class="nav-link" href="result.php">My Result</a>';
                  echo'</li>';     
                }
                else{
                  echo'<li class="nav-item">';
                      echo'<a class="nav-link" href="show_result.php">Show Result</a>';
                  echo'</li>';    
                }
                if($_SESSION['email'] == "manoj.beria183@nmims.edu.in"){
                  echo'<li class="nav-item">';
                    echo'<a class="nav-link" href="add_staff.php">Add Staff</a>';
                  echo'</li>';
                  echo'<li class="nav-item">';
                    echo'<a class="nav-link" href="courses_report.php">Courses Report</a>';
                  echo'</li>';
                }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    <div class="container">
      <form action="functions.php" method="post">
      <input type="hidden" value=<?php echo $c_id ?> name="c_id">
      <?php
        $count = 0;
        while($row = mysqli_fetch_assoc($select)){
          if($row['c_id']==$c_id){
            $count = $count + 1;
            echo '<div class="questions">';
            echo'<div class="row question">'.$row['question'].'</div>';
  
            $idd = $row['q_id'];
            $select1 = mysqli_query($connection,"SELECT * FROM `options` where o_id = $idd");
            while($row1 = mysqli_fetch_assoc($select1)){
              echo'<div class="row d-flex justify-content-around">';
                $string = "ans".$count;
                $string1 = "ques".$count;
                  echo'<div class="col-6 optionn myRadio">';
                      echo'<input type="hidden" value='.$row['q_id'].' name='.$string1.'>';
                      echo'<input type="radio" name='.$string.' value=1>';
                      echo'<label for="">'.$row1['op1'].'</label>';
                  echo'</div>';
                  echo'<div class="col-6 optionn myRadio">';
                      echo'<input type="radio" name='.$string.' value=2>';
                      echo'<label for="">'.$row1['op2'].'</label>';
                  echo'</div>';
              echo'</div>';
              echo'<div class="row d-flex justify-content-around">';
                  echo'<div class="col-6 optionn myRadio">';
                      echo'<input type="radio" name='.$string.' value=3>';
                      echo'<label for="">'.$row1['op3'].'</label>';
                  echo'</div>';
                  echo'<div class="col-6 optionn myRadio">';
                      echo'<input type="radio" name='.$string.' value=4>';
                      echo'<label for="">'.$row1['op4'].'</label>';
                  echo'</div>';
              echo'</div>'; 
            }
            echo'</div>';
          }
        }
          echo'<div class="d-flex justify-content-between">';
          echo'<input type="submit" name="sub_quiz" class="btn btn-secondary mt-3">';
          echo'</div>';
      ?>
      </form>
    </div>
</body>
<script>
var radios = document.getElementsByClassName("myRadio");

// Loop through the radios to check their 'required' property
for (var i = 0; i < radios.length; i++) {
    radios[i].required;
}
</script>
</html>