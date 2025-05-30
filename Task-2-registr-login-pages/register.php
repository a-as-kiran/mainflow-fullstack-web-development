<?php
    session_start();
    if(isset($_SESSION["user"]))
    {
        header("Location: index1.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charaset='UTF-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
   
    background-image: url(back.jpg);
}
.alert{
    color   : red;
}
.success{
    color: green;
}
.container{
    width: 350px;
    height: 500px;
    padding: 50px;
    background:transparent;
    backdrop-filter: blur(3px);
    background-size:contain;
    color: aliceblue;
    box-shadow: 0 4px 8px rgba(0.3,0.3,0.3,0.4);
    border-radius: 40px;
}
.input{
    width: 250px;
    height: 50px;
    background-color: none;
    margin-bottom: 30px;
}
.input-box{
     width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgb(225, 225, 225, .2);
    border-radius: 40px;
    box-shadow: 0 4px 8px rgba(0.1, 0.1, 0.1, 0.2);
    padding: 10px;
}
.input .input-box::placeholder{
    color: black;
}
.container .btn{
    width: 50%;
    object-fit: cover;
    height: 45px;
    size: 50px;
    background-color: transparent;
    display: flex;
    justify-content: center;
    border-radius:15px;
    margin-bottom: 30px;
    margin-top: 10px;
    border-color: black;
}
.room{
    display: flex;
    justify-content: center;
}

    </style>
</head>
<body>
   
     <section style= "display: grid;  place-items: center;min-height: 100vh; background-size: 100%;">
     <?php
        
        if(isset($_POST["submit"])) 
        {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            $errors = array();
            $passwordHash = password_hash($password, PASSWORD_BCRYPT); 
            if(empty($username) OR empty($email) OR empty($password) OR empty($passwordRepeat) )
            {
                array_push($errors,"All fields are required");
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                array_push($errors,"Email is not valid");
            }
            if(strlen($password)<8)
            {
                array_push($errors, "Password must be at least 8 charactes long");
            }
            if($password!==$passwordRepeat)
            {
                array_push($errors, "Password does not match");
            }
             require_once "db.php";
            $sql = "SELECT * FROM Users  WHERE email = '$email'";    
            $result = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($result);
            if($rowcount>0)
            {
                array_push($errors,"Email already exists!");
            }
            if(count($errors)>0)
            {
                foreach($errors as $error)
                {
                    echo "<div class ='alert'>$error</div>";
                }
            }

            else 
            {
               
                $sql = "INSERT INTO Users (full_name, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if($prepareStmt)
                {
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='success'>You are registered successfully </div>";
                }
                else
                {
                    die("Something went wrong!");
                }
            }   

        }
    ?>
<div class="container">

    
    <form action="register.php" method="post">
        <div class="input">
            <input type="text" class="input-box" name="username" placeholder="Username:" >
        </div>
        <div class="input">
            <input type="email" class="input-box" name="email" placeholder="Email:" >
        </div>
        <div class="input">    
            <input type="password" class="input-box" name="password" placeholder="Password:" >
        </div>
        <div class="input">   
            <input type="password" class="input-box" name="repeat_password" placeholder="Repeat Password:" >
        </div>
        <div class="room">
            <input type="submit" class="btn" value="register" name="submit" >
        </div>
            Already have an account?<a href="login.php">Login</a>
    </form>
</div>
     </section>
</body>
</html>