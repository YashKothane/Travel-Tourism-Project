<?php

include "../../connection.php";

if (isset($_POST["action"])) {
    if ($_POST["action"] == "insert") {
        $name = trim($_POST["name"]);
        $desc = trim($_POST["description"]);
        $seat = trim($_POST["seat"]);
        $price = trim($_POST["price"]);
        $ac = trim($_POST["ac"]);
        $luggage = trim($_POST["luggage"]);

        $sql = $conn->query("INSERT INTO car_list (carname, description, seater, price, ACNONAC, luggage, isDeleted)
                                VALUES ('$name', '$desc', '$seat', '$price', '$ac', '$luggage', 'N')");

        if (!$sql) {
            echo "<p class='p-2'><b>Error in Inserting data.</b></p>";
            echo "Query failed : (". $conn->errno .") ". $conn->error;
            return;
        } else {
            echo "<p class='p-2'><b>Data Inserted.</b></p>";
        }
    }

    if ($_POST["action"] == "delete") {
        $id = trim($_POST["id"]);

        $sql = $conn->query("DELETE FROM car_list WHERE carid = '$id'");

        if (!$sql) {
            echo '<p><b>Error in deleting car data from car list table.</b></p>';
            echo "Query failed : (". $conn->errno .") ". $conn->error;
            return;
        } else
            echo "<p><b>Data Deleted</b></p>";
    }
}