<?php

$suburb = $_POST["suburb"];

$con = mysqli_connect("localhost", "s1014119_RTAGH", "z9@m_EmARD.?", "s1014119_rtagovhack");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$suburb = mysqli_real_escape_string($con, $suburb);

$result = mysqli_query($con, "SELECT longitude, latitude FROM location WHERE name = '" . $suburb."'");

$json = array();
while ($row = $result->fetch_array(MYSQL_ASSOC)) {
    $json['latitude'] = $row['latitude'];
    $json['longitude'] = $row['longitude'];
}
echo json_encode($json);
mysqli_close($con);
?>
