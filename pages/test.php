<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    

<select id="mySelect">
    <option value="value_1">#1</option>
    <option value="value_2">#2</option>
    <option value="value_3">#3</option>
</select>

<div data-js="list_value_1" class="is-hidden">
    <input type="checkbox" value="1" name="myCheckbox">
    <input type="checkbox" value="1" name="myCheckbox">
</div>

<div data-js="list_value_2" class="is-hidden">
    <input type="checkbox" value="1" name="myCheckbox">
    <input type="checkbox" value="1" name="myCheckbox">
    <input type="checkbox" value="1" name="myCheckbox">
</div>

<div data-js="list_value_3" class="is-hidden">
    <input type="checkbox" value="1" name="myCheckbox">
    <input type="checkbox" value="1" name="myCheckbox">
    <input type="checkbox" value="1" name="myCheckbox">
</div>


<script>
    $("#mySelect").on('change', function (e) {
    e.preventDefault();

    var value = $(this).val();

    if (!value || !value.length) {
        return;
    }

    $('[data-js^="list_value_"]').addClass('is-hidden');
    $('[data-js="' + value + '"]').removeClass('is-hidden');
});
</script>
</body>
</html>