<?php

/**
 * Created by PhpStorm.
 * User: Shima
 * Date: 6/27/2017
 * Time: 5:42 AM
 */
class Postman extends DbModel
{
    /**
     * @var int
     */
    public $RealPersonId;

    /**
     * @var DateTime
     */
    public $StartDate;

    /**
     * @var DateTime
     */
    public $FinishDate;

    /**
     * @var string
     */
    public $Email;

    /**
     * Postman constructor.
     * @param int $realPersonId
     * @param DateTime $startDate
     * @param DateTime $finishDate
     * @param string $email
     */
    function __construct(int $realPersonId, DateTime $startDate, DateTime $finishDate, string $email)
    {
        $this->RealPersonId = $realPersonId;
        $this->StartDate = $startDate;
        $this->FinishDate = $finishDate;
        $this->Email = $email;
    }
}