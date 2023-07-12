<?php

include "../../connection.php";

$sql = $conn->query("SELECT * FROM feedback");

$output = '
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Suggestions</th>
		</tr>
	</thead>
';

if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_array()) {
        $output .= '
        <tbody>
		    <tr>
		    	<td width="25%">'.$row["id"].'</td>
		    	<td width="25%">'.$row["name"].'</td>
		    	<td width="25%">'.$row["email"].'</td>
		    	<td width="25%">'.$row["suggestions"].'</td>
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
