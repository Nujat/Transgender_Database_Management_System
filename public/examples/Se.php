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

			.tableDesign{
				font-family:Lato-Bold;
				font-size: 18px;
				color:#fff;
				background-color: #6c7ae0;

			}

        </style>



</head>
<body>

	<table>
		<br><br><br><br><br>
		<tr>
			<th style="width: 2.3%" class="tableDesign"> Transgender ID </th>
			<th style="width: 2.9%" class="tableDesign"> Name &nbsp &nbsp &nbsp</th>
			<th  style="width: 2.9%" class="tableDesign" > NID No. </th>
			<th  style="width: 1.9%" class="tableDesign" > Date of Birth </th>
			<th  style="width: 1.9%" class="tableDesign" > Blood Group </th>
			<th  style="width: 1.9%" class="tableDesign" > Nationality </th>
			<th  style="width: 1.9%" class="tableDesign" > Identification Mark </th>
		</tr>
	</table>

	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");

	$name = filter_input(INPUT_POST, 'name');
	$query = 'select T_id,NID_No,Name,Date_of_Birth ,Blood_group,Nationality,Identification_Mark from test.Transgender where name=:name';
	$compiled = oci_parse($conn, $query);
	oci_bind_by_name($compiled, ':name', $name);
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
?>
</table>
</body>
</html>