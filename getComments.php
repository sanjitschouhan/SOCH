<?php
$id = $_GET['problem'];
$conn = mysqli_connect("localhost", "root", "harsha", "soch");
$rows = array();
$result = mysqli_query($conn, "select * from comments where problem_id=" . $id);
while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
mysqli_close($conn);
echo json_encode($rows);
?>