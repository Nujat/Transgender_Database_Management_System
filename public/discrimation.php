<html>
<title>Insert</title>
<body>
<style>
	body{
		font-family: '', cursive;
		background-image:url('employee.jpg');
		}
	img{
		  display: block;
		  margin-left: auto;
		  margin-right: auto;
	}  
</style>
<?php
$conn=oci_connect("SYSTEM","toor","localhost/XE");
$complain_No = filter_input(INPUT_POST,'complain_No');
$law_No = filter_input(INPUT_POST,'law_No');
$Thana = filter_input(INPUT_POST, 'Thana');
$OCUR_Date = filter_input(INPUT_POST, 'OCUR_Date');
$place = filter_input(INPUT_POST, 'place');
$Types = filter_input(INPUT_POST, 'Types');
$Action = filter_input(INPUT_POST, 'Action');

$sql = 'INSERT INTO test.Discrimination(complain_No,law_No,Thana,OCUR_Date,place,Types,Action) '.
       'VALUES(:complain_No,:law_No,:Thana,:OCUR_Date,:place,:Types,:Action)';

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':complain_No', $complain_No);
oci_bind_by_name($compiled, ':law_No', $law_No);
oci_bind_by_name($compiled, ':Thana', $Thana);
oci_bind_by_name($compiled, ':OCUR_Date', $OCUR_Date);
oci_bind_by_name($compiled, ':place', $place);
oci_bind_by_name($compiled, ':Types', $Types);
oci_bind_by_name($compiled, ':Action', $Action);



oci_execute($compiled);
?>
<img src="happy.gif">
<h1> Data inserted Successfully! Go Back </h1>
</body>
</html>