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
	
	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");
	
	$query = "select E.E_class,E.Board,E.E_result,I.Name,Duration from test.Transgender 
join test.trans_edu using (T_id)
join test.Education E using (E_id)
join test.Educational_Institution using(E_id)
join test.Institution I using(I_id)
join test.Traning_Institution using(I_id)
join test.Vocational_Training VT using(Reg_id)
where upper(E.board)='DHAKA' and 
E_Result In(select E_result from test.Education
where E_result='5.00') and 
duration IN(select duration from test.Vocational_Training
where SUBSTR(VT.DURATION,1,3) = '4'
and lower(SUBSTR(VT.DURATION,3,1)) ='y')";
	$result = oci_parse($conn,$query);
	$res = oci_execute($result);
	print '<table border="5">';
	while ($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)) {
	print '<tr>';
	foreach ($row as $item) {
       print '<td class="t" width="40%">'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp &nbsp &nbsp').'</td>';
	}
   print '</tr>';
   echo "No data found";
}
print '</table>';
	?>
</body>
</html>