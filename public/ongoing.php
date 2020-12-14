<html>
<head><title>New Event</title>
<link rel="icon" href="tab.png">
</head>

<style>
	

html,body{
	background-image:url("bgst.jpg");
	}
table {
  				
  				width: 80%;
  				background-color: #e0e0e0;
					}
			table,th,td{
				border: 1px solid black;
				border-collapse: collapse;
			}		
			th,td{
				padding: 15px;
				text-align: left;
			}
			tr:nth-child(even) {
  			background-color: #7bb3b0;
			}

			.tableDesign{
				font-family:Lato-Bold;
				font-size: 18px;
				color:#fff;
				background-color: #6c7ae0;

			}
</style>


<body>
	<h2 align="center">On going project lists</h2>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

		
	
	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");
	
	$query = 'select PROJECT_ID "Project ID",PROJECT_NAME "Project Name",STARTING_DATE "Starting Date",ENDING_DATE "Ending Date",PLAN,COST from test.On_Going_Project';
	$result = oci_parse($conn,$query);
	$res = oci_execute($result);


	$ncols = oci_num_fields($result);


	print '<table border="0">';

	print '<tr>';
	for ($i = 1; $i <= $ncols; $i++) {
    $column_name  = oci_field_name($result, $i);
    print '<th>'.($column_name).'</th>';
	}
	print '</tr>';

	while ($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)) {
	print '<tr>';
	foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
	}
   print '</tr>';
}
print '</table>';




	?>
</body>
</html>