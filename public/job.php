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
<br>
<br>


	<table>
	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");
	$query = 'select Name_of_org "Organization Name",job_vac"Vacancy",PUBLISH_DATE"Publish Date", APP_DEADLINE"Deadline",COMPANY_NAME"Company Name",POST,AGE_LIM"Age limit",JOB_LOCATION"Location",JOB_NATURE"Nature"
from test.available_job join test.Service_Provider using(REG_NO)
where APP_DEADLINE > sysdate';
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