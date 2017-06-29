<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbContext.php');


class CustomerService
{
    public static function existsCustomer(string $email, string $password){
        $db = new DbContext();
        $list = $db->select(Customer::class,'Email = ' . $email . ' AND Password = ' . $password);

        if(DbContext::firstOrDefault($list) != null)
            return true;
        return false;
    }
}