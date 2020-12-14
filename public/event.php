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

</style>


<body>
	<h2 align="center"> Here you can view the upcoming events and the organaizers name</h4>
	<table>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<h2 align="center"> Upcoming Events </h4>
		<br>

	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");
	
	$query = 'select ce.event_no,Name_of_org,Joining_Link,ce.agenda,CON_DATE
from test.conference_event ce join test.Provider_Conference pc 
on pc.event_no = ce.event_no join test.Service_Provider sp
on sp.Reg_No = pc.Reg_No
where sysdate < con_date';
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
</body>
</html>