<?php

/**
 * Created by PhpStorm.
 * User: Shima
 * Date: 6/27/2017
 * Time: 5:16 AM
 */
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
     * @param $email
     * @param $realPersonId
     * @param $legalPersonId
     */
    function __construct($email, $realPersonId, $legalPersonId)
    {
        $this->Email = $email;
        $this->RealPersonId = $realPersonId;
        $this->LegalPersonId = $legalPersonId;
    }
}