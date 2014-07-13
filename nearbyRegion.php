<?php

// Select all suburbs in same region.

$suburb = $_POST["suburb"];

$con = mysqli_connect("localhost", "s1014119_RTAGH", "z9@m_EmARD.?", "s1014119_rtagovhack");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$suburb = mysqli_real_escape_string($con, $suburb);

$result = mysqli_query($con, "SELECT DISTINCT suburb, numBonds, latitude, longitude FROM  suburbbondsloc WHERE area = (SELECT area FROM suburbbondsloc WHERE suburb = '".$suburb."' LIMIT 1)");
while ($row = $result->fetch_array(MYSQL_ASSOC)) {
    $json[] = $row;
}
echo json_encode($json);

mysqli_close($con);


?>
