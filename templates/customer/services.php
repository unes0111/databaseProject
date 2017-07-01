<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/shared.php');
?>


<!DOCTYPE html>
<html>
<head>
    <title>choose a service</title>
    <link rel="stylesheet" type="text/css" href="/static/css/styles/customer/login.css">
    <script src="/static/scripts/jquery/jquery-3.2.1.js"></script>
    <script src="/static/scripts/js/customer/login.js"></script>
</head>
<body>
<div id="frm">
    <div>
        <div>
            <label>Id: </label>
            <input type="number" id="id" name="Id"/>
        </div>
        <div>
            <label>name: </label>
            <input type="text" id="name" name="Name"/>
        </div>
        <div>
            <label>cost: </label>
            <input type="text" id="cost" name="Cost"/>
        </div>

        <div>
            <button type="button" id="btn" name="pick"  onclick="pickServiceCustomer()">enter services</button>
        </div>
    </div>
</body>

