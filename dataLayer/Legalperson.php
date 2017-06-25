<?php


class Legalperson extends DbModel
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
     * Legalperson constructor.
     * @param string $nationalId
     * @param int $postCode
     * @param string $companyName
     * @param int $organizationTypeCode
     * @param string $phoneNumber
     * @param string $address
     */
    function __construct(string $nationalId, int $postCode, string $companyName, int $organizationTypeCode,
                         string $phoneNumber, string $address)
    {
        $this->NationalId = $nationalId;
        $this->PostCode = $postCode;
        $this->CompanyName = $companyName;
        $this->OrganizationTypeCode = $organizationTypeCode;
        $this->PhoneNumber = $phoneNumber;
        $this->Address = $address;
    }
}