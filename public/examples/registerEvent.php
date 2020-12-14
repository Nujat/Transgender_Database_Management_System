<html>
<title>Event Register Confirmation</title>
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
$T_ID= filter_input(INPUT_POST, 'T_ID');
$EVENT_NO = filter_input(INPUT_POST, 'EVENT_NO');


$sql = 'insert into test.event_reg values(:T_ID,:EVENT_NO)';


$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':T_ID', $T_ID);
oci_bind_by_name($compiled, ':EVENT_NO', $EVENT_NO);





oci_execute($compiled);

?>

<h1> Your Registration have been submitted.Please Have Patience for approval. </h1>
</body>
</html>