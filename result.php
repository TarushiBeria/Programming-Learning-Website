<?php
  session_start();
  include("connection.php");
  $select = mysqli_query($connection,"SELECT * FROM `result` natural join `courses`");
  if($_SESSION['st_id'] == -1){
    header("location: homee.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    .navbarr{
      background-color: #e5cfab !important;
        position: sticky;
        top: 0;
        z-index: 5;
    }
    .navbarr li{
        margin-left: 35px;
    }
    *{
        font-family: monospace;
        font-size: 16px;
    }
    button{
        background-color: rgba(0, 0, 0, 0.438) !important;
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
            <a class="nav-link" href="our_courses.php">Our Courses</a>
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
                echo'<a class="nav-link active" href="result.php">My Result</a>';
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
    <table class="table table-striped">
        <div class="container">
            <tbody>
            <tr>
                <th></th>
                <th>Course</th>
                <th>Performance</th>
            </tr>
            <?php
              while($row = mysqli_fetch_assoc($select)){
                if($row['st_id']==$_SESSION['st_id']){
                  echo '<tr>';
                    echo '<td></td>';
                    echo '<td>'.$row['name'].'</td>';
                    echo '<td>'.$row['scored'].'/12</td>';
                  echo '</tr>';
                }
              }
            ?>
            </tbody>
        </div>
      </table>
</body>
</html>