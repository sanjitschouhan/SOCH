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
    $country = $("#country");
    $state = $("#state");
    $place = $("#place");
    $problems = $("#problems");
    $country.select2({
        placeholder: "Loading..."
    });
    $.getJSON("https://www.soch.online/getCountries.php",function (data) {
        $country.select2({
            data: data,
            placeholder: "Select Country"
        });
        $country.select2("val", " ");
    });
    $country.select2("val", " ");
    $state.select2({
        placeholder: "Select State"
    });
    $state.prop("disabled", true);
    $place.select2({
        placeholder: "Select Place"
    });
    $place.prop("disabled", true);
    $problems.select2({
        placeholder: "Select Problem"
    });

    $problems.prop("disabled", true);

    $country.on("select2:select", function (e) {
        var selected_country = $(e.currentTarget).val();
        $state.prop("disabled", true);
        $state.select2({
            placeholder: "Loading..."
        });
        $state.select2('val', '');
        $state.empty();
        $.getJSON('https://www.soch.online/getStates.php?country=' + selected_country, function (data) {
            if (data.length > 0) {
                $state.prop("disabled", false);
                $state.select2({
                    placeholder: "Select State",
                    data: data
                });
                $state.select2('val', '');
            } else {
                $state.select2({
                    placeholder: "No State Available"
                });
            }
        });

    });

    $state.on("select2:select", function (e) {
        var selected_state = $(e.currentTarget).val();
        $place.prop("disabled", true);
        $place.select2({
            placeholder: "Loading..."
        });
        $place.select2('val', '');
        $place.empty();
        $.getJSON('https://www.soch.online/getCities.php?state=' + selected_state, function (data) {
            if (data.length > 0) {
                $place.prop("disabled", false);
                $place.select2({
                    placeholder: "Select Place",
                    data: data
                });
                $place.select2('val', '');
            } else {
                $place.select2({
                    placeholder: "No State Available"
                });
            }
        });

    });
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