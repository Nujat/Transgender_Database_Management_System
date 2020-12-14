<html>
<title>Login</title>
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
$user_id = filter_input(INPUT_POST, 'user_id');
$password = filter_input(INPUT_POST, 'password');


$sql = 'select user_id,password from test.user_table where user_id=:user_id and password=:password';

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':user_id', $user_id);
oci_bind_by_name($compiled, ':password', $password);

$res = oci_execute($compiled);
$row = oci_fetch_array($compiled, OCI_ASSOC);

if($row)
{
	$_SESSION['user_id']=$_POST['user_id'];
	 echo "log in successful\n";
	 echo '<br>';
	 echo '<br>';
	 echo '<br>';
	 echo '<br>';
	 echo '<br>';
	 echo '<br>';
	echo '<a href="portfolio.html">Click here</a>';
	echo '<br>';
	

}
else
{
	 echo "log in failed";
}



?>


</body>
</html>