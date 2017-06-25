<?php

/**
 * Created by PhpStorm.
 * User: Shima
 * Date: 6/27/2017
 * Time: 5:24 AM
 */
class Realperson extends DbModel
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
     * Realperson constructor.
     * @param int $nationalId
     * @param string $firstName
     * @param string $lastName
     * @param int $postCode
     * @param string $cellNumber
     * @param int $phoneNumber
     * @param string $address
     */
    function __construct(int $nationalId, string $firstName, string $lastName, int $postCode, string $cellNumber, int $phoneNumber, string $address)
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