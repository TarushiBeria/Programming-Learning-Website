<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body{
        background-image: linear-gradient(to right, #B7A588 , #e5cfab);
        font-family: monospace;
    }
    .Log-in{
        background-color: rgba(255, 255, 255, 0.333);
    }
</style>
<body class="mt-4">
    <div class="container-fluid text-center py-2">
        <div class="col-xl-6 Log-in">
            <i class="fa-solid fa-angles-left"></i>
            <h1>Log In</h1>
            <form action="functions.php" onsubmit="return formValidator()" method="post">
                <input type="email" placeholder="Username" id="username" class="px-3" required name="username"><br>
                <input type="password" placeholder="Password" id="password" class="px-3" required name="pass"><br>
                <input type="submit" value="Log In" class="sub" name="login"><br>
                <button type="button" class="mt-4" onclick="window.location.href='Sign_Up.php'">Sign Up</button>
            </form>
        </div>
        <div class="col-xl-6"></div>
    </div>
</body>
<script src="js/bootstrap.bundle.js"></script>
<script>
    function formValidator(){
        var username = document.getElementById("username");
        var pass = document.getElementById("password");

        if(isValid(username, "Please enter a valid username")){
            if(ispass(pass, "The length of the password should be above 6 characters")){
                return true;
            }
        }
        return false;

        function isValid(elem, helperMsg){
            var Exp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(elem.value.match(Exp)){
                    return true;
                }else{
                    alert(helperMsg);
                    elem.focus();
                    return false;
                }
        }

        function ispass(elem, helperMsg){
            if(elem.value.length >=6){
                return true;
            }
            else{
                alert(helperMsg);
                elem.focus();
                return false;
            }
        }
    }
</script>
</html>