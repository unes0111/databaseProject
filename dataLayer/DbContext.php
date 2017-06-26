<?php

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
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/Postman.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/PostOffice.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/PostService.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/RealPerson.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/Recipient.php');
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/WorksFor.php');


class DbContext
{
    function __construct()
    {
    }


    /**
     * @return mysqli
     * @throws Exception
     */
    private function connect(): mysqli
    {
        $host = '127.0.0.1';
        $user = 'root';
        $pass = 'root';
        $database = 'courierservice';
        $port = '3306';

        $connection = new mysqli($host, $user, $pass, $database, $port);
        if (mysqli_connect_errno())
            throw new Exception(mysqli_connect_error());

        mysqli_set_charset($connection, "utf8");
        return $connection;
    }


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
     * @param string $modelClass
     * @param string $condition
     * @return array
     */
    function select(string $modelClass, $condition): array
    {
        $_condition = (!isset($condition) || $condition == null) ? '' : trim($condition);
        $command = "SELECT * FROM " . strtolower($modelClass) . " WHERE " . ($_condition == '' ? '1=1' : $_condition) . ";";
        $connection = $this->connect();
        $result = mysqli_query($connection, $command);

        $list = array();
        if ($result && mysqli_num_rows($result) > 0)
        {
            if ($modelClass == Administrator::class)
                $list = Administrator::createFromDbResult($result);

            else if ($modelClass == Ceo::class)
                $list = Ceo::createFromDbResult($result);

            else if ($modelClass == City::class)
                $list = City::createFromDbResult($result);

            else if ($modelClass == Customer::class)
                $list = Customer::createFromDbResult($result);

            else if ($modelClass == Employee::class)
                $list = Employee::createFromDbResult($result);

            else if ($modelClass == Form::class)
                $list = Form::createFromDbResult($result);

            else if ($modelClass == LegalPerson::class)
                $list = LegalPerson::createFromDbResult($result);

            else if ($modelClass == ParcelPost::class)
                $list = ParcelPost::createFromDbResult($result);

            else if ($modelClass == ParcelPostService::class)
                $list = ParcelPostService::createFromDbResult($result);

            else if ($modelClass == ParcelPostType::class)
                $list = ParcelPostType::createFromDbResult($result);

            else if ($modelClass == Postman::class)
                $list = Postman::createFromDbResult($result);

            else if ($modelClass == PostOffice::class)
                $list = PostOffice::createFromDbResult($result);

            else if ($modelClass == PostService::class)
                $list = PostService::createFromDbResult($result);

            else if ($modelClass == RealPerson::class)
                $list = RealPerson::createFromDbResult($result);

            else if ($modelClass == Recipient::class)
                $list = Recipient::createFromDbResult($result);

            else if ($modelClass == WorksFor::class)
                $list = WorksFor::createFromDbResult($result);
        }

        mysqli_close($connection);
        $connection = null;
        return $list;
    }
}