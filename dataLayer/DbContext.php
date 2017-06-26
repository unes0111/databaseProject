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
require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/PostMan.php');
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
        var_dump($command);
        $connection = $this->connect();
        $result = mysqli_query($connection, $command);

        $list = array();
        if ($result && mysqli_num_rows($result) > 0)
            while ($row = mysqli_fetch_assoc($result))
            {
                $item = null;
                var_dump($row);
//                if ($modelClass == Game::class)
//                    $item = new Game($row["Id"], $row["Name"]);
//
//                else if ($modelClass == User::class)
//                    $item = new User($row["Id"], $row["Nickname"], $row["IMEI"]);
//
//                else if ($modelClass == ScoreType::class)
//                    $item = new ScoreType($row["Id"], $row["Title"]);
//
//                else if ($modelClass == Score::class)
//                    $item = new Score($row["Id"], $row["ScoreType_Id"], $row["User_Id"], $row["Game_Id"], $row["Score"]);
//
//                if ($item != null)
//                    array_push($list, $item);
            }

        mysqli_close($connection);
        $connection = null;
        return $list;
    }
}