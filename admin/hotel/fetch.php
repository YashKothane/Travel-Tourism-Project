<?php

include "../../connection.php";

$sql = $conn->query("SELECT * FROM hotels");

$output = '
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Hotel ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>City</th>
			<th>Address</th>
		</tr>
	</thead>
';

if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_array()) {
        $output .= '
        <tbody>
		    <tr>
		    	<td width="3%">'.$row["hotelid"].'</td>
		    	<td width="14%">'.$row["hotel_name"].'</td>
		    	<td width="33%">'.$row["description"].'</td>
		    	<td width="12%">'.$row["city"].'</td>
		    	<td width="30%">'.$row["address"].'</td>
			    <td width="3%">
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
