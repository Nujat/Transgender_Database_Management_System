<html>
<head><title>Search by stories</title>
	<link rel="icon" href="tab.png">

	 <style>
            html, body {
                background-color: #fff;
                
                background-image: url("edu.jpg");

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
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");

	$T_id = filter_input(INPUT_POST, 'T_id');

	$query = "SELECT T.NAME, VT.Duration,VT.Name_of_the_Degree
		FROM Test.TRANSGENDER T JOIN Test.Trans_Edu TE
		ON T.T_ID=TE.T_ID JOIN Test.EDUCATION E 
		ON TE.E_ID=E.E_ID JOIN Test.Educational_Institution EI
		ON EI.E_ID =E.E_ID JOIN Test.Institution I
		ON I.I_ID=EI.I_ID JOIN Test.Traning_Institution TI
		ON TI.I_ID=I.I_ID JOIN Test.Vocational_Training VT
		ON VT.Reg_id=TI.Reg_id
		where SUBSTR(VT.DURATION,1,1) >=6
		and lower(SUBSTR(VT.DURATION,3,1)) ='m'
		or lower(SUBSTR(VT.DURATION,3,1)) ='y'";
	$result = oci_parse($conn, $query);
	$res = oci_execute($result);
	
$ncols = oci_num_fields($result);


	print '<table border="1">';

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
</table>
</body>
</html>