<html>
<head><title>Complain</title>
	<link rel="icon" href="tab.png">

	 <style>
            html, body {
                background-color: #fff;
                
                background-image: url("huge.jpg");

                color: #000000;
                font-family: '', cursive;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

			table {
  				
  				width: 80%;
  				background-color: #9e9e9e52;
					}
			table,th,td{
				border: 1px solid black;
				border-collapse: collapse;
				background-color: #9e9e9e52;
			}		
			th,td{
				padding: 15px;
				text-align: left;
			}

			.tableDesign{
				font-family:Lato-Bold;
				font-size: 18px;
				color:#fff;
				background-color: #845d4fcf;

			}

        </style>



</head>
<body>

<table align="center">
	<h1 align="center">     Help and Support from where you can take   </h1>
		<tr>
			<th style="width: 23.8%" class="tableDesign"> Person Name </th>
			<th style="width: 38.7%" class="tableDesign"> Service Provider's Name </th>
			<th class="tableDesign"> Agenda </th>
			<th class="tableDesign"> Queries </th>
			<th class="tableDesign"> Advisor </th>
		</tr>
	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");
	$query = 'select * from test.help_booth';
	$result = oci_parse($conn,$query);
	$res = oci_execute($result);
	print '<table border="1" align="center">';
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