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
		<tr>
			
			<th style="width: 15.6%" class="tableDesign"> Doctor Name </th>
			<th style="width: 22.6%" class="tableDesign"> Degree </th>
			<th style="width: 18.1%" class="tableDesign"> Chamber </th>
			<th style="width: 18.9%" class="tableDesign"> Specialized Side </th>
		</tr>


	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");


	$Name = filter_input(INPUT_POST, 'Name');

	$query = "select name, degree, chamber,specialized_side
from test.doctor
where lower(specialized_side) like '%$Name%'
  or lower(chamber) like '%$Name%'";
	$compiled = oci_parse($conn, $query);
	//oci_bind_by_name($compiled, ':Name', $Name);
	$res = oci_execute($compiled);
	print '<table>';
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