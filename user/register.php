<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel ="stylesheet" type ="text/css" href = "main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body onload="template()" style="background-image: url('register-background.jpg'); background-size: cover; ">

<div class="container d-flex justify-content-center align-items-center"
            style="min-height: 100vh">
   

    <form class="border shadow p-3 rounded" 
    action = "register.php"
     method = "POST"
     style="width: 450px; background-color: white;">
      <h1>Registration</h1>
  </br>
        <div class="mb-3">
            <label class="form-label" for ="username">Username:</label>
            <input class="form-control" type ="text" name = "username" required/>
        </div>
        <div class="mb-3">
            <label class="form-label" for ="email">Email Address:</label>
            <input class="form-control" type ="email" name = "email" required/>
        </div>
        <div class="mb-3">
            <label class="form-label" for ="password">Password:</label>
            <input class="form-control" type ="password" name = "password" required/>
        </div>
            <input class="btn btn-primary" type ="submit" name ="register" value = "Register">
            <a href = "index.php">Login here</a>

    </form>
</div>

<?php
include 'connection.php';

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT * FROM tbl_users WHERE email_address = '$email'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        echo '<script type  = "text/javascript">';
        echo 'alert("Email Already Taken!");';
        echo 'window.location.href = "register.php"';
        echo '</script>';
    }else{
        $register = "INSERT INTO tbl_users (username, email_address, password, status) VALUES ('$username', '$email', '$password', 'pending')";
        mysqli_query($conn, $register);
        echo '<script type  = "text/javascript">';
        echo 'alert("Your account is now pending for approval!");';
        echo 'window.location.href = "register.php"';
        echo '</script>';
    }
}
?>



</body>
</html>