function load_items(data) {
    $(document).ready(function () {
        $('#goods').html(data);
    });
}

$(document).ready(function () {
    $.ajax({
        url: '../php/get_items.php',
        type: 'GET',
        success: function (response) {
            load_items(response)
        }
    });
});