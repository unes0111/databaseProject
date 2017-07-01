//import * as $ from "../../jquery/jquery-3.2.1";

function signUpCustomer() {
    let email = $('#email').val();
    let password = $('#password').val();
    let lastDegree = $('#lastDegree').val();

    if (email && email.trim() != '' && password && password.trim() != ''  && lastDegree && lastDegree.trim()!='') {
        $.ajax({
            url: "/controllers/customerController/signUpCustomer",
            type: "POST",
            data: JSON.stringify(
                {
                    Email: email,
                    Password: password,
                    LastDegree: lastDegree
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
}