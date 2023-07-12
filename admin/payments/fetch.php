<?php

include "../../connection.php";

$sql = $conn->query("SELECT * FROM payment");

$output = '
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Booking ID</th>
			<th>Holder Name</th>
			<th>Customer ID</th>
			<th>Payment Date</th>
			<th>Payment ID</th>
			<th>Amount</th>
		</tr>
	</thead>
';

if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_array()) {
        $output .= '
        <tbody>
		    <tr>
		    	<td width="14%">'.$row["booking_id"].'</td>
		    	<td width="14%">'.$row["holdername"].'</td>
		    	<td width="14%">'.$row["cust_id"].'</td>
		    	<td width="14%">'.$row["paymentdate"].'</td>
		    	<td width="14%">'.$row["payment_id"].'</td>
		    	<td width="14%">'.$row["amount_paid"].'</td>
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
