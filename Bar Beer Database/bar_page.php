<?php

include "db_connect.php";
include "bootstrap.php";
$keywordbar = $_GET["barname"];

echo "<h2> Bar Page for Bar: $keywordbar </h2>";


echo "<h4>The following 10 drinkers are the largest spenders at the bar $keywordbar</h4>";
$sql = "select b1.name, f1.drinker, MAX(d1.total_price) as 'LargestSpender' from `bar` b1, `bills` d1, `transactions` t1, `frequents` f1 where
b1.name = '". $keywordbar ."' and b1.name = d1.bar and d1.bill_id = t1.bill_id and f1.bar = b1.name and
f1.drinker = d1.drinker group by f1.drinker order by LargestSpender desc limit 10";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Bar Name: " . $row["name"]. "  |||  Drinker: " . $row["drinker"]. 
	"  |||  Total Price: " . $row["LargestSpender"] ."<br>";
  }
} else {
	echo "0 results";
}

echo "<br><br>";

//next page

echo "<h4>The following 10 beers are the most popular at the bar $keywordbar</h4>";
echo "<h4>There may be less than 10 beers, depending on the bar.</h4>";
$sql = "select b1.name, i1.beer, AVG((i1.startquantity - i1.endquantity)) OverallAverageBeerSold
from `bar` b1, `inventory` i1 where b1.name = '". $keywordbar ."' and b1.name = i1.bar group by i1.beer order by OverallAverageBeerSold desc limit 10
";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Bar Name: " . $row["name"]. "  |||  Beer: " . $row["beer"]. 
	"  |||  Average Number of Beer Sold: " . $row["OverallAverageBeerSold"] ."<br>";
  }
} else {
	echo "0 results";
}


echo "<h4>The following 5 manufacturers are the most popular at the bar $keywordbar</h4>";
echo "<h4>There may be less than 5 manufacturers, depending on the bar.</h4>";
$sql = "select b1.name, m1.manf, i1.beer, AVG((i1.startquantity - i1.endquantity)) as OverallAverageBeersSoldByManf
from `bar` b1, `inventory` i1, `beer` m1 where b1.name = '". $keywordbar ."' and b1.name = i1.bar and m1.name = i1.beer group by m1.manf order by OverallAverageBeersSoldByManf desc limit 5
";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Bar Name: " . $row["name"]. "  |||  Manufacturer: " . $row["manf"]. 
	"  |||  Average Number of Beer Sold: " . $row["OverallAverageBeersSoldByManf"] ."<br>";
  }
} else {
	echo "0 results";
}
?>


<br><br>
<form class="form-horizontal" action="bar_time_series_week.php">
<fieldset>

<!-- Form Name -->
<legend>Busiest Periods of the Week</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="barname">To see the busiest periods of the week for this bar, type in the name of the bar:</label>  
  <div class="col-md-4">
  <input id="barname" name="barname" type="text" placeholder="" class="form-control input-md">
    
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



<br><br>
<form class="form-horizontal" action="bar_time_series_timeofday.php">
<fieldset>

<!-- Form Name -->
<legend>Busiest Periods of the Week</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="barname">To see the busiest periods of the week for this bar, type in the name of the bar:</label>  
  <div class="col-md-4">
  <input id="barname" name="barname" type="text" placeholder="" class="form-control input-md">
    
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






