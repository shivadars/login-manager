<?php
    include("connection.php");
    $message="";
    if(isset($_POST['Login'])){
        $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($username)){
            $message="enter a username";
        }
        elseif(empty($password)){
            $message="enter a password";
        }
        else{
            $sql="INSERT INTO USERNAME(username,password) VALUES ('$username','$password')";
            mysqli_query($conn,$sql);
            $message="you are registered";
        }
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=129">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="division1">
        <div class="division7">
            <h5>SafeLogin</h5>
        </div>
        <div class="division2">
            <h3 class="sentence">Enter your username and password to continue</h3>
        </div>
        <form action="index.php" method="post">
             <div class="username">
                    <input type="text" name="username" placeholder="Username"><br>
             </div>
             <div class="password">
                    <input type="password" name="password" placeholder="Password">
             </div>
             <div class="continue">
                <input type="submit" name="Login" value="Login">
             </div>
        </form>
        <div class="division3">
            Need help? <a>Visit our support care</a>
        </div>
        <div class="division6<?php  if($message=="enter a username"||$message=="enter a password") echo ' error';?>">
            <?php 
               echo "$message";
            ?>
        </div>
    </div>
</body>
</html>
