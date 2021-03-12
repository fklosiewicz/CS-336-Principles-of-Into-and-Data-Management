<?php
include "bootstrap.php";

include "db_connect.php";
$keywordbeer = $_GET["beername"];

echo "<h2> Beer Page for beer: $keywordbeer </h2>";


echo "<h4> The following 5 bars are where $keywordbeer sells most.</h4>";
$sql = "select distinct b1.name, i1.beer, AVG((i1.startquantity - i1.endquantity)) as OverallAverageBeersSoldByBar
from `bar` b1, `beer` b2, `inventory` i1 where b2.name = '". $keywordbeer ."' and b2.name = i1.beer and b1.name = i1.bar group by i1.bar order by OverallAverageBeersSoldByBar desc limit 5
";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Beer Name: " . $row["beer"]. "  |||  Bar Name: " . $row["name"]. 
	"  |||  Average Beers Sold By Bar: " . $row["OverallAverageBeersSoldByBar"] ."<br>";
  }
} else {
	echo "0 results";
}

echo "<h4> The following drinkers are the biggest consumers of $keywordbeer according to their average consuption of $keywordbeer.</h4>";
$sql = "select distinct t1.item, b1.drinker, AVG(t1.quantity) as BiggestConsumer from `bills` b1, `transactions` t1
where b1.bill_id = t1.bill_id and t1.item = '". $keywordbeer ."' group by b1.drinker order by BiggestConsumer desc limit 10
";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Beer Name: " . $row["item"]. "  |||  Drinker:  ". $row["drinker"].  "  |||  Overall Average Consuption of Beer: " . $row["BiggestConsumer"] ."<br>";
  }
} else {
	echo "0 results";
}
?>

<br><br>
<form class="form-horizontal" action="beer_time_series_timeofday.php">
<fieldset>

<!-- Form Name -->
<legend>Beer Sales - Time Distribution </legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="beername">To see the time distribution of when this beer sells most, type in the name of the beer:</label>  
  <div class="col-md-4">
  <input id="beername" name="beername" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-info">Click here!</button>
  </div>
</div>

</fieldset>
</form>
<br>