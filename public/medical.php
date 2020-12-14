<html>
<head><title>New Event</title>
<link rel="icon" href="tab.png">
</head>

<style>
	

html,body{
	background-image:url("bgst.jpg");
	}
	.t
	{
		font-size: 30;
	}



			.tableDesign{
				font-family:Lato-Bold;
				font-size: 28px;
				color:#fff;
				background-color: #6c7ae0;

			}
				.tableDesign1{
				font-family:Lato-Bold;
				font-size: 28px;
				color:#fff;
				background-color: #6c7ae0;

			}
					.tableDesign2{
				font-family:Lato-Bold;
				font-size: 28px;
				color:#fff;
				background-color: #6c7ae0;

			}
						.tableDesign4{
				font-family:Lato-Bold;
				font-size: 28px;
				color:#fff;
				background-color: #6c7ae0;

			}
</style>


<body>
	<h2 align="center">Vacancy of accommodation</h4>
	<table>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

		<tr>
			<th style="width: 8.4%" class="tableDesign"> Name </th>
			<th style="width: 4.9%" class="tableDesign1"> Hospital Name </th>
			<th  style="width: 2.9%" class="tableDesign2" > Medicine Name </th>
			<th  style="width: 1.9%" class="tableDesign4" > Medicine Taking Time </th>
		</tr>
	</table>
	
	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");
	
	$query = 'select t.name, Hospital_name,Medicine_Name, Med_taking_time from test.Medical_Facility m join test.Trans_Med tm on m.Medical_id=tm.Medical_id join test.Transgender t on t.T_id=tm.T_id';
	$result = oci_parse($conn,$query);
	$res = oci_execute($result);
	print '<table border="5">';
	while ($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)) {
	print '<tr>';
	foreach ($row as $item) {
       print '<td class="t" width="40%">'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp &nbsp &nbsp').'</td>';
	}
   print '</tr>';
}
print '</table>';
	?>
</body>
</html>