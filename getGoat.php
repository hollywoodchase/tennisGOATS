<?php
$q = intval($_GET['q']);

$con = $DBConnect = mysqli_connect("127.0.0.1", "hollywoodchase", "bigNsmall517!", "dcalise2");
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$TableName = "MENS_TENNIS_GRAND_SLAM_WINNERS";
$SQLString = "SELECT * FROM $TableName";
$QueryResult = mysqli_query($DBConnect, $SQLString);



while ($row = mysqli_fetch_array($QueryResult)) {
  echo $row['winnerNationality'];
  echo",";
}
mysqli_close($con);
?>