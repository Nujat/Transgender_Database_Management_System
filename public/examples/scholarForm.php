<html>
<title>Scholar Info</title>
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
$Scholarship_Reg_No= filter_input(INPUT_POST, 'Scholarship_Reg_No');
$Types = filter_input(INPUT_POST, 'Types');
$Starting_Date= filter_input(INPUT_POST, 'Starting_Date');
$Ending_date = filter_input(INPUT_POST, 'Ending_date');
$Monthly_Paid_Amount = filter_input(INPUT_POST, 'Monthly_Paid_Amount');
$Total_Amount = filter_input(INPUT_POST, 'Total_Amount');

$sql = "INSERT INTO test.Scholarship(Scholarship_Reg_No,Types,Starting_Date,Ending_date,Monthly_Paid_Amount,Total_Amount) ".
       "VALUES(:Scholarship_Reg_No,:Types,to_date(:Starting_Date,'mm-dd-yyyy'),to_date(:Ending_Date,'mm-dd-yyyy'),:Monthly_Paid_Amount,:Total_Amount)";

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':Scholarship_Reg_No', $Scholarship_Reg_No);
oci_bind_by_name($compiled, ':Types', $Types);
oci_bind_by_name($compiled, ':Starting_Date', $Starting_Date);
oci_bind_by_name($compiled, ':Ending_date', $Ending_date);
oci_bind_by_name($compiled, ':Monthly_Paid_Amount', $Monthly_Paid_Amount);
oci_bind_by_name($compiled, ':Total_Amount', $Total_Amount);




oci_execute($compiled);

?>
<img src="happy.gif">
<h1> Data inserted Successfully! Go Back </h1>
</body>
</html>