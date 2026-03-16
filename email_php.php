<?php
    if(isset($_POST['submit'])){
        $to = "tarushiberia1008@gmail.com";
        $subject = "new Order";
        $message = $_POST["name"];
        $header = "From: no-reply@yourdomain.com";

        if(mail($to, $subject, $message, $header)){
            echo "Mail received";
        }
        else{
            echo "Mail failed";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" placceholder="name" name="name">
        <input name="submit" type="submit">
    </form>
</body>
</html>