<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel ="stylesheet" type ="text/css" href = "main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel ="stylesheet" type ="text/css" href = "admin.css">
        <title>Admin Login</title>
    </head>
    <body onload="template()" style="background-image: url('admin-background.jpg'); background-size: cover; ">

       <input type="button" class="btn btn-danger btn-sm" style="margin-left: 10px;" value="User" onclick="window.location='http://localhost/chatbott/user/';">
        
        <!-- form  -->

        <div class="container d-flex justify-content-center align-items-center"
            style="min-height: 100vh">
            <form class="border shadow p-3 rounded"
                action="index.php"
                method="POST"
                style="width: 450px; background-color: white;">
                <h1 class="text-center p-3">ADMIN LOGIN</h1>
                
                <div class="mb-3">
                    <label for="email"
                    class="form-label">Email</label>
                    <input type="email"
                    class="form-control"
                    name="email"
                    required />
                </div>
                <div class="mb-3">
                    <label for="password"
                    class="form-label">Password</label>
                    <input type="password"
                    name="password"
                    class="form-control"
                    required>
                </div>
                
                <input type ="submit" name ="login" value = "Login"
                class="btn btn-primary" />
                
            </form>
        </div>
        <?php
        if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $select = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE email_address = '$email' AND password = '$password'");
        $row = mysqli_fetch_array($select);
        $status =$row['status'];
        $select2 = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE email_address = '$email' AND password = '$password'");
        $check_user=mysqli_num_rows($select2);
        if($check_user==1){
        // $_SESSION["status"]=$row['status'];
        $_SESSION["email"]=$row['email_address'];
        $_SESSION["password"]=$row['password'];
         header('location:admin-approval.php');
        // if($status=="approved"){
        // echo '<script type  = "text/javascript">';
        // echo 'alert("Login Success!");';
        // echo 'window.location.href = "admin-approval.php"';
        // echo '</script>';
        // }
        // elseif($status=="pending"){
        // echo '<script type  = "text/javascript">';
        // echo 'alert("Your account is still pending for approval!");';
        // echo 'window.location.href = "index.php"';
        // echo '</script>';
        // }else{
        // echo "Incorrect email or password!";
        // }
        }else{
        echo "Incorrect email or password!";
        }
        }
        ?>
    </body>
</html>