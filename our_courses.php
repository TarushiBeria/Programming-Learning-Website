<?php
  include("connection.php");
  session_start();
  if($_SESSION['s_id'] == -1 && $_SESSION['st_id'] == -1){
    header("location: homee.php");
  }
  $id = 1;
  $select = mysqli_query($connection, "SELECT * FROM `courses`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/courses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  i{
    background-color: rgba(0, 0, 0, 0.438) !important;
    color: white;
    padding: 15px;
    border-radius: 50%;
    position: sticky;
    left: 1500px;
    bottom: 30px;
  }
  .form{
    position: absolute;
    padding: 30px;
    background-color: rgba(0, 0, 0, 0.7) !important;
    left: 630px;
  }
  form{
    position: sticky;
    top: 350px;
    z-index: 10;
    width: 45%;
  }
  #sub{
    border-radius: 5px;
    background-color: rgba(255, 255, 255, 0.784);
    width: 100%;
    margin-top: 10px;
  }
  .navbarr{
        background-color: #e5cfab !important;
  }
</style>
<body>
  <form action="functions.php" id="form" method="post" onsubmit="return formValidator()">
    <span class="form">
      <input type="text" placeholder="Course Name" id="name" name="course">
      <input type="submit" id="sub" value="Add Course" name="add_course">
    </span>
  </form>
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
    <div class="container mt-3">
        <div class="row">
          <?php
            while ($row = mysqli_fetch_assoc($select)){
            echo '<div class="col-4 mb-4">';
                echo '<div class="card cardd" style="width: 18rem;">';
                    echo '<div class="card-body" id="c1">';
                      echo '<h5 class="card-title">'.$row['name'].'</h5>';
                      echo '<a href="options.php?id='.$row['c_id'].'" class="btn mx-3">Start Now</a>';
                      if($_SESSION['s_id']!=-1){
                      echo '<a href="questions.php?id='.$row['c_id'].'" class="btn">Questions</a>';
                      }
                    echo '</div>';
                  echo '</div>';
            echo '</div>';
            }
          ?>
        </div>

        <?php
          if($_SESSION['s_id']!=-1){
            echo'<i class="fa-solid fa-plus" onclick="func()"></i>';
          }
        ?>
    </div>
</body>
<script>
  document.getElementById("form").style.display = "none";
  function func(){
    document.getElementById("form").style.display = "block";
  }

  function formValidator(){
    var name = document.getElementById("name");
    
    if(isAlpha(name,"Please Enter only letters and numbers for the course name")){
      return true;
    }
    return false;

    function isAlpha(elem, helperMsg){    
      if(elem.value == ''){
        alert("Please enter the course name");
        elem.focus();
        return false;
      }
      else{
        return true;
      }
    }
  }
</script>
</html>