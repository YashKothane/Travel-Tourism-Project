<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?ver=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/bootstrap.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin/login.css">

    <title>GR Travels | Admin Login</title>
</head>
<body>
<?php include_once "../connection.php"; ?>

<form method="post" action="index.php">
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="../img/admin.png" id="icon" alt="User Icon"/>
            </div>
            <br>

            <!-- Login Form -->
            <form>
                <input type="text" id="login" name="id" class="fadeIn second" placeholder="ID">
                <input type="password" id="password" name="password" class="fadeIn third" placeholder="Password">
                <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
</div>
</form>

<?php

    if(isset($_POST['submit'])){
        $username=$_POST['id'];
        $password=$_POST['password'];
        $stmt=mysqli_query($conn,"SELECT * FROM admin WHERE id='$username' and password='$password'");
        if(!$stmt)
        {
            die("Error : ".mysqli_error($conn));
        }
        $count=mysqli_num_rows($stmt);
        if($count==0){
            echo "<script>if(!alert('Invalid UserName Or Password')) document.location = 'index.php';</script>";
        }
        else{
            session_start();
            $_SESSION['admin'] = true;
            $_SESSION['adminuser'] = $username;
            header('location:dashboard.php');
        }
    }
?>
</body>
</html>