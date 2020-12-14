<html>
<title>Update fund</title>
<body>
<style>
	body{
		font-family: '', cursive;
		background-image:url('f.jpg');
		}
	img{
		  display: block;
		  margin-left: auto;
		  margin-right: auto;
	}  
</style>
<?php
$conn=oci_connect("SYSTEM","toor","localhost/XE");
$ACC_NO= filter_input(INPUT_POST, 'ACC_NO');
$Amount = filter_input(INPUT_POST, 'Amount');

$sql = 'update test.fund set Amount=:Amount
		where ACC_NO=:ACC_NO';

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':ACC_NO', $ACC_NO);
oci_bind_by_name($compiled, ':Amount', $Amount);




oci_execute($compiled);

?>
<img src="happy.gif">
<h1> Data inserted Successfully! Go Back </h1>
</body>
</html>