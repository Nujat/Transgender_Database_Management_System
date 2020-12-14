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
$employee_id = filter_input(INPUT_POST, 'username');
$employee_name = filter_input(INPUT_POST, 'password');

$sql = 'INSERT INTO test.Employee(Employee_ID,Employee_Name) '.
       'VALUES(:employee_id,:employee_name)';

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':employee_id', $employee_id);
oci_bind_by_name($compiled, ':employee_name', $employee_name);


oci_execute($compiled);
?>
<img src="happy.gif">
<h1> Data inserted Successfully! Go Back </h1>
</body>
</html>