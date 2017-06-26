<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/Administrator.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/Ceo.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/City.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/Customer.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/Employee.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/Form.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/LegalPerson.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/ParcelPost.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/ParcelPostService.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/ParcelPostType.php');



class DbContext
{

    function insert($model): bool
    {
    }

    function update($model): bool
    {

    }

    function delete($model): bool
    {

    }

    /**
     * @param $model
     * @param $condition
     * @return array
     */
    function select($model, $condition): array
    {

    }
}