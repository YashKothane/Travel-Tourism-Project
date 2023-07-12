
<?php
session_start();
if (!$_SESSION['admin']) {
    header("location:../index.php");
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
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?ver=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <script src="../../js/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
    <script src="../../js/bootstrap.js"></script>

    <title>Car Details</title>
</head>
<body><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="../dashboard.php">GR Travels | Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user/user.php">User</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="cars.php">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../hotel/hotel.php">Hotels</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a href="#" class="nav-link"><b><?php echo "Hello, " . $_SESSION['admin']; ?></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../profile.php">Your Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="col-xl-12 col-md-offset-2">
        <div class="row">
            <h2 class="h2 col-xl-10">Car Details</h2>
            <input type="button" value="Add New" id="addNew" name="addNew" class="float-right btn btn-success mb-4 mt-2">
            <div class="mt-3 table-responsive col-xl-11" id="user_data"></div>
        </div>
    </div>

    <div id="user_dialog" title="Add Data">
        <form method="post" id="user_from" name="user_form" class="p-2">
            <div class="form-group">
                <label for="carid">Car ID</label>
                <input type="text" name="carid" id="carid" class="form-control" disabled>
                <span id="error_carid" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
                <span id="error_name" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <!--<input type="text" name="name" id="name" class="form-control">-->
                <textarea rows="6" id="description" name="description" class="form-control"></textarea>
                <span id="error_description" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="seat">Seater</label>
                <input type="number" name="seat" id="seat" class="form-control">
                <span id="error_seat" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control">
                <span id="error_price" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="ac">AC/Non AC</label>
                <input type="text" name="ac" id="ac" class="form-control">
                <span id="error_ac" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="luggage">Luggage</label>
                <input type="text" name="luggage" id="luggage" class="form-control">
                <span id="error_luggage" class="text-danger"></span>
            </div>
            <div class="form-group">
                <input type="hidden" name="action" id="action" value="insert" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
                <input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
            </div>
        </form>
    </div>

    <div id="action_alert" title="Action" class="p-2">

    </div>

    <div id="delete_confirmation" title="Confirmation" class="p-2">
        <p><b>Are you sure you want to Delete this data?</b></p>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        load_data();

        function load_data() {
            $.ajax({
                url: "fetch.php",
                method: "POST",
                success: function (data) {
                    $('#user_data').html(data);
                }
            });
        }

        $("#user_dialog").dialog({
            autoOpen: false,
            width: 400
        });

        $("#addNew").click(function(){
            $('#user_dialog').attr('title', 'Add Data');
            $('#action').val('insert');
            $('#form_action').val('Insert');
            //$('#user_form')[0].reset();
            $('#form_action').attr('disabled', false);
            $("#user_dialog").dialog('open');
        });

        $('user_form').on('submit', function () {
            event.preventDefault();
            var error_name = '';
            var error_description = '';
            var error_seat = '';
            var error_price = '';
            var error_ac = '';
            var error_luggage = '';

            if ($('#name').val() == '') {
                error_name = 'Name is required';
                $('#name').text(error_name);
                $('#name').css('border-color', '#cc0000');
            } else {
                error_name = '';
                $('#error_name').text(error_name);
                $('#error_name').css('border-color', '');
            }

            if ($('#description').val() == '') {
                error_description = 'Name is required';
                $('#description').text(error_description);
                $('#description').css('border-color', '#cc0000');
            } else {
                error_description = '';
                $('#error_descriptionr').text(error_description);
                $('#error_descriptionr').css('border-color', '');
            }

            if ($('#seat').val() == '') {
                error_seat = 'Name is required';
                $('#seat').text(error_seat);
                $('#seat').css('border-color', '#cc0000');
            } else {
                error_seat = '';
                $('#error_seat').text(error_seat);
                $('#error_seat').css('border-color', '');
            }

            if ($('#price').val() == '') {
                error_price = 'Name is required';
                $('#price').text(error_price);
                $('#price').css('border-color', '#cc0000');
            } else {
                error_price = '';
                $('#error_price').text(error_price);
                $('#error_price').css('border-color', '');
            }

            if ($('#ac').val() == '') {
                error_ac = 'Name is required';
                $('#ac').text(error_ac);
                $('#ac').css('border-color', '#cc0000');
            } else {
                error_ac = '';
                $('#error_ac').text(error_ac);
                $('#error_ac').css('border-color', '');
            }

            if ($('#luggage').val() == '') {
                error_luggage = 'Name is required';
                $('#luggage').text(error_luggage);
                $('#luggage').css('border-color', '#cc0000');
            } else {
                error_luggage = '';
                $('#error_luggage').text(error_luggage);
                $('#error_luggage').css('border-color', '');
            }

            if(error_name != '' || error_description != '' || error_seat != '' ||
                error_ac != '' || error_price != '' || error_luggage != '') {
                return false;
            } else {
                $('#form_action').attr('disabled', 'disabled');
                var form_data = $(this).serialize();
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: form_data,
                    success: function (data) {
                        $('#user_dialog').dialog('close');
                        $('#action_alert').html(data);
                        $('#action_alert').dialog('open');
                        load_data();
                        $('#form_action').attr('disabled', false);
                    }
                });
            }
        });

        $('#action_alert').dialog({
            autoOpen:false
        });

        $('#delete_confirmation').dialog({
            autoOpen:false,
            modal: true,
            buttons: {
                Ok : function(){
                    var id = $(this).data('id');
                    var action = 'delete';
                    $.ajax({
                        url:"action.php",
                        method:"POST",
                        data:{id:id, action:action},
                        success:function(data) {
                            $('#delete_confirmation').dialog('close');
                            $('#action_alert').html(data);
                            $('#action_alert').dialog('open');
                            load_data();
                        }
                    });
                },
                Cancel : function(){
                    $(this).dialog('close');
                }
            }
        });

        $(document).on('click', '.delete', function(){
            var id = $(this).attr("id");
            $('#delete_confirmation').data('id', id).dialog('open');
        });
    });
</script>
</body>
</html>