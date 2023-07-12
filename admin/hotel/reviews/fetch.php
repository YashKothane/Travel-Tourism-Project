<?php

include "../../../connection.php";

$sql = $conn->query("SELECT * FROM hotel_review");

$output = '
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Rating</th>
			<th>Description</th>
			<th>Hotel ID</th>
			<th>Created On</th>
			
		</tr>
	</thead>
';

if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_array()) {
        $output .= '
        <tbody>
		    <tr>
		    	<td width="5%">'.$row["id"].'</td>
		    	<td width="12%">'.$row["name"].'</td>
		    	<td width="12%">'.$row["email"].'</td>
		    	<td width="3%">'.$row["rating"].'</td>
		    	<td width="50%">'.$row["description"].'</td>
		    	<td width="5%">'.$row["hotelid"].'</td>
		    	<td width="15%">'.$row["created_date"].'</td>
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
