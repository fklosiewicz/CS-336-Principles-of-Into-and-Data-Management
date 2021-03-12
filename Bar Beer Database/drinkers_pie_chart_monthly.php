<?php
$keyworddrinker = $_GET["drinkername"];
$keywordmonth = $_GET["monthname"];

 $connect = mysqli_connect("localhost", "root", "usbw", "barbeerdrinkerplus");  
 $query = "select b1.bar, SUM(b1.total_price) as price from `bills` b1 where b1.drinker = '".$keyworddrinker."' and b1.date <= '2018-".$keywordmonth."-31' and b1.date >= '2018-".$keywordmonth."-01' group by b1.bar
";  
 $result = mysqli_query($connect, $query);

if($keywordmonth == 1) {
	$keywordmonth = 'January';
}

else if($keywordmonth == 2) {
	$keywordmonth = 'February';
}

else if($keywordmonth == 3) {
	$keywordmonth = 'March';
}

else if($keywordmonth == 4) {
	$keywordmonth = 'April';
}

else if($keywordmonth == 5) {
	$keywordmonth = 'May';
}

else if($keywordmonth == 6) {
	$keywordmonth = 'June';
}

else if($keywordmonth == 7) {
	$keywordmonth = 'July';
}

else if($keywordmonth == 8) {
	$keywordmonth = 'August';
}

else if($keywordmonth == 9) {
	$keywordmonth = 'September';
}

else if($keywordmonth == 10) {
	$keywordmonth = 'October';
}

else if($keywordmonth == 11) {
	$keywordmonth = 'November';
}

else if($keywordmonth == 12) {
	$keywordmonth = 'December';
}

echo "<h1>[$keywordmonth]</h1>";

 
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
                      title: 'Frequent Activity On Month Listed Above (hover over for total money spent):' ,  
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
 
 
 
 
 
 
 
 
 