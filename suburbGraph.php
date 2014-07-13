<?php

$suburb = $_POST["suburb"];

$con = mysqli_connect("localhost", "s1014119_RTAGH", "z9@m_EmARD.?", "s1014119_rtagovhack");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$suburb = mysqli_real_escape_string($con, $suburb);

/*
 * 
 * var data = google.visualization.arrayToDataTable([
          ['Director (Year)',  'Rotten Tomatoes', 'IMDB'],
          ['Alfred Hitchcock (1935)', 8.4,         7.9],
          ['Ralph Thomas (1959)',     6.9,         6.5],
          ['Don Sharp (1978)',        6.5,         6.4],
          ['James Hawes (2008)',      4.4,         6.2]
        ]);
 * 
 */
$graphArray = array();
$graph = array("Month, Year", "Minimum Weekly Rent", "Average Weekly Rent", "Maximum Weekly Rent");
$graphArray[] = $graph;

// July 2013
$result = mysqli_query($con, "SELECT * FROM suburbminmax WHERE locality = '" . $suburb."' AND Year = '2013' AND Month = '7'");
$num_rows = mysqli_num_rows($result);
if ($num_rows == 1) {
    $row = $result->fetch_array(MYSQL_ASSOC);
    $graph = array("July, 2013", floatval($row['minimum']), floatval($row['average']), floatval($row['maximum']));
} else {
    $graph = array("July, 2013", 0, 0, 0);
}
$graphArray[] = $graph;

// August 2013
$result = mysqli_query($con, "SELECT * FROM suburbminmax WHERE locality = '" . $suburb."' AND Year = '2013' AND Month = '8'");
$num_rows = mysqli_num_rows($result);
if ($num_rows == 1) {
    $row = $result->fetch_array(MYSQL_ASSOC);
    $graph = array("August, 2013", floatval($row['minimum']), floatval($row['average']), floatval($row['maximum']));
} else {
    $graph = array("August, 2013", 0, 0, 0);
}
$graphArray[] = $graph;

// September 2013
$result = mysqli_query($con, "SELECT * FROM suburbminmax WHERE locality = '" . $suburb."' AND Year = '2013' AND Month = '9'");
$num_rows = mysqli_num_rows($result);
if ($num_rows == 1) {
    $row = $result->fetch_array(MYSQL_ASSOC);
    $graph = array("September, 2013", floatval($row['minimum']), floatval($row['average']), floatval($row['maximum']));
} else {
    $graph = array("September, 2013", 0, 0, 0);
}
$graphArray[] = $graph;

// October 2013
$result = mysqli_query($con, "SELECT * FROM suburbminmax WHERE locality = '" . $suburb."' AND Year = '2013' AND Month = '10'");
$num_rows = mysqli_num_rows($result);
if ($num_rows == 1) {
    $row = $result->fetch_array(MYSQL_ASSOC);
    $graph = array("October, 2013", floatval($row['minimum']), floatval($row['average']), floatval($row['maximum']));
} else {
    $graph = array("October, 2013", 0, 0, 0);
}
$graphArray[] = $graph;

// November 2013
$result = mysqli_query($con, "SELECT * FROM suburbminmax WHERE locality = '" . $suburb."' AND Year = '2013' AND Month = '11'");
$num_rows = mysqli_num_rows($result);
if ($num_rows == 1) {
    $row = $result->fetch_array(MYSQL_ASSOC);
    $graph = array("November, 2013", floatval($row['minimum']), floatval($row['average']), floatval($row['maximum']));
} else {
    $graph = array("November, 2013", 0, 0, 0);
}
$graphArray[] = $graph;

// December 2013
$result = mysqli_query($con, "SELECT * FROM suburbminmax WHERE locality = '" . $suburb."' AND Year = '2013' AND Month = '12'");
$num_rows = mysqli_num_rows($result);
if ($num_rows == 1) {
    $row = $result->fetch_array(MYSQL_ASSOC);
    $graph = array("December, 2013", floatval($row['minimum']), floatval($row['average']), floatval($row['maximum']));
} else {
    $graph = array("December, 2013", 0, 0, 0);
}
$graphArray[] = $graph;

// January 2014
$result = mysqli_query($con, "SELECT * FROM suburbminmax WHERE locality = '" . $suburb."' AND Year = '2014' AND Month = '1'");
$num_rows = mysqli_num_rows($result);
if ($num_rows == 1) {
    $row = $result->fetch_array(MYSQL_ASSOC);
    $graph = array("January, 2014", floatval($row['minimum']), floatval($row['average']), floatval($row['maximum']));
} else {
    $graph = array("January, 2014", 0, 0, 0);
}
$graphArray[] = $graph;

// February 2014
$result = mysqli_query($con, "SELECT * FROM suburbminmax WHERE locality = '" . $suburb."' AND Year = '2014' AND Month = '2'");
$num_rows = mysqli_num_rows($result);
if ($num_rows == 1) {
    $row = $result->fetch_array(MYSQL_ASSOC);
    $graph = array("February, 2014", floatval($row['minimum']), floatval($row['average']), floatval($row['maximum']));
} else {
    $graph = array("February, 2014", 0, 0, 0);
}
$graphArray[] = $graph;

// March 2014
$result = mysqli_query($con, "SELECT * FROM suburbminmax WHERE locality = '" . $suburb."' AND Year = '2014' AND Month = '3'");
$num_rows = mysqli_num_rows($result);
if ($num_rows == 1) {
    $row = $result->fetch_array(MYSQL_ASSOC);
    $graph = array("March, 2014", floatval($row['minimum']), floatval($row['average']), floatval($row['maximum']));
} else {
    $graph = array("March, 2014", 0, 0, 0);
}
$graphArray[] = $graph;


echo json_encode($graphArray);
mysqli_close($con);
?>
