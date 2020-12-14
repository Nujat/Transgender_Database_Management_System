<html>
<title>Apply Job</title>
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
$NAME = filter_input(INPUT_POST, 'NAME');
$CURRENT_SITUATION = filter_input(INPUT_POST, 'CURRENT_SITUATION');
$EXPERIENCE = filter_input(INPUT_POST, 'EXPERIENCE');
$TYPE = filter_input(INPUT_POST, 'TYPE');
$SALARY_DESIRE = filter_input(INPUT_POST, 'SALARY_DESIRE');


$sql = 'INSERT INTO test.job_app(T_ID,NAME,CURRENT_SITUATION,EXPERIENCE,APP_DATE,TYPE,SALARY_DESIRE) '.
       'VALUES(:T_ID,:NAME,:CURRENT_SITUATION,:EXPERIENCE,sysdate,:TYPE,:SALARY_DESIRE)';


$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':T_ID', $T_ID);
oci_bind_by_name($compiled, ':NAME', $NAME);
oci_bind_by_name($compiled, ':CURRENT_SITUATION', $CURRENT_SITUATION);
oci_bind_by_name($compiled, ':EXPERIENCE', $EXPERIENCE);
oci_bind_by_name($compiled, ':TYPE', $TYPE);
oci_bind_by_name($compiled, ':SALARY_DESIRE', $SALARY_DESIRE);





oci_execute($compiled);

?>
<br>
<br>
<h1> Your Application for job have been submitted.Please Have Patience for approval. </h1>
</body>
</html>