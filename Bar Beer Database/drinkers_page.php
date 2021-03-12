<?php
include "db_connect.php";
include "bootstrap.php";

$keyworddrinker = $_GET["drinkername"];

// Drinker and Transactions Ordered By Bar, Sorted by Time

echo "<h2> Drinkers Page for Drinker: $keyworddrinker  </h2>";

$sql = "SELECT b1.bill_id, b1.bar, b1.date, b1.drinker, b1.items_price, b1.tax_price, b1.tip, b1.total_price, b1.time, b1.bartender, b1.day, t1.quantity, t1.item
 FROM `bills` b1, `transactions` t1 where b1.drinker = '" . $keyworddrinker . "' and b1.bill_id = t1.bill_id order by bar, time asc";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Bill_ID: " . $row["bill_id"]. "  |||  Bar: " . $row["bar"]. 
	"  |||  Date: " . $row["date"]. "  |||  Drinker: " . $row["drinker"]. 
	"  |||  Item Price: " . $row["items_price"]. "  |||  Tax Price: " . $row["tax_price"]. 
	"  |||  Tip " . $row["tip"]. "  |||  Total Price: " . $row["total_price"]. 
	"  |||  Time: " . $row["time"]. "  |||  Bartender: " . $row["bartender"]. 
	"  |||  Day: " . $row["day"]. "  |||  Quantity: " . $row["quantity"]. 
	"  |||  Item Purchased: " . $row["item"] ."<br><br>";
  }
} else {
	echo "0 results";
}
?>

<form class="form-horizontal"action="drinkers_pie_chart.php">
<fieldset>

<!-- Form Name -->
<legend>Most Ordered Beers</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="drinkername">To see his/her most ordered beers type in his/her name:</label>  
  <div class="col-md-4">
  <input id="drinkername" name="drinkername" type="text" placeholder="" class="form-control input-md">
    
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


<form class="form-horizontal"action="drinkers_pie_chart_weekly.php">
<fieldset>

<!-- Form Name -->
<legend>Weekly frequents:</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="drinkername">To search his/her weekly frequents type in her name and select the day of the week:</label>  
  <div class="col-md-4">
  <input id="drinkername" name="drinkername" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Weekday:</label>
  <div class="col-md-4">
    <select id="selectbasic" name="weekday" class="form-control">
      <option value="1">Monday</option>
      <option value="2">Tuesday</option>
      <option value="3">Wednesday</option>
      <option value="4">Thursday</option>
      <option value="5">Friday</option>
      <option value="6">Saturday</option>
      <option value="7">Sunday</option>
    </select>
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

<form class="form-horizontal"action="drinkers_pie_chart_monthly.php">
<fieldset>

<!-- Form Name -->
<legend>Monthly frequents:</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="drinkername">To search his/her monthly frequents type in her name and select the day of the week:</label>  
  <div class="col-md-4">
  <input id="drinkername" name="drinkername" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="monthname">Month:</label>
  <div class="col-md-4">
    <select id="monthname" name="monthname" class="form-control">
      <option value="01">January</option>
      <option value="02">February</option>
      <option value="03">March</option>
      <option value="04">April</option>
      <option value="05">May</option>
      <option value="06">June</option>
      <option value="07">July</option>
      <option value="08">August</option>
      <option value="09">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
    </select>
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















