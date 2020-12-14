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

$REG_NO = filter_input(INPUT_POST, 'REG_NO');
$JOB_VAC = filter_input(INPUT_POST, 'JOB_VAC');
$APP_DEADLINE = filter_input(INPUT_POST, 'APP_DEADLINE');
$COMPANY_NAME = filter_input(INPUT_POST, 'COMPANY_NAME');
$Post = filter_input(INPUT_POST, 'Post');
$AGE_LIM = filter_input(INPUT_POST, 'AGE_LIM');
$JOB_LOCATION = filter_input(INPUT_POST, 'JOB_LOCATION');
$JOB_NATURE = filter_input(INPUT_POST, 'JOB_NATURE');
$SALARY = filter_input(INPUT_POST, 'SALARY');

$sql = 'INSERT INTO test.available_job (REG_NO,JOB_VAC,APP_DEADLINE,COMPANY_NAME,AGE_LIM,JOB_LOCATION,JOB_NATURE,SALARY) '.
       'VALUES(:REG_NO,:JOB_VAC,:APP_DEADLINE,:COMPANY_NAME,:AGE_LIM,:JOB_LOCATION,:JOB_NATURE,:SALARY)';

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':REG_NO', $REG_NO);
oci_bind_by_name($compiled, ':JOB_VAC', $JOB_VAC);
oci_bind_by_name($compiled, ':APP_DEADLINE', $APP_DEADLINE);
oci_bind_by_name($compiled, ':COMPANY_NAME', $COMPANY_NAME);
oci_bind_by_name($compiled, ':AGE_LIM', $AGE_LIM);
oci_bind_by_name($compiled, ':JOB_LOCATION', $JOB_LOCATION);
oci_bind_by_name($compiled, ':JOB_NATURE', $JOB_NATURE);
oci_bind_by_name($compiled, ':SALARY', $SALARY);


oci_execute($compiled);
?>
<h1> Data inserted Successfully! Go Back </h1>
</body>
</html>