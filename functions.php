<?php
    include("connection.php");

    session_start();

    if(isset($_POST["signup"])){
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $f_name = $_POST["f_name"];
        $m_name = $_POST["m_name"];
        $email = $_POST["email"];
        $date = $_POST["date"];
        $standard = $_POST["standard"];
        $gender = $_POST["gender"];
        $country = $_POST["country"];
        $pass = $_POST["pass"];

        $select = mysqli_query($connection,"SELECT * FROM `member`");
        $flag = 0;

        while($row = mysqli_fetch_assoc($select)){
            if($row['email'] == $email){
                $flag = 1;
                break;
            }
        }

        if($flag == 1){
            // header("Location: Sign_Up.php");
            // echo '<script>alert("The email id already exists");</script>';
            header("Location: Sign_Up.php");
        }
        // echo $flag;
        else{
            mysqli_query($connection, "INSERT INTO `member`(`m_id`, `name`, `DOB`, `phone`, `father name`, `nationality`, `mother name`, `email`, `gender`, `pass`) VALUES ('','$name','$date','$phone','$f_name','$country','$m_name','$email','$gender','$pass')");

            $select = mysqli_query($connection, "SELECT * FROM `member` ORDER BY `m_id` DESC");
            $res = mysqli_fetch_assoc($select);
    
            $m = $res["m_id"];
    
            mysqli_query($connection,"INSERT INTO `student`(`st_id`, `standard`, `m_id`) VALUES ('','$standard','$m')");
            header("Location: Log_In.php");
        }
    }

    if(isset($_POST['login'])){
        $email = $_POST['username'];
        $pass = $_POST['pass'];

        $select = mysqli_query($connection, "SELECT * FROM `member`");
        // $result = mysqli_fetch_assoc($select);
        $s_id = -1;
        $st_id = -1;
        $m_id = 0;
        while ($row = mysqli_fetch_assoc($select)){
            // echo $row['m_id'];
            if($email == $row["email"] && $pass == $row["pass"]){
                // echo "login";
                $_SESSION['email'] = $email;
                $m_id = $row["m_id"];
                $select1 = mysqli_query($connection, "SELECT * FROM `member` natural join `staff`");
                $select2 = mysqli_query($connection, "SELECT * FROM `member` natural join `student`");
                // $result1 = mysqli_fetch_assoc($select1);

                while($row1 = mysqli_fetch_assoc($select1)){
                    if($row1["m_id"]==$m_id){
                        $s_id = $row1['s_id'];
                        break;
                    }
                }
                while($row1 = mysqli_fetch_assoc($select2)){
                    if($row1["m_id"]==$m_id){
                        $st_id = $row1['st_id'];
                        break;
                    }
                }
                $_SESSION['s_id'] = $s_id;
                $_SESSION['st_id'] = $st_id;
                // echo $_SESSION['s_id'];
                header('Location: homee.php');
                break;
            }
            else{
                header("location: Log_In.php");
            }
        }
    }

    if(isset($_POST['add_staff'])){
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $f_name = $_POST["f_name"];
        $m_name = $_POST["m_name"];
        $email = $_POST["email"];
        $date = $_POST["date"];
        $gender = $_POST["gender"];
        $country = $_POST["country"];
        $pass = $email."@123";
        $edu = $_POST["edu"];

        $select = mysqli_query($connection,"SELECT * FROM `member` natural join `staff`");
        $flag = 0;

        while($row = mysqli_fetch_assoc($select)){
            if($row['email'] == $email){
                $flag = 1;
                break;
            }
        }

        if($flag == 1){
            header("location: add_staff.php");
        }
        else{
            mysqli_query($connection, "INSERT INTO `member`(`m_id`, `name`, `DOB`, `phone`, `father name`, `nationality`, `mother name`, `email`, `gender`, `pass`) VALUES ('','$name','$date','$phone','$f_name','$country','$m_name','$email','$gender','$pass')");

            $select = mysqli_query($connection, "SELECT * FROM `member` ORDER BY `m_id` DESC");
            $res = mysqli_fetch_assoc($select);
    
            $m = $res["m_id"];
    
            mysqli_query($connection,"INSERT INTO `staff`(`s_id`, `m_id`) VALUES ('','$m')");
    
            $select = mysqli_query($connection, "SELECT * FROM `staff` ORDER BY `m_id` DESC");
            $res = mysqli_fetch_assoc($select);
    
            $s = $res["s_id"];
    
            $arr = (explode(",",$edu));
            foreach($arr as $a){
                mysqli_query($connection, "INSERT INTO `staff_education`(`s_id`, `edu_qualification`) VALUES ('$s','$a')");
            }
    
            header("location: homee.php");
        }
    }

    if(isset($_POST["add_course"])){
        $course = $_POST["course"];

        $s_id = $_SESSION['s_id'];
        mysqli_query($connection,"INSERT INTO `courses`(`c_id`, `name`, `s_id`) VALUES ('','$course','$s_id')");
        header('Location: our_courses.php');
        // echo $course;
    }

    if(isset($_POST['add_topic'])){
        $topic = $_POST["name"];
        $c_id = $_POST["c_id"];

        $s_id = $_SESSION['s_id'];

        mysqli_query($connection,"INSERT INTO `topic`(`t_id`, `name`, `c_id`, `s_id`) VALUES ('','$topic','$c_id','$s_id')");

        header('Location: our_courses.php');
    }

    if(isset($_POST['add_code'])){
        $code = $_POST['code'];
        $code_explain = $_POST['code_explain'];
        $t_id = $_POST['id'];

        $code = str_replace("//.","/n",$code);
        // $code = str_replace("   ","$nbsp",$code);

        mysqli_query($connection,"INSERT INTO `code`(`co_id`, `t_id`, `code`) VALUES ('','$t_id','$code')");

        mysqli_query($connection,"INSERT INTO `code_explain`(`cd_id`, `t_id`, `code_explain`) VALUES ('','$t_id','$code_explain')");

        header("location: our_courses.php");
    }

    if(isset($_POST['add_ques'])){
        $ques = $_POST['ques'];
        $op1 = $_POST['op1'];
        $op2 = $_POST['op2'];
        $op3 = $_POST['op3'];
        $op4 = $_POST['op4'];
        $ans = $_POST['ans'];
        $c_id = $_POST['c_id'];

        mysqli_query($connection,"INSERT INTO `quiz`(`q_id`,`c_id` ,`question`) VALUES ('','$c_id','$ques')");

        mysqli_query($connection,"INSERT INTO `quiz_ans`(`qa_id`, `ans`) VALUES ('','$ans')");

        $q_id; 
        $qa_id;
        $o_id;
        $select = mysqli_query($connection,"SELECT * FROM `quiz` ORDER BY q_id DESC;");
        while($row = mysqli_fetch_assoc($select)){
            $q_id = $row['q_id'];
            break;
        }

        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` ORDER BY qa_id DESC;");
        while($row = mysqli_fetch_assoc($select)){
            $qa_id = $row['qa_id'];
            break;
        }

        mysqli_query($connection,"INSERT INTO `quiz_ans_answers_quiz`(`q_id`, `qa_id`) VALUES ('$q_id','$qa_id')");

        mysqli_query($connection,"INSERT INTO `options`(`o_id`, `op1`, `op2`, `op3`, `op4`) VALUES ('','$op1','$op2','$op3','$op4')");

        $select = mysqli_query($connection,"SELECT * FROM `options` ORDER BY o_id DESC;");
        while($row = mysqli_fetch_assoc($select)){
            $o_id = $row['o_id'];
            break;
        }

        mysqli_query($connection,"INSERT INTO `quiz_has_options`(`o_id`, `q_id`) VALUES ('$o_id','$q_id')");

        header("location: our_courses.php");
    }

    if(isset($_POST["sub_quiz"])){
        $ques1 = $_POST['ques1'];
        $ans1 = $_POST['ans1'];
        $ques2 = $_POST['ques2'];
        $ans2 = $_POST['ans2'];
        $ques3 = $_POST['ques3'];
        $ans3 = $_POST['ans3'];
        $ques4 = $_POST['ques4'];
        $ans4 = $_POST['ans4'];
        $ques5 = $_POST['ques5'];
        $ans5 = $_POST['ans5'];
        $ques6 = $_POST['ques6'];
        $ans6 = $_POST['ans6'];
        $ques7 = $_POST['ques7'];
        $ans7 = $_POST['ans7'];
        $ques8 = $_POST['ques8'];
        $ans8 = $_POST['ans8'];
        $ques9 = $_POST['ques9'];
        $ans9 = $_POST['ans9'];
        $ques10 = $_POST['ques10'];
        $ans10 = $_POST['ans10'];
        $ques11 = $_POST['ques11'];
        $ans11 = $_POST['ans11'];
        $ques12 = $_POST['ques12'];
        $ans12 = $_POST['ans12'];
        $c_id = $_POST['c_id'];

        $scored = 0;
        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques1");
        $res = mysqli_fetch_assoc($select);
        if($ans1 == $res['ans']){
            $scored = $scored + 1;
        }

        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques2");
        $res = mysqli_fetch_assoc($select);
        if($ans2 == $res['ans']){
            $scored = $scored + 1;
        }
        
        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques3");
        $res = mysqli_fetch_assoc($select);
        if($ans3 == $res['ans']){
            $scored = $scored + 1;
        }

        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques4");
        $res = mysqli_fetch_assoc($select);
        if($ans4 == $res['ans']){
            $scored = $scored + 1;
        }

        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques5");
        $res = mysqli_fetch_assoc($select);
        if($ans5 == $res['ans']){
            $scored = $scored + 1;
        }

        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques6");
        $res = mysqli_fetch_assoc($select);
        if($ans6 == $res['ans']){
            $scored = $scored + 1;
        }

        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques7");
        $res = mysqli_fetch_assoc($select);
        if($ans7 == $res['ans']){
            $scored = $scored + 1;
        }

        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques8");
        $res = mysqli_fetch_assoc($select);
        if($ans8 == $res['ans']){
            $scored = $scored + 1;
        }

        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques9");
        $res = mysqli_fetch_assoc($select);
        if($ans9 == $res['ans']){
            $scored = $scored + 1;
        }

        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques10");
        $res = mysqli_fetch_assoc($select);
        if($ans10 == $res['ans']){
            $scored = $scored + 1;
        }

        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques11");
        $res = mysqli_fetch_assoc($select);
        if($ans11 == $res['ans']){
            $scored = $scored + 1;
        }

        $select = mysqli_query($connection,"SELECT * FROM `quiz_ans` where qa_id = $ques12");
        $res = mysqli_fetch_assoc($select);
        if($ans12 == $res['ans']){
            $scored = $scored + 1;
        }
        $st_id = $_SESSION['st_id'];
        mysqli_query($connection,"INSERT INTO `result`(`r_id`, `scored`, `st_id`, `c_id`) VALUES ('','$scored','$st_id','$c_id')");

        $r_id;
        if($scored>5){
            $select = mysqli_query($connection,"SELECT * FROM `result` ORDER BY `r_id` DESC");
            while($res = mysqli_fetch_assoc($select)){
                $r_id = $res['r_id'];
                break;
            }
            mysqli_query($connection,"INSERT INTO `certificates`(`ce_id`, `c_id`, `r_id`) VALUES ('','$c_id','$r_id')");
        }

        header("location: result.php");
    }
?>