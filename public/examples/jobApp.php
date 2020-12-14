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
$referenced_by = filter_input(INPUT_POST, 'referenced_by');
$status= filter_input(INPUT_POST, 'status');

$sql = "update test.job_app set status=:status,referenced_by=:referenced_by
		where T_id=:T_id";

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':T_id', $T_id);
oci_bind_by_name($compiled, ':referenced_by', $referenced_by);
oci_bind_by_name($compiled, ':status', $status);





oci_execute($compiled);

?>

<h1> Data inserted Successfully! Go Back </h1>
</body>
</html>