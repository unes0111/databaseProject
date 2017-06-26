<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class Customer extends DbModel
{
    /**
     * @var string
     */
    public $Email;

    /**
     * @var string
     */
    public $Password;

    /**
     * @var int
     */
    public $LastDegreeCode;

    /**
     * @var int
     */
    public $RealPersonId;

    /**
     * @var string
     */
    public $LegalPersonId;


    /**
     * Customer constructor.
     * @param string $email
     * @param string $password
     * @param int $lastDegreeCode
     * @param int $realPersonId
     * @param string $legalPersonId
     */
    function __construct($email, $password, $lastDegreeCode, $realPersonId, $legalPersonId)
    {
        $this->Email = $email;
        $this->Password = $password;
        $this->LastDegreeCode = $lastDegreeCode;
        $this->RealPersonId = $realPersonId;
        $this->LegalPersonId = $legalPersonId;
    }
}