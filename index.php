<?php

    if(isset($_POST['login-btn'])){


        $servername = "localhost";
        $databaseName = "my_hospital";
        $conn = mysqli_connect($servername, 'root', '', $databaseName);
        if($conn){
            
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `users` WHERE username='$username'";
            
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            
                $sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {

                    header('Location: pat.html');

                }else{
                    echo "<div class=\"error\"> Invalid Password! </div>";
                }

            }
             else {
            header('Location: registration.php');
            }
        }else{
        
            echo "<div class=\"error\"> Connection Error!! </div>";

        
        }
    


    }


?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
    <style>
    body,
    html {
        height: 100%;
        font-family: TimesNewRoman, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    .bg-img {
    
        background-image: url("https://elixiraid.com/wp-content/uploads/2015/03/hospital-management-software.jpg");
        min-height: 500px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    

    .container {
        position: absolute;
        right: 25;
        margin: 20px;
        max-width: 400px;
        padding: 16px;
        background-color: palegoldenrod;
    }



    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: white;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: white;
        outline: none;
    }


    .btn {
        background-color: blue;
        color: black;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .error {

        padding: 10px 10px;
        margin: 10px 10px;
        background-color: red;
        color: white;
        border-radius: 10px;

    }


    </style>
</head>

<body>



    <h2><b> WELCOME TO CLINICS MANAGEMENT SYSTEM</b>
    </h2>


    <p><i>Have a great day</i></p>
    <div class="bg-img">
        <form action="" method="POST" onsubmit="return check()" class="container">
            <h1>Login</h1>

            <label for="username"><b>User Name</b></label>
            <input type="text" placeholder="Enter username" id="username" name="username" required>
            <label for="passsword"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="password" name="password" required>

            <input class="btn" type="submit" name="login-btn" value="Login">
            <center><a href="registration.php"> New to this  system?? Click here to Create new account</a></center>
        </form>
    </div>


    <script>
    function check() {

        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username.trim() == "") {
            alert("Enter a valid Username!");
            return false;
        } else if (password.trim() == "") {
            alert("Enter a valid Password!");
            return false;
        } else if (password.trim().length() < 6) {
            alert("Password must be more than 6 characters!");
            return false;
        } else {
            document.getElementById("username").value = username.trim();
            document.getElementById("password").value = password.trim();
            return true;
        }
    }
    </script>

</body>

</html>


