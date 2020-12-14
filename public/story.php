<html>
<title>Review</title>
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
$T_ID = filter_input(INPUT_POST,'T_ID');
$Early_Life = filter_input(INPUT_POST,'Early_Life');
$Awards = filter_input(INPUT_POST, 'Awards');
$Struggling_Period = filter_input(INPUT_POST, 'Struggling_Period');
$Personal_life = filter_input(INPUT_POST, 'Personal_life');
$Qoutes = filter_input(INPUT_POST, 'Qoutes');

$sql = 'INSERT INTO test.Stories(T_ID,Early_Life,Awards,Struggling_Period,Personal_life,Qoutes) '.
       'VALUES(:T_ID,:Early_Life,:Awards,:Struggling_Period,:Personal_life,:Qoutes)';

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':T_ID', $T_ID);
oci_bind_by_name($compiled, ':Early_Life', $Early_Life);
oci_bind_by_name($compiled, ':Awards', $Awards);
oci_bind_by_name($compiled, ':Struggling_Period', $Struggling_Period);
oci_bind_by_name($compiled, ':Personal_life', $Personal_life);
oci_bind_by_name($compiled, ':Qoutes', $Qoutes);



oci_execute($compiled);
?>
<img src="happy.gif">
<h1> Your stories have been accepted! Please stay with us for more info </h1>
<a href="portfolio.html"><button color="green"><- Go To Dashboard</button></a>
</body>
</html>