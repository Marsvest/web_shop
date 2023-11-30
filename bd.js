function RegBtn(login, password) {
    $.ajax({
        url: 'test.php',
        type: 'POST',
        data: {login: login, pass: password},
    });
}

$(document).ready(function () {
    $('#regbtn').click(function () {
        let login = $('#login_field');
        let password = $('#password_field');
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