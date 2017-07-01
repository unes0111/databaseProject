//import * as $ from "../../jquery/jquery-3.2.1";

function loginCustomer() {
    let email = $('#email').val();
    let password = $('#password').val();

    if (email && email.trim() != '' && password && password.trim() != '') {
        ajax_POST("/controllers/customerController/existsCustomer.php",
            {Email: email, Password: password},
            function (data) {
                console.log(data);
                redirect('profile.php');
            },
            function (error1, error2, error3) {
                console.log(error1);
                console.log(error2);
                console.log(error3);
            });
    }
    else {
        alert('Fill in the fields.');
        $('#email').focus();
    }
}
