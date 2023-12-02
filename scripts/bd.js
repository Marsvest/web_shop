function RegBtn(login, password) {
    $.ajax({
        url: '../php/reg.php',
        type: 'POST',
        data: {login: login, pass: password}
    });
}

function AuthBtn(login, password) {
    $.ajax({
        url: '../php/auth.php',
        type: 'POST',
        data: {login: login, password: password}, // Update the password key
        success: function (response) {
            let result = JSON.parse(response);
            console.log(result.status);
        },
        error: function () {
            alert('An error occurred during the authentication process.');
        }
    });
}


$(document).ready(function () {
    $('#reg_btn').click(function () {
        let login = $('#login_field_reg');
        let password = $('#password_field_reg');
        let login_txt = login.val();
        let password_txt = password.val();

        switch (true) {
            case login_txt.includes(' ') || login_txt === '':
                login.css('background-color', 'red');
                break;
            case password_txt.includes(' ') || password_txt === '':
                password.css('background-color', 'red');
                break;
            default:
                login.css('background-color', '');
                password.css('background-color', '');

                RegBtn(login_txt, password_txt);
                break;
        }
    });
});

$(document).ready(function () {
    $('#auth_btn').click(function () {
        let login_txt = $('#login_field_auth').val();
        let password_txt = $('#password_field_auth').val();

        AuthBtn(login_txt, password_txt);
    });
});