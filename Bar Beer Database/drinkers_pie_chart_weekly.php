<?php
$keyworddrinker = $_GET["drinkername"];
$keywordweekday = $_GET["weekday"];

if($keywordweekday == 1) {
	$keywordweekday = 'Monday';
}

else if($keywordweekday == 2) {
	$keywordweekday = 'Tuesday';
}

else if($keywordweekday == 3) {
	$keywordweekday = 'Wednesday';
}

else if($keywordweekday == 4) {
	$keywordweekday = 'Thursday';
}

else if($keywordweekday == 5) {
	$keywordweekday = 'Friday';
}

else if($keywordweekday == 6) {
	$keywordweekday = 'Saturday';
}

else if($keywordweekday == 7) {
	$keywordweekday = 'Sunday';
}

echo "<h1>[$keywordweekday]</h1>";

 $connect = mysqli_connect("localhost", "root", "usbw", "barbeerdrinkerplus");  
 $query = "select b1.bar, SUM(b1.total_price) as price from `bills` b1 where b1.drinker = '".$keyworddrinker."' and b1.day = '".$keywordweekday."' group by b1.bar
";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <html>  
      <head>  
           <title>Most Ordered Beers </title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Bars', 'Price'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["bar"]."', ".$row["price"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Frequent Activity On Weekday Listed Above (hover over for total money spent):' ,  
                      //is3D:true,  
                      pieHole: 0.35
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h1 align="center">Pie Chart Of Frequents and Spending</h1>  
                <br />  
                <div id="piechart" style="width: 1350px; height: 750px;"></div>  
           </div>  
      </body>  
 </html>
 
 
 
 
 
 
 
 
 