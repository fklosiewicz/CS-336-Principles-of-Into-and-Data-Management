<?php
include "db_connect.php";
$keywordquery = $_GET["queryname"];

echo "<h2> Executing Query -->:<br> $keywordquery </h2>";

$sql = "".$keywordquery."";
$result = $mysqli->query($sql);
if($row = $mysqli->error){
	echo "<h4>The above query was unable to be executed due do the error below. Please check that your query meets
	the database constraints.<br>
	<br>
	A null error message signifies that a new insertion/update violates a constraint in part three of the project.
	<br><br>
	'Foreign key constraint' signifies that an insertion/update has been made in a child table, whose parent is nonexistent. Check that:
	<br> 1) Make sure you are not inserting/updating a child with a primary key that is not present in the parent table.
	<br> 2) For the above insertion/update to work, first make the insertion/update to the parent table.
	<br>
	<br>
	'Column constraint cannot be null' signifies that an insertion/update was attempted, but it violates one of the three constraints:
	<br> 1) Check that your TRANSACTION TIME is between the working hours of the given bar.
	<br> 2) Check that the drinker FREQUENTS the bar in his state.
	<br> 3) Check that the BEER PRICE meets the constraint of part three.
	<br><br><br></h4>";
	echo "<h3> Error message below:</h3>";
	echo "<h2>$mysqli->error</h2>";
} else {
echo "<h4>Successful execution of the above query!</h4>"; }

?>