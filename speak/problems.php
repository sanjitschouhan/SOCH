<?php
$problem = $_COOKIE['problem'];
$city = $_COOKIE['city'];
$state = $_COOKIE['state_id'];
$conn = mysqli_connect("localhost", "root", "harsha", "soch");
$result = mysqli_query($conn, "select id from cities where name='" . $city . "' and state_id=" . $state);
$id = mysqli_fetch_assoc($result)['id'];
setcookie("city_id", $id);
?>

<?php
$rows = array();
$result = mysqli_query($conn, "select * from problems where city_id=" . $id . " and problem='" . $problem . "'");
while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows);
?>