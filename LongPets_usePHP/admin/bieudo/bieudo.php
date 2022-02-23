<?php
require_once('../../database/database.php');
require_once('../../utils/utils.php');

$sql = "SELECT a.tendanhmuc as tendanhmuc , sum(a.tongsoluong) as tongsoluong
from(SELECT chitietdathang.mathucung,sum(soluongchitietdathang) as tongsoluong,danhmuc.tendanhmuc
FROM chitietdathang,danhmuc,thucung
WHERE chitietdathang.mathucung=thucung.mathucung and thucung.madanhmuc=danhmuc.madanhmuc
GROUP BY mathucung) a
GROUP BY a.tendanhmuc";
$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
mysqli_set_charset($conn, 'utf8');
$x = [];
$y = [];
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result, 1)) {
  $x[] = $row['tendanhmuc'];
  $y[] = $row['tongsoluong'];
}

?>
<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
  <div id="myChart" style="width:100%; max-width:600px; height:500px;">
  </div>

  <script>
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Contry', 'Mhl'],

        <?php
        $count = count($x);
        for ($i = 0; $i < $count; $i++) {
          if ($i != $count - 1) {
            echo "[" . "'$x[$i]',$y[$i]" . "],\n";
          } else {
            echo "[" . "'$x[$i]',$y[$i]" . "]";
          }
        }
        ?>
      ]);

      var options = {
        title: 'Biểu dồ danh mục'
      };

      var chart = new google.visualization.PieChart(document.getElementById('myChart'));
      chart.draw(data, options);
    }
  </script>

</body>

</html>