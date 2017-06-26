<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class Recipient extends DbModel
{
    /**
     * @var string
     */
    public $Email;

    /**
     * @var int
     */
    public $RealPersonId;

    /**
     * @var string
     */
    public $LegalPersonId;

    /**
     * Recipient constructor.
     * @param string $email
     * @param int $realPersonId
     * @param string $legalPersonId
     */
    function __construct($email, $realPersonId, $legalPersonId)
    {
        $this->Email = $email;
        $this->RealPersonId = $realPersonId;
        $this->LegalPersonId = $legalPersonId;
    }
}