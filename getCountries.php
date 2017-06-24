<?php
$conn = mysqli_connect("localhost", "root", "harsha", "soch");
$result = mysqli_query($conn, "select name from countries");
$rows = array();
while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r['name'];
}
print json_encode($rows);
?>