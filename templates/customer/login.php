<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/shared.php');

// set session
// shared::setSession(["Customer_Email" => 3, "Customer_Password" => 'x']);

// check session
if (shared::hasSession(["Customer_Email", "Customer_Password"]))
{
    shared::redirect("/index.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>login page</title>
    <link rel="stylesheet" type="text/css" href="/static/css/styles/customer/login.css">
    <script src="/static/scripts/jquery/jquery-3.2.1.js"></script>
    <script src="/static/scripts/js/customer/login.js"></script>
</head>
<body>
<div id="frm">
    <div>
        <div>
            <label>Email: </label>
            <input type="email" id="email" name="Email"/>
        </div>
        <div>
            <label>Password: </label>
            <input type="password" id="password" name="Password"/>
        </div>
        <div>
            <button type="button" id="btn" onclick="loginCustomer()">login</button>
        </div>
    </div>
</body>
</html>