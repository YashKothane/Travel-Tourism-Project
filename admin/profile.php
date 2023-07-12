<?php

session_start();
if (!$_SESSION['admin']) {
    header("location:index.php");
}

?>

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

    <title>Admin Profile</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">GR Travels | Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user/user.php">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cars/cars.php">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hotel/hotel.php">Hotels</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a href="#" class="nav-link"><b><?php echo "Hello, " . $_SESSION['admin']; ?></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Your Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
include "../connection.php";

$sql = $conn->query("SELECT * FROM admin");
if ($sql->num_rows > 0) {
    while ($data = $sql->fetch_array()) {
        $id = $data['id'];
        $pass = $data['password'];
    }
}
?>

<div class="container mt-3">
    <h2>Admin Profile</h2>
    <div class="mt-3 align-content-center col-md-6">
        <div id="user_dialog">
            <form method="post" id="user_form" class="p-2">
                <div class="form-group">
                    <label>Admin ID</label>
                    <input type="text" name="admin_id" id="admin_id" class="form-control" value="<?php echo $id ?>" />
                    <span id="error_admin_id" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label>Admin Password</label>
                    <input type="text" name="admin_password" id="admin_password" class="form-control" value="<?php echo $pass ?>" />
                    <span id="error_admin_password" class="text-danger"></span>
                </div>
                <div class="align-items-center">
                    <button type="submit" id="update" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['update'])) {
        $sql_update = $conn->query("UPDATE admin SET id = '".$_POST['admin_id']."', password = '".$_POST['admin_password']."'");

        if ($sql_update) {
            echo "<p><b>Details Updated</b></p>";
            header("location:logout.php");
        } else
            echo "<p><b>Error in updating details</b></p>";
    }
    ?>
</div>
</body>
</html>
