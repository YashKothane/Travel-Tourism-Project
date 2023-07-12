<?php

include "../../../connection.php";

$sql = $conn->query("SELECT * FROM room_details");

$output = '
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Room ID</th>
			<th>Hotel ID</th>
			<th>Title</th>
			<th>Description</th>
			<th>Price</th>
			<th>Persons Allowed</th>
			<th>Beds</th>
			<th>Extra Allowed</th>
			<th>Total Rooms</th>
			<th>Delete</th>
			
		</tr>
	</thead>
';

if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_array()) {
        $output .= '
        <tbody>
		    <tr>
		    	<td width="5%">'.$row["roomid"].'</td>
		    	<td width="5%">'.$row["hotelid"].'</td>
		    	<td width="10%">'.$row["title"].'</td>
		    	<td width="27%">'.$row["description"].'</td>
		    	<td width="10%">'.$row["price"].'</td>
		    	<td width="10%">'.$row["person_allowed"].'</td>
		    	<td width="10%">'.$row["no_of_beds"].'</td>
		    	<td width="10%">'.$row["extra_allowed"].'</td>
		    	<td width="10%">'.$row["total_room"].'</td>
			    <td width="3%">
			    	<button type="button" name="delete" class="delete btn btn-danger btn-xs" id="'.$row["roomid"].'">Delete</button>
			    </td>
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
