<?php

/**
 * Created by PhpStorm.
 * User: Shima
 * Date: 6/27/2017
 * Time: 5:51 AM
 */
class Parcelpost extends DbModel
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
     * Parcelpost constructor.
     * @param int $id
     * @param string $title
     * @param int $typeId
     * @param int $weight
     * @param string $statusCode
     * @param string $statusDescription
     * @param int $description
     * @param int $cost
     * @param int $timeLimit
     */
    function __construct(int $id, string $title, int $typeId, int $weight, string $statusCode, string $statusDescription, int $description, int $cost, int $timeLimit)
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