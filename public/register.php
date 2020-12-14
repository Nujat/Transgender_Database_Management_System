<html>
<head><title>Create Account</title>
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

	$USER_ID= filter_input(INPUT_POST, 'USER_ID');
	$PASSWORD= filter_input(INPUT_POST, 'PASSWORD');

	$query = 'INSERT INTO test.user_table(USER_ID,PASSWORD) '.
       'VALUES(:USER_ID,:PASSWORD)';


	$compiled = oci_parse($conn, $query);

oci_bind_by_name($compiled, ':USER_ID', $USER_ID);
oci_bind_by_name($compiled, ':PASSWORD', $PASSWORD);

 oci_execute($compiled);






?>
</table>
</body>
</html>