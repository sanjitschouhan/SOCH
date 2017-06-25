<?php
$desc = $_COOKIE['description'];
$problem = $_COOKIE['problem'];
$city = $_COOKIE['city'];
$state = $_COOKIE['state_id'];
$conn = mysqli_connect("localhost", "root", "harsha", "soch");
$result = mysqli_query($conn, "select id from cities where name='" . $city . "' and state_id=" . $state);
$id = mysqli_fetch_assoc($result)['id'];
setcookie("city_id", $id);
$rows = array();
mysqli_query($conn, "insert into grevience('problem','description','city_id') VALUES($problem,$desc, $id)");
mysqli_close($conn);
?>

<script>
    window.open("/speak/problems.php","_self");
</script>
