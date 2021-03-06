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
}