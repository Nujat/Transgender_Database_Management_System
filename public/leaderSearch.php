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
			<th style="width: 8.4%" class="tableDesign"> Name </th>
			<th style="width: 4.9%" class="tableDesign"> Leader Name </th>
			<th  style="width: 2.9%" class="tableDesign" > Road No. </th>
			<th  style="width: 1.9%" class="tableDesign" > House No. </th>
			<th  style="width: 1.9%" class="tableDesign" > Post Office </th>
			<th  style="width: 1.9%" class="tableDesign" > Upazilla </th>
			<th  style="width: 1.9%" class="tableDesign" > District </th>
		</tr>
	</table>

	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");

	$T_id = filter_input(INPUT_POST, 'T_id');

	$query = 'select t.name,pc.Ledae_Name, a.Road_no, a.House_no , a.Post_Office , Thana, a.District
		from Test.transgender t join Test.Trans_Live_Colony tc
		on t.t_id = tc.t_id join Test.present_colony pc
			on pc.a_id =  tc.a_id join Test.T_T_address a
			on a.t_id = t.t_id
			where pc.ledae_name = (select pc.ledae_name 
			from Test.transgender t1 join Test.Trans_Live_Colony tc1
			on t1.t_id = tc1.t_id join Test.present_colony pc1
					on pc1.a_id = tc1.a_id where t1.t_id =:T_id)';
	$compiled = oci_parse($conn, $query);
	oci_bind_by_name($compiled, ':T_id', $T_id);
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