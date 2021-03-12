<?php
$keyworddrinker = $_GET["drinkername"];
 $connect = mysqli_connect("localhost", "root", "usbw", "barbeerdrinkerplus");  
 $query = "select t1.item, SUM(t1.quantity) as quantity from `bills` b1, `transactions` t1 where b1.bill_id = t1.bill_id and b1.drinker = '".$keyworddrinker."' and t1.type = 'beer' group by t1.item
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
                          ['Beers', 'Quantity'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["item"]."', ".$row["quantity"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Most Ordered Beers By Percentage',  
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
                <h1 align="center">Percentage Pie Chart Of Ordered Beers</h1>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>
 
 
 
 
 
 
 
 
 