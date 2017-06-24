<?php
$country = $_GET['country'];
$conn = mysqli_connect("localhost", "root", "harsha", "soch");
$result = mysqli_query($conn, "select id from countries where name='" . $country . "'");
$id = mysqli_fetch_assoc($result)['id'];
$rows = array();
$result = mysqli_query($conn, "select name from states where country_id=" . $id);
while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r['name'];
}
print json_encode($rows);
?>