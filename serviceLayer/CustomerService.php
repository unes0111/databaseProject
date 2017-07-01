<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbContext.php');


class CustomerService
{
    public static function existsCustomer(string $email, string $password)
    {
        $db = new DbContext();
        $list = $db->select(Customer::class, 'Email = ' . $email . ' AND Password = ' . $password);

        if (DbContext::firstOrDefault($list) != null)
            return true;
        return false;
    }


    public static function getCustomer(string $email): Customer
    {
        $db = new DbContext();
        $list = $db->select(Customer::class, 'Email = ' . $email);
        return DbContext::firstOrDefault($list);
    }


    public static function signUpCustomer(string $email, string $password, int $lastDegree)
    {
        $db = new DbContext();
        $list = $db->select(Customer::class, 'Email = ' . $email . ' AND Password = ' . $password . 'AND LastDegree=' . $lastDegree);
        if (isset($_POST['register']))
        {
            $db->insert(Customer::class);
        }
        if (DbContext::firstOrDefault($list) != null)
            return true;
        return false;
    }


    public static function pickServiceCustomer(int $id, string $name, int $cost)
    {
        $db = new DbContext();
        $list = $db->select(PostService::class, 'Id = ' . $id . ' AND Name = ' . $name . 'AND Cost=' . $cost);
        if (isset($_POST['pick']))
        {
            $db->insert(PostService::class);
        }
        if (DbContext::firstOrDefault($list) != null)
            return true;
        return false;
    }
}