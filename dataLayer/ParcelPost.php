<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class ParcelPost extends DbModel
{
    /**
     * @var int
     */
    public $Id;

    /**
     * @var string
     */
    public $Title;

    /**
     * @var int
     */
    public $TypeId;

    /**
     * @var int
     */
    public $Weight;

    /**
     * @var int
     */
    public $StatusCode;

    /**
     * @var string
     */
    public $StatusDescription;

    /**
     * @var string
     */
    public $Description;

    /**
     * @var int
     */
    public $Cost;

    /**
     * @var int
     */
    public $TimeLimit;

    /**
     * ParcelPost constructor.
     * @param int $id
     * @param string $title
     * @param int $typeId
     * @param int $weight
     * @param int $statusCode
     * @param string $statusDescription
     * @param string $description
     * @param int $cost
     * @param int $timeLimit
     */
    function __construct($id, $title, $typeId, $weight, $statusCode, $statusDescription, $description, $cost, $timeLimit)
    {
        $this->Id = $id;
        $this->Title = $title;
        $this->TypeId = $typeId;
        $this->Weight = $weight;
        $this->StatusCode = $statusCode;
        $this->StatusDescription = $statusDescription;
        $this->Description = $description;
        $this->Cost = $cost;
        $this->TimeLimit = $timeLimit;
    }
}