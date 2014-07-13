<?php

$suburb = $_POST["suburb"];

$con = mysqli_connect("localhost", "s1014119_RTAGH", "z9@m_EmARD.?", "s1014119_rtagovhack");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$suburb = mysqli_real_escape_string($con, $suburb);

$result = mysqli_query($con, "SELECT DwellingType, bedrooms, COUNT(*) AS Num FROM bonds WHERE locality = '" . $suburb."' AND BondType = 'General Tenancy' GROUP BY DwellingType, bedrooms");


$graphArray = array();
while ($row = $result->fetch_array(MYSQL_ASSOC)) {
    
    $graph = array($row['DwellingType'], $row['bedrooms'] . " bedrooms", intval($row['Num']));
    $graphArray[] = $graph;
}
echo json_encode($graphArray);
mysqli_close($con);
?>
