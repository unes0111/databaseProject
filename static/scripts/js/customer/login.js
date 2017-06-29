//import * as $ from "../../jquery/jquery-3.2.1";

function loginCustomer() {
    let email = $('#email').val();
    let password = $('#password').val();

    if (email && email.trim() != '' && password && password.trim() != '') {
        $.ajax({
            url: "/controllers/customerController/existsCustomer.php",
            type: "POST",
            data: JSON.stringify(
                {
                    Email: email,
                    Password: password
                }
            ),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                console.log(data.IsSuccess);
            },
            error: function (errorData) {
                console.log(errorData);
            }
        });
    }
    else {
        $('#email').focus();
    }
}