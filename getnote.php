<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','123456','my_test');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"remind");
$sql="SELECT * FROM remind WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>Title</th>
<th>Text</th>
<th>Date_sign</th>
<th>Category</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['text'] . "</td>";
  echo "<td>" . $row['date_sign'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
