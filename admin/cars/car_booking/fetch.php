<?php

include "../../../connection.php";

$sql = $conn->query("SELECT * FROM car_booking");

$output = '
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Booking ID</th>
			<th>Car ID</th>
			<th>Customer ID</th>
			<th>Starting Point</th>
			<th>Pickup Time</th>
			<th>Pickup Date</th>
			<th>Drop Off Date</th>
			<th>End Point</th>
			<th>Booking Date</th>
			<th>Amount Paid</th>
		</tr>
	</thead>
';

if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_array()) {
        $output .= '
        <tbody>
		    <tr>
		    	<td width="9%">'.$row["id"].'</td>
		    	<td width="9%">'.$row["booking_id"].'</td>
		    	<td width="9%">'.$row["carid"].'</td>
		    	<td width="9%">'.$row["custid"].'</td>
		    	<td width="9%">'.$row["starting_point"].'</td>
		    	<td width="9%">'.$row["pickup_time"].'</td>
		    	<td width="9%">'.$row["pickup_date"].'</td>
		    	<td width="9%">'.$row["dropoff_time"].'</td>
		    	<td width="9%">'.$row["end_point"].'</td>
		    	<td width="9%">'.$row["booking_date"].'</td>
		    	<td width="9%">'.$row["amount_paid"].'</td>
		    </tr>
	    </tbody>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="4" align="center">No data found!</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>
