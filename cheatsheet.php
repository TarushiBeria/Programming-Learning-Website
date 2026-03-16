<?php
  session_start();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/cheatsheet.css"> -->
</head>
<style>
  .card-header{
    background-color: #d2ac6eba;
  }
  body{
    font-family: monospace;
  }
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
  .card{
    height: 100% !important;
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
        <div class="row mt-4">
            <h5>Cheatsheet</h5>
        </div>

        <div class="row mt-5">
            <h5>C++</h5>
        </div>
        <div class="row py-4">
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header p-2 text-dark bg-opacity-25">
                      Print
                    </div>
                    <p class="px-3">cout<<"The text";</p>
                  </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header p-2 text-dark bg-opacity-25">
                      If-Else
                    </div>
                    <p class="px-3">if{..}</p>
                    <p class="px-3">else if{..}</p>
                    <p class="px-3">else{..}</p>
                  </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header p-2 text-dark bg-opacity-25">
                      For Loop
                    </div>
                    <p class="px-3">for(int i = 0; i < 5; i++) {<br>&nbsp;cout << i << "\n";<br>}</p>
                  </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header p-2 text-dark bg-opacity-25">
                      While Loop
                    </div>
                    <p class="px-3">int i = 0;<br>while (i < 5) {<br>&nbsp;cout << i << "\n";<br>&nbsp;i++;<br>}</p>
                  </div>
            </div>
        </div>
        <div class="row mt-5">
            <h5>Python</h5>
        </div>
        <div class="row py-4">
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header p-2 text-dark bg-opacity-25">
                      Print
                    </div>
                    <p class="px-3">print("The text");</p>
                  </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header p-2 text-dark bg-opacity-25">
                      If-Else
                    </div>
                    <p class="px-3">if b > a:<br>&nbsp;print("b is greater")<br>elif a == b:<br>&nbsp;print("a and b are equal")<br>else:<br>&nbsp;print("a is greater")</p>
                  </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header p-2 text-dark bg-opacity-25">
                      For Loop
                    </div>
                    <p class="px-3">for x in range(6):<br>&nbsp;print(x)</p>
                  </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header p-2 text-dark bg-opacity-25">
                      While Loop
                    </div>
                    <p class="px-3">i = 1<br>while i < 6:<br>&nbsp;print(i)<br>&nbsp;i += 1</p>
                  </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>