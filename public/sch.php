<html>
<title>Scholarship</title>
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
$T_id= filter_input(INPUT_POST, 'T_id');
$MON_AMOUNT = filter_input(INPUT_POST, 'MON_AMOUNT');
$DURATION = filter_input(INPUT_POST, 'DURATION');

$sql = 'INSERT INTO test.schor_app(T_id,MON_AMOUNT,DURATION) '.
       'VALUES(:T_id,:MON_AMOUNT,:DURATION)';


$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':T_id', $T_id);
oci_bind_by_name($compiled, ':MON_AMOUNT', $MON_AMOUNT);
oci_bind_by_name($compiled, ':DURATION', $DURATION);




oci_execute($compiled);

?>

<h1> Your Form have been submitted.Please Have Patience for approval. </h1>
</body>
</html>