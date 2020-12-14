<html>
<head><title>Trans Workers</title>
<link rel="icon" href="tab.png">
</head>

<style>
	

html,body{
 position: fixed; 
    overflow-y: scroll;
    width: 100%;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url("work.jpg");
	background-size: cover;
	-webkit-filter: blur(0px);



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
	<h2 align="center">Transgender Workers</h4>
	<table>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

	<table>
	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");
	$designation = filter_input(INPUT_POST, 'designation');
	
	$query ="select t.name,e.Designation ,ta.t_id,ta.thana,ta.district,ta.road_no,ta.house_no,ta.post_office
from test.transgender  t join test.Trans_Emp te
on t.t_id = te.t_id
join test.tEmployee e on
e.Employee_id = te.Employee_id 
join test.t_t_address ta
on t.t_id = ta.t_id
where designation like '%$designation%'";

	$result = oci_parse($conn,$query);
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