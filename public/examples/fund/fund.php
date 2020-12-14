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

	$query = 'select f.acc_no ,f. bank_name,f.Branch_Name,og.Project_id ,og.project_name
	from test.fund f join test.project_fund pf
on f.acc_no = pf.acc_no
join test.Project_Fund pr 
on pr.acc_no =f.acc_no
join test.On_Going_Project og 
on og.Project_id =pr.Project_id 
where og.Ending_date > sysdate';

	$compiled = oci_parse($conn, $query);
	$res = oci_execute($compiled);
	print '<table border="0">';
	while ($row = oci_fetch_array($compiled, OCI_RETURN_NULLS+OCI_ASSOC)) {
	print '<tr>';
	foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
	}
   print '</tr>';
}
print '</table>';
echo "No data found";
?>
</table>
</body>
</html>