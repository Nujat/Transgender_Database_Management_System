<html>
<head><title>Search by stories</title>
	<link rel="icon" href="tab.png">

	 <style>
            html, body {
                background-color: #fff;
                
                background-image: url("bgst.jpg");

                color: #000000;
                font-family: '', cursive;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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



</head>
<body>

	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");

	$T_id = filter_input(INPUT_POST, 'T_id');

	$query = "select *from test.law_police_jail
where act_description like '%is%'";
	$compiled = oci_parse($conn, $query);
	//oci_bind_by_name($compiled, ':T_id', $T_id);
	$res = oci_execute($compiled);


	
	$ncols = oci_num_fields($compiled);


	print '<table border="1">';

	print '<tr>';
	for ($i = 1; $i <= $ncols; $i++) {
    $column_name  = oci_field_name($compiled, $i);
    print '<th>'.($column_name).'</th>';
	}
	print '</tr>';

	while ($row = oci_fetch_array($compiled, OCI_RETURN_NULLS+OCI_ASSOC)) {
	print '<tr>';
	foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
	}
   print '</tr>';
}
print '</table>';
?>
</table>
</body>
</html>