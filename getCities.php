<?php
$state = $_GET['state'];
$country = $_COOKIE['country_id'];
$conn = mysqli_connect("localhost", "root", "harsha", "soch");
$result = mysqli_query($conn, "select id from states where name='" . $state . "' and country_id=" . $country);
$id = mysqli_fetch_assoc($result)['id'];
setcookie("state_id",$id);
$rows = array();
$result = mysqli_query($conn, "select name from cities where state_id=" . $id);
while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r['name'];
}
print json_encode($rows);
?>