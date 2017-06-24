<?php
$problem = $_COOKIE['problem'];
$city = $_COOKIE['city'];
$state = $_COOKIE['state_id'];
$conn = mysqli_connect("localhost", "root", "harsha", "soch");
$result = mysqli_query($conn, "select id from cities where name='" . $city . "' and state_id=" . $state);
$id = mysqli_fetch_assoc($result)['id'];
setcookie("city_id", $id);
$rows = array();
$result = mysqli_query($conn, "select * from problems where city_id=" . $id . " and problem='" . $problem . "'");
while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
echo "<script>";
echo "var probs = " . json_encode($rows);
echo "</script>";
?>

<html lang="en">
<head>
    <script src="/jquery-3.1.1.js"></script>
    <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>SOCH</title>
</head>
<body>
<table class="table table-hover" style="width: 70%; margin: 0 auto;">
    <thead>
    <tr>
        <th>Description</th>
        <th>Up Votes</th>
        <th>Down Votes</th>
    </tr>
    </thead>
    <tbody id="problem-list">
    <script>
        function like(id) {
            $("#like-" + id).removeClass("fa-thumbs-o-up").addClass("fa-thumbs-up");
            var likes = parseInt($("#upvotes-" + id).html());
            $("#upvotes-" + id).html(likes + 1);
        }
        function dislike(id) {
            $("#dislike-" + id).removeClass("fa-thumbs-o-down").addClass("fa-thumbs-down");
            var dislikes = parseInt($("#downvotes-" + id).html());
            $("#downvotes-" + id).html(dislikes + 1);
        }
    </script>
    </tbody>

    <script>
        $problemList = $("#problem-list");
        for (var i = 0; i < probs.length; i++) {
            var r = probs[i];
            $problemList.append(
                "<tr>" +
                "<td>" + r['description'] + " </td>" +
                "<td>" +
                "<div class ='btn' onclick='like(\"" + r['id'] + "\")'>" +
                "<i id='like-" + r['id'] + "'" + " class='fa fa-thumbs-o-up'></i>" +
                "<div style='display: inline;' id='upvotes-" + r['id'] + "'>" + r['upvotes'] +
                "</div></div></td>" +
                "<td>" +
                "<div class ='btn' onclick='dislike(\"" + r['id'] + "\")'>" +
                "<i id='dislike-" + r['id'] + "'" + " class='fa fa-thumbs-o-down'></i>" +
                "<div style='display: inline;' id='downvotes-" + r['id'] + "'>" + r['downvotes'] +
                "</div></div></td>" + "</tr>"
            );
        }
    </script>
</table>
</body>
