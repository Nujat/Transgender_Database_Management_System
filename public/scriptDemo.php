<html>
<head><title>Employees</title>
	<link rel="icon" href="tab.png">

	 <style>
            html, body {
                background-color: #fff;
                
                background-image: url("d.jpg");

                color: #ffffff;
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
			<th style="width: 39.4%" class="tableDesign"> Employee ID </th>
			<th style="width: 28.9%" class="tableDesign"> Employee Name </th>
			<th class="tableDesign"> Date of Birth </th>
		</tr>


	<?php
	$conn=oci_connect("SYSTEM","toor","localhost/XE");

	$T_id = filter_input(INPUT_POST,'T_id');
	print $T_id;

	$query = "BEGIN test.TRAN_STOR(:T_id); END;";


	$stmt = oci_parse($conn,$query);
		//binding
	oci_bind_by_name($stmt,':T_id',$T_id);

	 //oci_execute($stmt);
	ociexecute($stmt, OCI_DEFAULT);
	 //$result = oci_fetch_all($stmt);
	// print $result;
   while ($row = oci_fetch_array($stmt)) {
      echo $row['T_id'] ;
   }


?>
</table>
</body>
</html>