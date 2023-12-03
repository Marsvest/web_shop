function goto_edit_form() {
    window.location.href = "../pages/add_item.html"
}

function load_items(data) {
    $(document).ready(function () {
        $('#goods').html(data);
    });
}

function add_item(pic, title, desc, price) {
    $.ajax({
        url: '../php/add_item.php',
        type: 'GET',
        data: {pic: pic, title: title, desc: desc, price: price}
    });
}

$(document).ready(function () {
    $.ajax({
        url: '../php/get_items.php',
        type: 'GET',
        success: function (response) {
            load_items(response);
        }
    });
});

$(document).ready(function () {
    $('#add_item').click(function () {
        let pic = $('#item_pic_url').val();
        let title = $('#item_title').val();
        let desc = $('#item_desc').val();
        let price = $('#item_price').val();

        add_item(pic, title, desc, price);
    });
});