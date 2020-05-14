<?php

include("conn.php");




 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>


    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var jsonData = $.ajax({
          url: "getData.php",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, {width: 400, height: 240});
    }

    </script>
  </head>

  <body>

<div class="">
  <?php

  $query = "SELECT * FROM test";

  $result = $mysqli->query($query);

if(!$result){
  echo $mysqli->error();
}else{
  echo "<p>ALL OK</p>";
}

  while($row=$result->fetch_assoc()){

    $id = $row['id'];
    $name= $row['name'];
    $age= $row['age'];

    echo "<p>$id | $name | $age</p>";


  }


   ?>
</div>

    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>
