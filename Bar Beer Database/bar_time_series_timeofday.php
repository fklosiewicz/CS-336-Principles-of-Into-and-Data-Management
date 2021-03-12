<?php
$keywordbar = $_GET["barname"];
 $connect = mysqli_connect("localhost", "root", "usbw", "barbeerdrinkerplus");  
 $query = "SELECT b1.time, SUM(b1.total_price) as price FROM `bills2` b1 where b1.bar = '".$keywordbar."' group by b1.time
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
                          ['Time of Day', 'Total Revenue'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["time"]."', ".$row["price"]."],";  
                          }  
                          ?>  
                     ]);  

        var options = {
          chart: {
            title: 'Busiest Times of Day For The Bar Listed Above',
            subtitle: 'Busiest Times Measured in Total Revenue',
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
