<h2>Information Physicist Search by first and last names</h2>

<?php 
// The form:
function get_input($first = "", $last = "") 
{
echo <<<END
<form action="trial.php" method="post">
<table><tr><td>
First name:</td><td>
<input type="text" name="first" value="$first"></td></tr>
<tr><td>
Last name:</td><td>
<input type="text" name="last" value="$last"></td></tr>
<tr><td><br />
  </td><td>
<input type="submit"></td></tr></table>
</form>
END;
}

if(!isset($_REQUEST['first'])) {
echo "<b>Enter two arguments: complete first and last names, or 
initial substrings.</b><p><br />"; 
get_input();
}
else {
// check whether the input fields are not empty
if (empty($_REQUEST['first']) or empty($_REQUEST['last'])) {
echo "<b>Re-enter informations text in both fields:</b><p><br />"; 
get_input($_REQUEST['first'], $_REQUEST['last']);
}
else {
$conn = oci_connect("SYSTEM","toor","localhost/XE");
// Are we connected?
if (!$conn) {
echo( " Unable to locate the table Physicists. " );
}
else{
echo( " <i> We are connected ... </i><br />" );
}

// execute the function that calls the stored procedure 
$phys = get_Physicists($conn, $_REQUEST['first'], $_REQUEST['last']);

// display results
print_results($phys, 'Result: Physicist Information:');


// close the database connection
oci_close($conn);
}
} 


// The following functions calls the  procedure that uses a ref cursor 
//to fetch records

function get_Physicists($conn, $firstname, $lastname)
{
$sql = "BEGIN name,Father_Name,Mother_Name from Test.Transgender; END;";
$stmt = oci_parse($conn, $sql);
oci_bind_by_name($stmt, ':first_name', $firstname, 20);
oci_bind_by_name($stmt, ':last_name', $lastname, 25);
$refcur = oci_new_cursor($conn);
oci_bind_by_name($stmt, ':REFCUR', $refcur, -1, OCI_B_CURSOR);
oci_execute($stmt);
oci_execute($refcur, OCI_DEFAULT);
oci_fetch_all($refcur, $physicistrecords, null, null, OCI_FETCHSTATEMENT_BY_ROW);
return ($physicistrecords);
}


// To print the results
function print_results($returned_records, $report_title)
{
echo '<h3>'.htmlentities($report_title).'</h3>';
if (!$returned_records) {
echo '<p>No Records Found</p>';
}
else {
echo '<table border="1" cellspacing = "3" cellpadding = "7">';
foreach ($returned_records as $row) {
echo '<tr>';
foreach ($row as $field) {
print '<td>'.
($field ? htmlentities($field) : ' ').'</td>';
}
}
echo '</table>';
}
}

?>