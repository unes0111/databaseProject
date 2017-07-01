function logoutCustomer() {
    ajax_GET("/controllers/customerController/logout.php",
        function (data) {
            console.log(data);
            redirect('login.php');
        },
        function (error1, error2, error3) {
            console.log(error1);
            console.log(error2);
            console.log(error3);
        });
}