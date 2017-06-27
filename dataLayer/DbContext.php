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


    /**
     * if insert failed returns false, else returns inserted element id
     * <br>
     * تنها در صورتی شناسه موجودیت را برمی گرداند که شناسه به طور خودکار تولید شده باشد.
     * @param DbModel $model
     * @return bool|int|string
     */
    function insert(DbModel $model)
    {
        $modelClass = get_class($model);

        $fields = '';
        $values = '';
        $keys = array_keys(get_object_vars($model));

        foreach ($keys as $key)
        {
            $fields = $fields . "" . strtolower($key) . ", ";
            $fieldValue = $model->$key;
            if ($fieldValue === null)
                $value = "NULL, ";
            elseif (get_class($fieldValue) == DateTime::class)
                $value = "'" . $fieldValue->date . "', ";
            elseif (is_bool($fieldValue))
                $value = "b'" . $fieldValue . "', ";
            else
                $value = "'" . $fieldValue . "', ";
            $values = $values . $value;
        }
        $fields = substr($fields, 0, strlen($fields) - 2);
        $values = substr($values, 0, strlen($values) - 2);
        $command = "INSERT INTO " . strtolower($modelClass) . "(" . $fields . ") VALUES (" . $values . ");";
        $connection = $this->connect();
        $result = mysqli_query($connection, $command);
        $id = mysqli_insert_id($connection);
        mysqli_close($connection);
        return $result != false ? $id : $result;
    }


    /**
     * @param string $modelClass
     * @param string $set
     * @param string $condition
     * @return bool
     */
    function update(string $modelClass, string $set, string $condition): bool
    {
        if (trim($set) == '' || trim($condition) == '')
            return false;

        $command = "UPDATE " . strtolower($modelClass) . " SET " . trim($set) . " WHERE " . trim($condition) . ";";
        $connection = $this->connect();
        $result = mysqli_query($connection, $command);
        mysqli_close($connection);
        return $result;
    }


    /**
     * @param $modelClass
     * @param $condition
     * @return bool
     */
    function delete(string $modelClass, string $condition): bool
    {
        if (trim($condition) == '')
            return false;

        $command = "DELETE FROM " . strtolower($modelClass) . " WHERE " . trim($condition) . ";";
        $connection = $this->connect();
        $result = mysqli_query($connection, $command);
        mysqli_close($connection);
        return $result;
    }


    /**
     * @param $modelClass
     * @return bool
     */
    function deleteAll(string $modelClass): bool
    {
        $command = "DELETE FROM " . strtolower($modelClass) . " WHERE 1=1;";
        $connection = $this->connect();
        $result = mysqli_query($connection, $command);
        mysqli_close($connection);
        return $result;
    }


    /**
     * @param $command
     * @return bool|mysqli_result
     */
    function executeRawSqlCommand(string $command)
    {
        $connection = $this->connect();
        $result = mysqli_query($connection, $command);
        mysqli_close($connection);
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