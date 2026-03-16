<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body{
        background-image: linear-gradient(to right, #B7A588 , #e5cfab);
        font-family: monospace;
    }
    .sign-up{
        background-color: rgba(255, 255, 255, 0.228);
    }
</style>
<body>
    <div class="container-fluid py-2 mt-4">
        <div class="row">
        <div class="col-xl-6">

        </div>
        <div class="col-xl-6 sign-up">
            <h1 class="text-center">Sign Up</h1>
            <form action="functions.php" onsubmit="return formValidator()" method="post">
                <i class="fa-solid fa-angles-right"></i>
                <div class="row mt-4">
                    <div class="col-6 text-end">
                        <input type="text" placeholder="Your Name" class="px-3" required id="name" name="name">
                    </div>
                    <div class="col-6">
                        <input type="tel" placeholder="Phone Number" class="px-3" required id="phone" name="phone">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 text-end">
                        <input type="text" placeholder="Father's Name" class="px-3" required id="f_name" name="f_name">
                    </div>
                    <div class="col-6">
                        <input type="text" placeholder="Mother's Name" class="px-3" required id="m_name" name="m_name">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 text-end">
                        <input type="Email" placeholder="Email Address" class="px-3" required id="email" name="email">
                    </div>
                    <div class="col-6">
                        <input type="date" class="px-3" required id="date" name="date">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 text-end">
                        <select id="edu" class="py-1 px-2" name="standard">
                            <option value="">Select Standard</option>
                            <option value="2nd">2nd Standard</option>
                            <option value="3rd">3rd Standard</option>
                            <option value="4th">4th Standard</option>
                            <option value="5th">5th Standard</option>
                            <option value="6th">6th Standard</option>
                            <option value="7th">7th Standard</option>
                            <option value="8th">8th Standard</option>
                            <option value="9th">9th Standard</option>
                            <option value="10th">10th Standard</option>
                            <option value="11th">11th Standard</option>
                            <option value="12th">12th Standard</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select id="gender" class="py-1 px-2" name="gender">
                            <option value="">Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="O">Others</option>
                        </select><br><br>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12">
                        <input list="countries" name="country" id="country" placeholder="Your nationality" class="px-3" required id="nationality">
                
                        <datalist id="countries">
                        <option value="India">
                        <option value="United States Of America">
                        <option value="England">
                        <option value="China">
                        <option value="Ireland">
                        </datalist>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 text-end">
                        <input type="password" placeholder="Password" class="px-3" required id="pass" name="pass">
                    </div>
                    <div class="col-6">
                        <input type="password" placeholder="Confirm Password" class="px-3" required id="cpass" name="cpass"> 
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-12">
                        <input type="submit" value="Sign Up" class="subb" name="signup">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-12">
                        <button type="button" onclick="window.location.href='Log_In.php'">Log In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
<script src="js/bootstrap.bundle.js"></script>
<script>
    function formValidator(){
        var name = document.getElementById("name");
        var phone = document.getElementById("phone");
        var f_name = document.getElementById("f_name");
        var m_name = document.getElementById("m_name");
        var email = document.getElementById("email");
        var date = document.getElementById("date");
        var edu = document.getElementById("edu");
        var gender = document.getElementById("gender");
        var nationality = document.getElementById("country");
        var pass = document.getElementById("pass");
        var cpass = document.getElementById("cpass");

        // alert(gender.value);

        if(isAlpha(name, "Please enter the correct name")){
            if(isphone(phone, "Please enter the correct phone number")){
                if(isAlpha(f_name, "Please enter the correct father's name")){
                    if(isAlpha(m_name, "Please enter the correct mother's name")){
                        if(isEmail(email,"Please enter the correct email")){
                            if(isdate(date, "Minimum age to apply for the course if 7 years")){
                                if(issel(edu, "Please select an option")){
                                    if(issel(gender, "Please select the gender")){
                                        if(isAlphaa(nationality, "Please enter the correct nationality")){
                                            if(ispass(pass, "The length of the password should be greater than 6 and should contain atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character")){
                                                if(iscpass(pass,cpass,"It does not match the password")){
                                                    return true;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return false;

        function isEmail(elem, helperMsg){
            var emailExp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(elem.value.match(emailExp)){
                return true;
            }else{
                alert(helperMsg);
                elem.focus();
                return false;
            }
        }

        function issel(elem, helperMsg){
            if(elem.value == ""){
                alert(helperMsg);
                elem.focus();
                return false;
            }
            else{
                return true;
            }
        }

        function isAlphaa(elem, helperMsg){
            var alphaExp = /^[a-zA-Z ]+$/;
            if(elem.value.match(alphaExp)){
            return true;
            }else{
            alert(helperMsg);
            elem.focus();
            return false;
            }
        }

        function isAlpha(elem, helperMsg){
            var alphaExp = /^[A-Z][a-z]* [A-Z][a-z]*( [A-Z])?$/;
            if(elem.value.match(alphaExp)){
            return true;
            }else{
            alert(helperMsg);
            elem.focus();
            return false;
            }
        }

        function isphone(elem,helperMsg){
            if(elem.value.length == 10){
                return true;
            }
            else{
                alert(helperMsg);
                elem.focus();
                return false;
            }
        }

        function isdate(elem,helperMsg){
            const date = new Date(elem.value);
            const curr = new Date();

            if(curr.getFullYear() - date.getFullYear() > 7){
                return true;
            }
            else if((curr.getFullYear() - date.getFullYear()) == 7 && (curr.getMonth()>=date.getMonth())){
                return true;
            }
            else{
                alert(helperMsg);
                elem.focus();
                return false;
            }
        }

        function ispass(elem, helperMsg){
            var Exp = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,12}$/;
            if(elem.value.match(Exp)){
            return true;
            }else{
            alert(helperMsg);
            elem.focus();
            return false;
            }
        }

        function iscpass(elem1, elem2, helperMsg){
            if(elem1.value == elem2.value){
                return true;
            }
            else{
                alert(helperMsg);
                elem2.focus();
                return false;
            }
        }
    }
</script>
</html>