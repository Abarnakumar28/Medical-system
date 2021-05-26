<?php

   
if(isset($_POST['register-btn'])){


    $servername = "localhost";
    $databaseName = "my_hospital";
    $conn = mysqli_connect($servername, 'root', '', $databaseName);
    if($conn){
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $sql = "INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
        
        $result = mysqli_query($conn, $sql);

        if (($result)) {
            
            header('Location: index.php');

          } else {
           
            echo "<div class=\"error\"> Registration Failed! </div>";

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
    <title>Registration</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: cadetblue;
    }

    * {
        box-sizing: border-box;
    }


    .error {

        padding: 10px 10px;
        margin: 10px 10px;
        background-color: red;
        color: white;
        border-radius: 10px;

    }



    .container {
        padding: 16px;
        background-color: wheat;
    }

  

    input[type=text],
    input[type=email],
    input[type=password] {
        width: 50%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: white;
    }

    input[type=text]:focus,
    input[type=email]:focus,
    input[type=password]:focus {
        background-color: darkgrey;
        outline: none;
    }


    hr {
        border: 1px solid white;
        margin-bottom: 25px;
    }



    .registerbtn {
        background-color: blue;
        color: black;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 50%;
      
    }


    a {
        color: dodgerblue;
    }

  

    .signin {
        background-color: wheat;
        text-align: center;
    }
         div {
        background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ_I4IpfJ1Qv3wbAbAWUKA1slLHxoanhYzLRg&usqp=CAU');
        min-height: 500px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }
    </style>
</head>

<body>

    <form action="" onsubmit="return check()" method="POST">
        <div class="container">
            <h1>Registeration form for new users.</h1>
            <p>Fill in this form to create an account.</p>
            <hr>
            <label for="username"><b>User Name</b></label>
            <input type="text" placeholder="Enter username" id="username" name="username" required><br>
            <label for="email"><b>Email Address</b></label>
            <input type="email" placeholder="Enter Email Address" id="emailID" name="email" required><br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="password" name="password" required><br>
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" id="confirm-password" placeholder="Repeat Password" name="psw-repeat" required>
            <hr>
         

            <input type="submit" class="registerbtn" value="Register" name="register-btn">
        </div>

        <div class="container signin">
            <p>If you already have an account? <a href="index.php">Login here</a>.</p>
        </div>
    </form>

    <script>
    function check() {

        var username = document.getElementById("username").value.trim();
        var email = document.getElementById("emailID").value.trim();
        var password = document.getElementById("password").value.trim();
        var confirmPassword = document.getElementById("confirm-password").value.trim();


        if (password != confirmPassword) {
            alert("Passwords are not same");
            return false;
        } else if (username == "") {
            alert("Enter a  Username, this cannot be left empty!");
            return false;
        } else if (email == "") {
            alert("Enter a  Email-ID, this cannot be left empty!");
            return false;
        } else if (password == "" || (password.length() < 8)) {
            alert("Password must be more than 8 characters!");
            return false;
        } else {
            document.getElementById("username").value = username;
            document.getElementById("emailID").value = email;
            document.getElementById("password").value = password;
            document.getElementById("confirm-password").value = confirmPassword;
            return true;
        }


    }
    </script>


</body>

</html>