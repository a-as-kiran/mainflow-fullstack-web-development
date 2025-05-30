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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
    padding: 0%;
    margin: 0%;
    box-sizing: border-box;
    font-family: "poppins", sans-serif;
}
body{
    background-image: url(back.jpg);
}
.nri{
    width: 350px;
    height: 400px;
    padding: 20px;
    background:transparent;
    backdrop-filter: blur(3px);
    background-size:contain;
    color: aliceblue;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px;
    border-color: #fff;
    box-shadow: 0 4px 8px rgba(0.3,0.3,0.3,0.4);
    border-radius: 40px;
}
.nri .input_box{
    width: 270px;
    height: 60px;
    background-color: none;
    margin-bottom: 20px;
}
.input_box input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgb(225, 225, 225, .2);
    border-radius: 40px;
    box-shadow: 0 4px 8px rgba(0.1, 0.1, 0.1, 0.2);
    padding: 10px
}
.input_box input::placeholder{
    color:black
}
.nri .btn{
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
.alert{
    color   : red;
}

    </style>
</head>
<body>
     <section style= "display: grid;  place-items: center;
    min-height: 100vh; background-size: 100%;">
        <?php
                if(isset($_POST["login"]))
                {
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                   
                    require_once "db.php";
                    $sql = "SELECT * FROM Users WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if($user)
                    {
                             $passwordHash = $user['password']; 
                         if(password_verify($password, $passwordHash))
                         {
                            session_start();
                            $_SESSION["user"] = "yes";
                            header("Location: index1.php");
                            die();
                         }
                         else
                         {
                            echo "div class = 'alert'>password does not match</div>";  
                         }
                        
                    }
                    else{
                        echo "<div class = 'alert'>Email does not exists</div>";
                    }
                }
            ?>
        <div class="nri">
            
            <form action="login.php" method="post" id="this">
            <div class="input_box">
                <input type="text" id="username" name ="email" placeholder="Enter Email"
                required>
            </div>
            <div class="input_box">
                <input type="password" id="password" name = "password" placeholder="password"
                required>
            </div>
           
            <div class="room">
            <input type="submit" class="btn" value="login" name ="login">
            </div>
            <div class="rigister">
                <p style="color: black;">
                    Don't have an account?<a href="register.php">Rigister</a>
                </p>
            </div>
            </form>
        </div>
    </section>
</body>
</html>