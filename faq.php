<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a class="nav-link" href="our_courses.php">Our Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="faq.php">FAQ</a>
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
    <div class="container fs-5">
        <h5 class="my-3">Frequently Asked Questions</h5>
        <div class="row mb-2">
            <div class="question bg-secondary p-2 text-dark bg-opacity-10">
                <p><span class="text-danger"><i class="fa-solid fa-q"></i>.</span> Who is this platform for?</p>
            </div>
            <div class="answer bg-white p-2 text-dark bg-opacity-10">
                <p><span class="text-secondary"><i class="fa-solid fa-a"></i>.</span> This platform is designed for anyone who wants to learn programming — from absolute beginners to experienced developers looking to expand their skill set.</p>
            </div>
        </div>

        <div class="row mb-2">
            <div class="question bg-secondary p-2 text-dark bg-opacity-10">
                <p><span class="text-danger"><i class="fa-solid fa-q"></i>.</span> Do I need any prior experience to start?</p>
            </div>
            <div class="answer bg-white p-2 text-dark bg-opacity-10">
                <p><span class="text-secondary"><i class="fa-solid fa-a"></i>.</span> Not at all! Our beginner-friendly courses start from the basics and include hands-on exercises, quizzes, and real-world examples.</p>
            </div>
        </div>

        <div class="row mb-2">
            <div class="question bg-secondary p-2 text-dark bg-opacity-10">
                <p><span class="text-danger"><i class="fa-solid fa-q"></i>.</span> Is there a cost to use the platform?</p>
            </div>
            <div class="answer bg-white p-2 text-dark bg-opacity-10">
                <p><span class="text-secondary"><i class="fa-solid fa-a"></i>.</span> We offer both free and premium content. Many beginner courses are free, while advanced or specialized tracks may require a subscription.</p>
            </div>
        </div>

        <div class="row mb-2">
            <div class="question bg-secondary p-2 text-dark bg-opacity-10">
                <p><span class="text-danger"><i class="fa-solid fa-q"></i>.</span> Can I get a certificate?</p>
            </div>
            <div class="answer bg-white p-2 text-dark bg-opacity-10">
                <p><span class="text-secondary"><i class="fa-solid fa-a"></i>.</span> Yes! Upon completing a course or track, you'll receive a downloadable certificate you can share on LinkedIn or your resume.</p>
            </div>
        </div>

        <div class="row mb-2">
            <div class="question bg-secondary p-2 text-dark bg-opacity-10">
                <p><span class="text-danger"><i class="fa-solid fa-q"></i>.</span> Can I learn at my own pace?</p>
            </div>
            <div class="answer bg-white p-2 text-dark bg-opacity-10">
                <p><span class="text-secondary"><i class="fa-solid fa-a"></i>.</span> Yes! All of our courses are self-paced, so you can learn whenever and wherever it suits you.</p>
            </div>
        </div>
    </div>
</body>
</html>