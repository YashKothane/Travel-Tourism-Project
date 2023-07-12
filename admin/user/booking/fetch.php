<?php

include "../../../connection.php";

$sql = $conn->query("SELECT * FROM booking_info");

$output = '
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Booking ID</th>
			<th>Booking Date</th>
			<th>Room ID</th>
			<th>Hotel ID</th>
			<th>Customer ID</th>
			<th>Checkin Date</th>
			<th>Checkout Date</th>
			<th>Adults</th>
			<th>Child</th>
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
		    	<td width="9%">'.$row["bookingid"].'</td>
		    	<td width="9%">'.$row["booking_date"].'</td>
		    	<td width="9%">'.$row["roomid"].'</td>
		    	<td width="9%">'.$row["hotelid"].'</td>
		    	<td width="9%">'.$row["custid"].'</td>
		    	<td width="9%">'.$row["checkin_date"].'</td>
		    	<td width="9%">'.$row["checkout_date"].'</td>
		    	<td width="9%">'.$row["adult"].'</td>
		    	<td width="9%">'.$row["child"].'</td>
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
