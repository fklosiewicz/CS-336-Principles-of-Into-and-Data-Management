<?php
$keywordbeer = $_GET["beername"];
 $connect = mysqli_connect("localhost", "root", "usbw", "barbeerdrinkerplus");  
 $query = "select b1.day, SUM(b1.total_price) as price from `bills` b1, `transactions` t1 
where b1.bill_id = t1.bill_id and t1.type = 'beer' and t1.item = '".$keywordbeer."' group by b1.day
";  
 $result = mysqli_query($connect, $query);  
 
 echo "<h1>[$keywordbeer]</h1>";
 ?>  



<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([  
                          ['Day of the Week', 'Total Revenue (in dollars)'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["day"]."', ".$row["price"]."],";  
                          }  
                          ?>  
                     ]);  

        var options = {
          chart: {
            title: 'Time Distribution of When the Above Beer Sells Most',
            subtitle: 'Time Distribution Measured in Total Revenue Per Day',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 1200px; height: 700px;"></div>
  </body>
</html>

