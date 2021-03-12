<?php
include "db_connect.php";
include "bootstrap.php";
?>

<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<body>

<h1>Bar Beer Database<br></h1>

<!--
<h2>Drinkers Page<br></h2>
<body> Type in the name of a drinker and click submit:<br><br></body>
<form action="/drinkers_page.php">
  Drinker Name:<br>
  <input type="text" name="drinkername"<br>
  <input type="submit" value="Submit">
</form>
<hr>
-->

<form class="form-horizontal" action="drinkers_page.php">
<fieldset>

<!-- Form Name -->
<legend>Drinkers Page</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Type in the name of a drinker to see their transactions:</label>  
  <div class="col-md-4">
  <input id="textinput" name="drinkername" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">For examle: Aaron Adkins</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-success">Search!</button>
  </div>
</div>

</fieldset>
</form>
<br><br><br>

<!--
<body><br><h2>Bar Page<br></h2>
<body> Type in the name of a bar and click submit:<br><br></body>
<form action="/bar_page.php">
  Bar Name:<br>
  <input type="text" name="barname"<br>
  <input type="submit" value="Submit">
</form>
<hr>
-->

<form class="form-horizontal" action="bar_page.php">
<fieldset>

<!-- Form Name -->
<legend>Bars Page</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="barname">Type in the name of a bar to see further information:</label>  
  <div class="col-md-4">
  <input id="barname" name="barname" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">For example: Absent Snow</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-success">Search!</button>
  </div>
</div>

</fieldset>
</form>

<!--
<body><br><h2>Beer Page<br></h2>
<body> Type in the name of a beer and click submit:<br><br></body>
<form action="/beer_page.php">
  Beer Name:<br>
  <input type="text" name="beername"<br>
  <input type="submit" value="Submit">
</form>
<hr>
-->

<form class="form-horizontal" action="beer_page.php">
<fieldset>

<!-- Form Name -->
<legend>Beers Page</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="beername">Type in the name of a beer to see further information:</label>  
  <div class="col-md-4">
  <input id="beername" name="beername" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">For example: Hefeweizen</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-success">Search!</button>
  </div>
</div>

</fieldset>
</form>


<!--

<body><br><h2>Modifications Page<br></h2>
<body> Type in a query of your choice (to update, insert, delete), and click submit:<br><br></body>
<form action="/mod_page.php">
  Query to be executed:<br>
  <input type="text" name="queryname"<br>
  <input type="submit" value="Submit">
</form>
<hr>
-->

<form class="form-horizontal" action="mod_page.php">
<fieldset>

<!-- Form Name -->
<legend>Modifications Page</legend>

<!-- Text input-->
<div class="form-group" action="mod_page.php">
  <label class="col-md-4 control-label" for="queryname">Type in an update, insert, or delete query and click to execute:</label>  
  <div class="col-md-4">
  <input id="queryname" name="queryname" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">For example: INSERT INTO drinker (name, phone, state) VALUES ('Filip Klosiewicz', '123-456-7890','NJ')</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-warning">Execute Query!</button>
  </div>
</div>

</fieldset>
</form>





<?php
//include "drinkers_page.php";
$mysqli->close();
?>

</body>
</html>