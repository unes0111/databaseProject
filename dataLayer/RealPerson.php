<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class RealPerson extends DbModel
{
    /**
     * @var int
     */
    public $NationalId;

    /**
     * @var string
     */
    public $FirstName;

    /**
     * @var string
     */
    public $LastName;

    /**
     * @var int
     */
    public $PostCode;

    /**
     * @var string
     */
    public $CellNumber;

    /**
     * @var string
     */
    public $PhoneNumber;

    /**
     * @var string
     */
    public $Address;

    /**
     * RealPerson constructor.
     * @param int $nationalId
     * @param string $firstName
     * @param string $lastName
     * @param int $postCode
     * @param string $cellNumber
     * @param string $phoneNumber
     * @param string $address
     */
    function __construct($nationalId, $firstName, $lastName, $postCode, $cellNumber, $phoneNumber, $address)
    {
        $this->NationalId = $nationalId;
        $this->FirstName = $firstName;
        $this->LastName = $lastName;
        $this->PostCode = $postCode;
        $this->CellNumber = $cellNumber;
        $this->PhoneNumber = $phoneNumber;
        $this->Address = $address;
    }
}