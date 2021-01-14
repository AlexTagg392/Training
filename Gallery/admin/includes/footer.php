  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
          var data = google.visualization.arrayToDataTable([
              ['Aspects', 'Total Number'],
              ['Views',     <?php echo $session->count; ?>],
              ['Comments',      <?php echo Comment::count_all(); ?>],
              ['Users',  <?php echo User::count_all(); ?>],
              ['Photos', <?php echo Photo::count_all(); ?>]

          ]);

          var options = {
              legend: 'none',
              pieSliceText: 'label',
              title: 'My Daily Activities',
              is3D: true,
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
          chart.draw(data, options);
      }
  </script>
  <script src="js/scripts.js"></script>



  </body>

</html>
