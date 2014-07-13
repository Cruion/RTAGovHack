<?php

$con = mysqli_connect("localhost", "s1014119_RTAGH", "z9@m_EmARD.?", "s1014119_rtagovhack");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT DISTINCT locality, PostCode FROM bonds");

$json = array();
while ($row = $result->fetch_array(MYSQL_ASSOC)) {
    $json[] = $row;
}
echo json_encode($json);
mysqli_close($con);
?>