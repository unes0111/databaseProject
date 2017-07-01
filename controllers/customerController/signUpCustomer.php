<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/controllers/shared/Utils.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/serviceLayer/CustomerService.php');

$data = shared::getPostRequestJsonData();
$succes = CustomerService::signUpCustomer(trim($data->Email), trim($data->Password), trim($data->Lastdegree));

if ($succes)
{
    $_SESSION["message"] = "you are now loged in";
     shared::redirect("/services.php");
}
echo (new ApiResult($exists))->Json();
?>


