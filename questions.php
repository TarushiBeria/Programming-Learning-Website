<?php
  session_start();
  include("connection.php");
  if($_SESSION['s_id'] == -1 && $_SESSION['st_id'] == -1){
    header("location: homee.php");
  }
  $c_id = $_GET['id'];
  $select = mysqli_query($connection,"SELECT* FROM quiz inner join options on q_id = o_id inner join quiz_ans on q_id = qa_id where quiz.c_id = $c_id");
  // $select1 = mysqli_query($connection,"SELECT * FROM quiz UNION SELECT * FROM quiz;")
  // echo $c_id;
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
    .delete{
        padding: 0;
        color: red;
        background-color: white !important;
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
    select{
        width: 100%;
    }
    .navbarr{
      background-color: #e5cfab !important;
    }
</style>
<body>
    <form action="functions.php" method="post" id="form" onsubmit="return formValidator()">
        <span class="form">
          <input type="text" placeholder="Question" id="question" name="ques">
          <input type="text" placeholder="Option 1" id="op1" name="op1">
          <input type="text" placeholder="Option 2" id="op2" name="op2">
          <input type="text" placeholder="Option 3" id="op3" name="op3">
          <input type="text" placeholder="Option 4" id="op4" name="op4">
          <input type="hidden" value=<?php echo $c_id ?> name = "c_id">
          <select id="select" name="ans">
            <option value="">Select the answer</option>
            <option value="1">option 1</option>
            <option value="2">option 2</option>
            <option value="3">option 3</option>
            <option value="4">option 4</option>
          </select>
          <input type="submit" id="sub" value = "Add Question" name="add_ques">
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
    <!-- <div class="container"> -->
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">option 1</th>
                <th scope="col">option 2</th>
                <th scope="col">option 3</th>
                <th scope="col">option 4</th>
                <th scope="col">ans</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($row = mysqli_fetch_assoc($select)){
                  echo'<tr>';
                    echo'<th scope="row">'.$row['q_id'].'</th>';
                    echo'<td>'.$row['question'].'</td>';
                    echo'<td>'.$row['op1'].'</td>';
                    echo'<td>'.$row['op2'].'</td>';
                    echo'<td>'.$row['op3'].'</td>';
                    echo'<td>'.$row['op4'].'</td>';
                    echo'<td>'.$row['ans'].'</td>';
                  echo'</tr>';
                }
              ?>
            </tbody>
          </table>
    <!-- </div> -->
    <i class="fa-solid fa-plus" onclick="func()"></i>
</body>
<script>
    document.getElementById("form").style.display = "none";
    function func(){
        document.getElementById("form").style.display = "block";
    }

    function formValidator(){
      var question = document.getElementById("question");
      var op1 = document.getElementById("op1");
      var op2 = document.getElementById("op2");
      var op3 = document.getElementById("op3");
      var op4 = document.getElementById("op4");
      var ans = document.getElementById("select");

      if(isEmpty(question, "Please enter the question")){
        if(isEmpty(op1, "Please enter the option 1")){
          if(isEmpty(op2, "Please enter the option 2")){
            if(isEmpty(op3, "Please enter the option 3")){
              if(isEmpty(op4, "Please enter the option 4")){
                if(notSelect(ans, "Please select the answer")){
                  return true;
                }
              }
            }
          }
        }
      }
      return false;

      function isEmpty(elem, helperMsg){
        if(elem.value == ""){
          alert(helperMsg);
          elem.focus();
          return false;
        }
        else{
          return true;
        }
      }

      function notSelect(elem, helperMsg){
        if(elem.value == ""){
          alert(helperMsg);
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