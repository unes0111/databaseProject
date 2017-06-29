<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/controllers/shared/Utils.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/serviceLayer/CustomerService.php');

$data = Utils::getPostRequestJsonData();
$exists = CustomerService::existsCustomer(trim($data->Email), trim($data->Password));

if ($exists)
{
    $_SESSION["Customer_Email"] = trim($data->Email);
    $_SESSION["Customer_Password"] = trim($data->Email);
}
echo (new ApiResult($exists))->Json();