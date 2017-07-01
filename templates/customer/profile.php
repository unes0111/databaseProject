<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/controllers/shared/Utils.php');


require_once($_SERVER['DOCUMENT_ROOT'] . '/dataLayer/DbContext.php');
Utils::setSession(
    ["Customer" => new Customer("uens@mail.com", 'pass', 9, 2051125024, null),
        "Customer_Person" => new LegalPerson('346A21', 4126481362, 'همتا رایانه',
            4, '05132463515', 'مشهد بلوار ملک آباد')]);

// "Customer_Person" => new RealPerson(2051125024, 'یونس', 'حق جو', 4736154826, '09901067055', null, 'بابل بندپی شرقی')

// check session
if (!Utils::hasSession(["Customer"]))
{
    Utils::redirect("login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>login page</title>
    <script src="/static/scripts/jquery/jquery-3.2.1.js"></script>
    <link rel="stylesheet" href="/static/css/bootstrap/bootstrap.3.3.7.min.css">
    <script src="/static/scripts/bootstrap/bootstrap.3.3.7.min.js"></script>
    <script src="/static/scripts/js/utils.js"></script>

    <script src="/static/scripts/js/customer/profile.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/index.php">Courier Service</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/index.php">Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span
                            class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Page 1-1</a></li>
                    <li><a href="#">Page 1-2</a></li>
                    <li><a href="#">Page 1-3</a></li>
                </ul>
            </li>
            <li><a href="#">Page 2</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>
                    <?php
                    $person = Utils::getFromSession("Customer_Person");
                    if ($person != null && isset($person->FirstName))
                        echo $person->FirstName . ' ' . $person->LastName;
                    else if ($person != null && isset($person->CompanyName))
                        echo $person->CompanyName;
                    else
                        echo 'User';
                    ?>
                </a></li>
            <li><a href="#" onclick="logoutCustomer()"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">

    <div class="panel panel-primary">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
            <form>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <!--                <div class="checkbox">-->
                <!--                    <label><input type="checkbox"> Remember me</label>-->
                <!--                </div>-->
                <button type="button" class="btn btn-default" onclick="loginCustomer()">submit</button>
            </form>
        </div>
    </div>

</div>

</body>
</html>