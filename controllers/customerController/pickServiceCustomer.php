<?php
require_once($_SERVER ['DOCUMENT_ROOT'] . '/controllers/shared/Utils.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/serviceLayer/CustomerService.php');

$data = shared::getPostRequestJsonData();
$succes = CustomerService::pickServiceCustomer(trim($data->id), trim($data->name), trim($data->cost));

if ($succes)
{
    $_SESSION["message"] = "you choose your service type...enter information";
    shared::redirect("/parcelInfo.php");
}
echo (new ApiResult($exists))->Json();
?>