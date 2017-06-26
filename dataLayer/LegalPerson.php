<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class LegalPerson extends DbModel
{
    /**
     * @var string
     */
    public $NationalId;

    /**
     * @var int
     */
    public $PostCode;

    /**
     * @var string
     */
    public $CompanyName;

    /**
     * @var int
     */
    public $OrganizationTypeCode;

    /**
     * @var string
     */
    public $PhoneNumber;

    /**
     * @var string
     */
    public $Address;


    /**
     * LegalPerson constructor.
     * @param string $nationalId
     * @param int $postCode
     * @param string $companyName
     * @param int $organizationTypeCode
     * @param string $phoneNumber
     * @param string $address
     */
    function __construct($nationalId, $postCode, $companyName, $organizationTypeCode, $phoneNumber, $address)
    {
        $this->NationalId = $nationalId;
        $this->PostCode = $postCode;
        $this->CompanyName = $companyName;
        $this->OrganizationTypeCode = $organizationTypeCode;
        $this->PhoneNumber = $phoneNumber;
        $this->Address = $address;
    }


    static function createFromDbResult($dbResult)
    {
        $list = array();
        foreach ($dbResult as $row)
        {
            $item = new LegalPerson($row["NationalId"], $row["PostCode"], $row["CompanyName"], $row["OrganizationTypeCode"],
                $row["PhoneNumber"], $row["Address"]);
            array_push($list, $item);
        }
        return $list;
    }
}