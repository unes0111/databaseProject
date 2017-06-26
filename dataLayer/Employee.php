<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class Employee extends DbModel
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
     * @var int
     */
    public $StatusCode;

    /**
     * @var string
     */
    public $Password;


    /**
     * Employee constructor.
     * @param int $realPersonId
     * @param string $email
     * @param int $statusCode
     * @param string $password
     */
    function __construct($realPersonId, $email, $statusCode, $password)
    {
        $this->RealPersonId = $realPersonId;
        $this->Email = $email;
        $this->StatusCode = $statusCode;
        $this->Password = $password;
    }
}