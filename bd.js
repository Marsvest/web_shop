function RegBtn(login, password) {
    $.ajax({
        url: 'test.php',
        type: 'POST',
        data: {login: login, pass: password},
        success: function (response) {
            // Handle the response from the PHP script
            console.log(response);
        },
        error: function (xhr, status, error) {
            // Handle any errors that occur during the request
            console.log(error);
        }
    });
}

$(document).ready(function () {
    $('#regbtn').click(RegBtn(1, 2));
});