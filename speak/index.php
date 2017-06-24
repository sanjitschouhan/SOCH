<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SOCH</title>
    <script src="/jquery-3.1.1.js"></script>
    <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>
<body>
<div class="container-fluid center-block" style="margin: 10%;">
    <select class="form-control" id="country"></select>
    <select class="form-control" id="state"></select>
    <select class="form-control" id="place"></select>
    <select class="form-control" id="problems"></select>
</div>

<script>
    var countries = ["India"];
    $country = $("#country");
    $country.select2({
        data: countries,
        placeholder: "Select Country"
    });
    $country.select2("val", " ");
</script>
</body>
</html>

<style>
    .select2-selection__arrow {
        display: none;
    }

    .select2-selection.select2-selection--single {
        padding: 5px;
        height: 40px;
    }

    .select2-container {
        width: 100% !important;
    }
</style>