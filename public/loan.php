<html>
<head><title>Complain</title>
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

			.tableDesign{
				font-family:Lato-Bold;
				font-size: 18px;
				color:#fff;
				background-color: #6c7ae0;
				width: 32.6%;

			}

        </style>



</head>
<body>

	<table>

		<tr>
			<th style="width: 28.2%" class="tableDesign"> Name </th>
			<th style="width: 20.2%" class="tableDesign"> Total Loan Amount </th>
			<th class="tableDesign"> Loan Expiry Date </th>
			<th style="width: 39.4%" class="tableDesign"> Loan payment per month </th>
		</tr>
	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");
	$query = 'select * from test.Loan_status';
	$result = oci_parse($conn,$query);
	$res = oci_execute($result);
	print '<table border="1">';
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