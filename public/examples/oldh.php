<html>
<head><title>Search by stories</title>
	<link rel="icon" href="tab.png">

	 <style>
            html, body {
                background-color: #fff;
                
                background-image: url("S.jpg");

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

	$query ='select distinct(t.name),t.t_id "Transgender ID",cast((SYSDATE-Date_of_Birth)/365 as decimal(2,0)) "Date of Birth", mf.next_chk_date "Next Check Date",mf.medical_id "Medical id"
		from test.transgender t
 		join test.Trans_Med tm 
		on tm.t_id = t.t_id
		join test.Medical_Facility mf 
		on mf.Medical_id = tm.Medical_id 
		join test.Trans_Live_Old_Home tl
		on tl.t_id = t.t_id
		join test.Old_Home oh
		on oh.a_id = tl.a_id';
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