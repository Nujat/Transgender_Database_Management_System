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
$T_id = filter_input(INPUT_POST, 'T_id');
$NID_no = filter_input(INPUT_POST, 'NID_no');
$Birth_reg_no = filter_input(INPUT_POST, 'Birth_reg_no');
$Name = filter_input(INPUT_POST, 'Name');
$Father_name = filter_input(INPUT_POST, 'Father_name');
$Mother_name = filter_input(INPUT_POST, 'Mother_name');
$Date_of_Birth = filter_input(INPUT_POST, 'Date_of_Birth');
$Birth_place = filter_input(INPUT_POST, 'Birth_place');
$Blood_group = filter_input(INPUT_POST, 'Blood_group');
$Nationality = filter_input(INPUT_POST, 'Nationality');
$Identification_mark = filter_input(INPUT_POST, 'Identification_mark');

$sql = "INSERT INTO test.Transgender(T_id,NID_no, Birth_reg_no,Name,Father_name, Mother_name,Date_of_Birth,Birth_place,Blood_group,Nationality,Identification_mark) ".
       "VALUES(:T_id,:NID_no,:Birth_reg_no,:Name,:Father_name,:Mother_name,to_date(:Date_of_Birth,'mm-dd-yyyy'),:Birth_place,:Blood_group,:Nationality,:Identification_mark)";

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':T_id', $T_id);
oci_bind_by_name($compiled, ':NID_no', $NID_no);
oci_bind_by_name($compiled, ':Birth_reg_no', $Birth_reg_no);
oci_bind_by_name($compiled, ':Name', $Name);
oci_bind_by_name($compiled, ':Father_name', $Father_name);
oci_bind_by_name($compiled, ':Mother_name', $Mother_name);
oci_bind_by_name($compiled, ':Date_of_Birth', $Date_of_Birth);
oci_bind_by_name($compiled, ':Birth_place', $Birth_place);
oci_bind_by_name($compiled, ':Blood_group', $Blood_group);
oci_bind_by_name($compiled, ':Nationality', $Nationality);
oci_bind_by_name($compiled, ':Identification_mark', $Identification_mark);



oci_execute($compiled);

?>
<img src="happy.gif">
<h1> Data inserted Successfully! Go Back </h1>
</body>
</html>