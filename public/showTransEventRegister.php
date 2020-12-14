<html>
<head><title>Scholars View</title>
	<link rel="icon" href="tab.png">

	 <style>
            html, body {
                background-color: #fff;
                
                background-image: url("d.jpg");

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


	<table>
	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");

	$T_ID= filter_input(INPUT_POST, 'T_ID');
	$event_no= filter_input(INPUT_POST, 'event_no');

	$query = "select 'your request has been ' ||status||' for event number '||event_no from test.event_reg
where T_ID =:T_ID
and event_no=:event_no";


	$compiled = oci_parse($conn, $query);

oci_bind_by_name($compiled, ':T_ID', $T_ID);
oci_bind_by_name($compiled, ':event_no', $event_no);

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