<?php
    include("connection.php");
    session_start();
    $id = $_GET['id'];
    // echo $id;
    $select = mysqli_query($connection,"SELECT * FROM `code` where t_id = $id");
    $select1 = mysqli_query($connection,"SELECT * FROM `code_explain` where t_id = $id");

    $select2 = mysqli_query($connection, "SELECT * FROM `topic` where t_id = $id");
    $name;
    while($row = mysqli_fetch_assoc($select2)){
        $name = $row['name'];
        break;
    }

    if($_SESSION['s_id'] == -1 && $_SESSION['st_id'] == -1){
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .navbarr{
        background-color: #e5cfab !important;
        position: sticky;
        top: 0;
        z-index: 10;
    }
    .navbarr li{
        margin-left: 35px;
    }
    *{
        font-family: monospace;
        font-size: 16px;
    }
    .code{
        background-color: black;
        padding: 50px 10px 35px 30px;
        border-radius: 20px;
        color: rgb(167, 162, 162);
        position: relative;
    }
    .code p{
        margin-bottom: 0;
    }
    .dots{
        position: absolute;
        z-index: 5;
    }
    .dot{
        position: relative;
        z-index: 5;
        height: 10px;
        top: 5px;
        left: 15px;
        width: 10px;
        border-radius: 50%;
    }
    .explain{
        background-color: #e5cfab;
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
        left: 358px;
    }
    form{
        position: sticky;
        top: 200px;
        z-index: 10;
        width: 45%;
    }
    #sub{
        width: 100%;
    }
    textarea{
        padding: 10px;
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <?php
                    echo'<h3>'.$name.'</h3>';
                ?>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <form action="functions.php" method="post" id="form" onsubmit="return formValidator()">
            <span class="form">
                <textarea name="code" id="code" placeholder="code" rows="10" cols="55"></textarea><br>
                <textarea name="code_explain" id="code_explain" placeholder="code explaination" rows="5" cols="55"></textarea><br>
                <input type="hidden" value=<?php echo $id ?> name="id">
                <input type="submit" id="sub" value="Add Code" name="add_code">
            </span>
        </form>

        <?php
            while($row = mysqli_fetch_assoc($select)){
            echo'<div class="row">';
                echo'<div class="col-5 m-auto">';
                    echo'<div class="dots">';
                        echo'<img src="Images/dot.png" class="dot" alt="">';
                        echo'<img src="Images/dot.png" class="dot" alt="">';
                        echo'<img src="Images/dot.png" class="dot" alt="">';
                    echo'</div>';
                    echo'<div class="code">';
                        $string = $row["code"];
                        $string = str_replace(".//","",$string);
                        $string = str_replace("/n","",$string);
                        $string = str_replace("\\n","",$string);
                        $string = str_replace("   ","&nbsp;",$string);
                        // $string = str_replace("\\n","",$string);
                        echo nl2br("<p>$string</p>");
                    echo'</div>';
                echo'</div>';
                while($row1 = mysqli_fetch_assoc($select1)){
                    if($row1['cd_id'] == $row['co_id']){
                        echo'<div class="explain mt-3 py-4 mb-5">';
                            echo "<p>".$row1['code_explain']."</p>";
                        echo'</div>';
                        break;
                    }
                }
            echo '</div>';
            }
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
        var code = document.getElementById("code");
        var code_explain = document.getElementById("code_explain");

        if(isEmpty(code,"Please enter the code")){
            if(isEmpty(code_explain,"Please explain the code")){
                return true;
            }
        }
        return false;

        function isEmpty(elem, helperMsg){
            if(elem.value == ''){
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