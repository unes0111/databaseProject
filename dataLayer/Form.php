<?php


class Form extends DbModel
{
    /**
     * @var int
     */
    public $TrackNumber;

    /**
     * @var int
     */
    public $ParcelPostId;

    /**
     * @var string
     */
    public $CustomerId;

    /**
     * @var string
     */
    public $RecipientId;

    /**
     * @var int
     */
    public $PostOfficeId;

    /**
     * @var int
     */
    public $EmployeeId;

    /**
     * @var int
     */
    public $PostmanId;

    /**
     * @var int
     */
    public $StatusCode;

    /**
     * @var DateTime
     */
    public $RegisterDate;

    /**
     * @var DateTime
     */
    public $DeliveryDate;


    /**
     * Form constructor.
     * @param int $trackNumber
     * @param int $parcelPostId
     * @param string $customerId
     * @param string $recipientId
     * @param int $postOfficeId
     * @param int $employeeId
     * @param int $postmanId
     * @param int $statusCode
     * @param DateTime $registerDate
     * @param DateTime $deliveryDate
     */
    function __construct(int $trackNumber, int $parcelPostId, string $customerId, string $recipientId, int $postOfficeId,
                         int $employeeId, int $postmanId, int $statusCode, DateTime $registerDate, DateTime $deliveryDate)
    {
        $this->TrackNumber = $trackNumber;
        $this->ParcelPostId = $parcelPostId;
        $this->CustomerId = $customerId;
        $this->RecipientId = $recipientId;
        $this->PostOfficeId = $postOfficeId;

        $this->EmployeeId = $employeeId;
        $this->PostmanId = $postmanId;
        $this->StatusCode = $statusCode;
        $this->RegisterDate = $registerDate;
        $this->DeliveryDate = $deliveryDate;
    }
}