<?php
  include("connection.php");
  session_start();
  if($_SESSION['s_id'] == -1 && $_SESSION['st_id'] == -1){
    header("location: homee.php");
  }
  $id = $_GET['id'];
  $select = mysqli_query($connection, "SELECT * FROM `topic`");
  $select1 = mysqli_query($connection, "SELECT * FROM `courses`");
  $name;
  while($row = mysqli_fetch_assoc($select1)){
    if($row['c_id'] == $id){
      $name = $row['name'];
      break;
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/options.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <style>
    .navbarr{
      background-color: #e5cfab !important;
    }
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
  </style>
  <body>
    <form action="functions.php" id="form" onsubmit="return formValidator()" method="post">
        <span class="form">
          <input type="text" placeholder="Topic Name" id="name" name="name">
          <input type="hidden" name="c_id" value= <?php echo $id ?> >
          <input type="submit" id="sub" value = "Add Topic" name="add_topic">
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
    <div class="container mt-5">
        <h5><?php echo $name ?></h5>
        <div class="accordion" id="accordionExample">
          <?php
          
          while ($row = mysqli_fetch_assoc($select)){
            if($row['c_id']==$id){
              echo '<div class="accordion-item">';
              echo '<h2 class="accordion-header" id="'.$row["t_id"].'">';
                  echo '<button class="accordion-button" type="button" data-bs-toggle="collapse"data-bs-target="#collapse'.+ $row["t_id"].'" aria-expanded="true" aria-controls="collapse'.+ $row["t_id"].'">
                  '.$row["name"].'
                  </button>'; 
              echo '</h2>';
              echo '<div id="collapse'.+ $row["t_id"].'" class="accordion-collapse collapse" aria-labelledby="'.$row["t_id"].'" data-bs-parent="#accordionExample">';
                  echo '<div class="accordion-body">';
                  echo '<a href="topic_explain.php?id='.$row["t_id"].'&&c_id='.$id.'" class="btn">Start Now</a>';
                  echo '</div>';
              echo '</div>';
          echo '</div>';
            }
        }
        ?>
        <div align="center" class="mt-5">
            <!-- <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='discussion.html'">Discussions</button> -->
            <!-- <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='quizes.html'">Start Quiz</button> -->
            <?php
              echo '<a href="quizes.php?c_id='.$id.'" class="btn">Start Quiz</a>';
            ?>
            <!-- <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='cheatsheet.html'">Cheatsheet</button> -->
            <a href="cheatsheet.php" class="btn">Cheatsheet</a>
        </div>
        <?php
          if($_SESSION['s_id']!=-1){
            echo'<i class="fa-solid fa-plus" onclick="func()"></i>';
          }
        ?>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>
    document.getElementById("form").style.display = "none";
    function func(){
        document.getElementById("form").style.display = "block";
    }

    function formValidator(){
    var name = document.getElementById("name");
    
    if(isAlpha(name,"Please Enter only letters and numbers for the topic name")){
      return true;
    }
    return false;

    function isAlpha(elem, helperMsg){    
      if(elem.value == ''){
        alert("Please enter the topic name");
      }
      else{
        var alphaExp = /^[0-9a-zA-Z ]+$/;   
        if(elem.value.match(alphaExp)){
          return true;
          alert(name.value);
        }else{
          alert(helperMsg);
          elem.focus();
          return false;
        }
      }
    }
  }
  </script>
</html>