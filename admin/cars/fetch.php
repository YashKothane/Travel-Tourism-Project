<?php

include "../../connection.php";

$sql = $conn->query("SELECT * FROM car_list");

$output = '
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Car ID</th>1
			<th>Name</th>
			<th>Description</th>
			<th>Seats</th>
			<th>Price</th>
			<th>AC/No AC</th>
			<th>Luggage</th>
			<th>Delete</th>
			
		</tr>
	</thead>
';

if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_array()) {
        $output .= '
        <tbody>
		    <tr>
		    	<td width="3%">'.$row["carid"].'</td>
		    	<td width="15%">'.$row["carname"].'</td>
		    	<td width="33%">'.$row["description"].'</td>
		    	<td width="9%">'.$row["seater"].'</td>
		    	<td width="9%">'.$row["price"].'</td>
		    	<td width="9%">'.$row["ACNONAC"].'</td>
		    	<td width="9%">'.$row["luggage"].'</td>
			    <td width="3%">
			    	<button type="button" name="delete" class="delete btn btn-danger btn-xs" id="'.$row["carid"].'">Delete</button>
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
