<?php
$desc = $_COOKIE['desc'];
$problem = $_COOKIE['problem'];
$city = $_COOKIE['city'];
$state = $_COOKIE['state_id'];
$conn = mysqli_connect("localhost", "root", "harsha", "soch");
$result = mysqli_query($conn, "select id from cities where name='" . $city . "' and state_id=" . $state);
$id = mysqli_fetch_assoc($result)['id'];
setcookie("city_id", $id);
mysqli_close($conn);
$conn = mysqli_connect("localhost", "root", "harsha", "soch");
try {
    $sql = "INSERT INTO `problems` (`id`, `problem`, `description`, `city_id`, `upvotes`, `downvotes`) VALUES (NULL, '$problem', '$desc', '$id', '0', '0')";
    mysqli_query($conn, $sql);
} catch (Exception $e) {
    echo $e->getMessage();
}
mysqli_close($conn);
?>

<script>
    window.open("/", "_self");
</script>
