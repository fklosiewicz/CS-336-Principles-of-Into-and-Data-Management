<?php
$keywordbar = $_GET["barname"];
 $connect = mysqli_connect("localhost", "root", "usbw", "barbeerdrinkerplus");  
 $query = "select b1.day, SUM(b1.total_price) as total from `bills` b1 where bar = '".$keywordbar."' group by b1.day order by b1.day desc
";  
 $result = mysqli_query($connect, $query);  
 
 echo "<h1>[$keywordbar]</h1>";
 ?>  



<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([  
                          ['Days of the Week', 'Total Revenue (in dollars)'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["day"]."', ".$row["total"]."],";  
                          }  
                          ?>  
                     ]);  

        var options = {
          chart: {
            title: 'Busiest Periods of the Week For The Bar Listed Above',
            subtitle: 'Busiest Periods Measured in Total Revenue',
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
