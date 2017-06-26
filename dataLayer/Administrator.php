<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class Administrator extends DbModel
{
    /**
     * @var int
     */
    public $RealPersonId;

    /**
     * @var string
     */
    public $Email;

    /**
     * @var string
     */
    public $Password;


    /**
     * Administrator constructor.
     * @param int $realPersonId
     * @param string $email
     * @param string $password
     */
    function __construct($realPersonId, $email, $password)
    {
        $this->RealPersonId = $realPersonId;
        $this->Email = $email;
        $this->Password = $password;
    }


    static function createFromDbResult($dbResult)
    {
        $list = array();
        foreach ($dbResult as $row)
        {
            $item = new Administrator($row["RealPersonId"], $row["Email"], $row["Password"]);
            array_push($list, $item);
        }
        return $list;
    }
}