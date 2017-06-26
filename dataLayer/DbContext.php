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


    function delete($modelClass, $condition): bool
    {
        $_condition = (!isset($condition) || $condition == null) ? '' : trim($condition);
        $command = "DELETE FROM " . strtolower($modelClass) . " WHERE " . ($_condition == '' ? '1=1' : $_condition) . ";";
        $connection = $this->connect();
        $result = mysqli_query($connection, $command);

        $list = array();
        $fields = mysqli_fetch_fields($result);

        if ($result && mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                $item = new $modelClass();
                foreach ($fields as $field)
                {
                    $fieldName = $field->name;
                    $item->$fieldName = $row[$fieldName];
                }
                array_push($list, $item);
            }
        }

        mysqli_close($connection);
        $connection = null;
        return $list;
    }


    /**
     * @param $command
     * @return bool|mysqli_result
     */
    function executeRawSqlCommand($command)
    {
        $connection = $this->connect();
        $result = mysqli_query($connection, $command);
        mysqli_close($connection);
        $connection = null;
        return $result;
    }


    /**
     * @param string $modelClass
     * @param $condition
     * @return array
     */
    function select(string $modelClass, $condition): array
    {
        $_condition = (!isset($condition) || $condition == null) ? '' : trim($condition);
        $command = "SELECT * FROM " . strtolower($modelClass) . " WHERE " . ($_condition == '' ? '1=1' : $_condition) . ";";
        $connection = $this->connect();
        $result = mysqli_query($connection, $command);

        $list = array();
        $fields = mysqli_fetch_fields($result);

        if ($result && mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                $item = new $modelClass();
                foreach ($fields as $field)
                {
                    $fieldName = $field->name;
                    $item->$fieldName = $row[$fieldName];
                }
                array_push($list, $item);
            }
        }

        mysqli_close($connection);
        $connection = null;
        return $list;
    }


    /**
     * @param array $list
     * @param array|null $conditions
     * @return the value of the first array element, or null if the array is empty.
     */
    static function firstOrDefault(array &$list, $conditions)
    {
        if ((!isset($conditions) || $conditions == null))
        {
            $first = reset($list);
            return $first ? $first : null;
        }

        $first = null;
        foreach ($list as $element)
        {
            $find = true;
            while ($condition = current($conditions))
            {
                $key = key($conditions);
                if ($element->$key != $condition)
                {
                    $find = false;
                    break;
                }
                next($conditions);
            }

            if ($find)
            {
                $first = $element;
                break;
            }
        }
        return $first;
    }

}