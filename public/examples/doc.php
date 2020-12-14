<html>
<title>Insert Event</title>
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
$BMDC_NO = filter_input(INPUT_POST, 'BMDC_NO');
$NAME = filter_input(INPUT_POST, 'NAME');
$DEGREE = filter_input(INPUT_POST, 'DEGREE');
$CHAMBER = filter_input(INPUT_POST, 'CHAMBER');
$INSTITUTION = filter_input(INPUT_POST, 'INSTITUTION');
$SPECIALIZED_SIDE = filter_input(INPUT_POST, 'SPECIALIZED_SIDE');
$CONTACT_NO = filter_input(INPUT_POST, 'CONTACT_NO');

$sql = 'INSERT INTO test.Doctor(BMDC_NO,NAME,DEGREE,CHAMBER,INSTITUTION,SPECIALIZED_SIDE,CONTACT_NO) '.
       'VALUES(:BMDC_NO,:NAME,:DEGREE,:CHAMBER,:INSTITUTION,:SPECIALIZED_SIDE,:CONTACT_NO)';

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':BMDC_NO', $BMDC_NO);
oci_bind_by_name($compiled, ':NAME', $NAME);
oci_bind_by_name($compiled, ':DEGREE', $DEGREE);
oci_bind_by_name($compiled, ':CHAMBER', $CHAMBER);
oci_bind_by_name($compiled, ':INSTITUTION', $INSTITUTION);
oci_bind_by_name($compiled, ':SPECIALIZED_SIDE', $SPECIALIZED_SIDE);
oci_bind_by_name($compiled, ':CONTACT_NO', $CONTACT_NO);


oci_execute($compiled);
?>
<h1> Data inserted Successfully! Go Back </h1>
</body>
</html>