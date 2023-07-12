<?php

include "../../connection.php";

$sql = $conn->query("SELECT * FROM USER");

$output = '
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>D.O.B.</th>
			<th>Gender</th>
		</tr>
	</thead>
';

if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_array()) {
        $output .= '
        <tbody>
		    <tr>
		    	<td width="15%">'.$row["id"].'</td>
		    	<td width="15%">'.$row["name"].'</td>
		    	<td width="15%">'.$row["email"].'</td>
		    	<td width="15%">'.$row["phone_no"].'</td>
		    	<td width="15%">'.$row["dob"].'</td>
		    	<td width="15%">'.$row["gender"].'</td>
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
