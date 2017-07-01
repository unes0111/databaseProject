<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/controllers/shared/Utils.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/serviceLayer/CustomerService.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/serviceLayer/RealPersonService.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/serviceLayer/LegalPersonService.php');

$data = Utils::getPostRequestJsonData();
$exists = CustomerService::existsCustomer(trim($data->Email), trim($data->Password));

if ($exists)
{
    $customer = CustomerService::getCustomer(trim($data->Email));
    $person = $customer->RealPersonId != null ?
        RealPersonService::getPerson($customer->RealPersonId) :
        LegalPersonService::get($customer->LegalPersonId);
    Utils::setSession(["Customer" => $customer, "Customer_Person" => $person]);

}
echo (new ApiResult($exists))->Json();