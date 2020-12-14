<html>
<title>Approve</title>
<body>
<style>
	body{
		font-family: '', cursive;
		background-image:url('d.jpg');
		}
	img{
		  display: block;
		  margin-left: auto;
		  margin-right: auto;
	}  
</style>
<?php
$conn=oci_connect("SYSTEM","toor","localhost/XE");
$T_id= filter_input(INPUT_POST, 'T_id');
$status= filter_input(INPUT_POST, 'status');

$sql = "update test.stories set status=:status
		where T_id=:T_id";

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':T_id', $T_id);
oci_bind_by_name($compiled, ':status', $status);





oci_execute($compiled);

?>

<h1> Data inserted Successfully! Go Back </h1>
</body>
</html>