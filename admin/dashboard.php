
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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin/dashboard.css">

    <title>Admin Dashboard</title>
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
                <li class="nav-item active">
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

<div class="container mt-lg-5">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-primary shadow py-2 mb-4 mr-4 col-sm-12">
                    <div class="card-body">
                        <div class="col align-content-center">
                            <a class="card-link user-dropdown-link" href="user/user.php">
                                <div class="h5 font-weight-bold">User List</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-success shadow py-2 mb-4 mr-4 col-sm-12">
                    <div class="card-body">
                        <div class="col align-content-center">
                            <a class="card-link user-dropdown-link" href="cars/cars.php">
                                <div class="h5 font-weight-bold">Cars List</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-danger shadow py-2 mb-4 mr-4 col-sm-12">
                    <div class="card-body">
                        <div class="col align-content-center">
                            <a class="card-link user-dropdown-link" href="hotel/hotel.php">
                                <div class="h5 font-weight-bold">Hotels List</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-primary shadow py-2 mb-4 mr-4 col-sm-12">
                    <div class="card-body">
                        <div class="col align-content-center">
                            <a class="card-link user-dropdown-link" href="user/booking/user_booking.php">
                                <div class="h5 font-weight-bold">User Booking Info</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-success shadow py-2 mb-4 mr-4 col-sm-12">
                    <div class="card-body">
                        <div class="col align-content-center">
                            <a class="card-link user-dropdown-link" href="cars/car_booking/car_bookings.php">
                                <div class="h5 font-weight-bold">Cars Booking List</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-danger shadow py-2 mb-4 mr-4 col-sm-12">
                    <div class="card-body">
                        <div class="col align-content-center">
                            <a class="card-link user-dropdown-link" href="hotel/rooms/room_details.php">
                                <div class="h5 font-weight-bold">Hotel Room Details</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-primary shadow py-2 mb-4 mr-4 col-sm-12">
                    <div class="card-body">
                        <div class="col align-content-center">
                            <a class="card-link user-dropdown-link" href="payments/payment.php">
                                <div class="h5 font-weight-bold">Payment Details</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-success shadow py-2 mb-4 mr-4 col-sm-12">
                    <div class="card-body">
                        <div class="col align-content-center">
                            <a class="card-link user-dropdown-link" href="feedback/feedback.php">
                                <div class="h5 font-weight-bold">Feedback</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-danger shadow py-2 mb-4 mr-4 col-sm-12">
                    <div class="card-body">
                        <div class="col align-content-center">
                            <a class="card-link user-dropdown-link" href="hotel/reviews/review.php">
                                <div class="h5 font-weight-bold">Hotel Reviews</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>