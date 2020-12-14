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
$Event_no = filter_input(INPUT_POST, 'Event_no');
$Joining_Link = filter_input(INPUT_POST, 'Joining_Link');
$con_date = filter_input(INPUT_POST, 'con_date');
$Agenda = filter_input(INPUT_POST, 'Agenda');

$sql = 'INSERT INTO test.Conference_Event(Event_no,Joining_Link, con_date,Agenda) '.
       'VALUES(:Event_no,:Joining_Link,:con_date,:Agenda)';

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':Event_no', $Event_no);
oci_bind_by_name($compiled, ':Joining_Link', $Joining_Link);
oci_bind_by_name($compiled, ':con_date', $con_date);
oci_bind_by_name($compiled, ':Agenda', $Agenda);

oci_execute($compiled);
?>
<img src="happy.gif">
<h1> Data inserted Successfully! Go Back </h1>
</body>
</html>