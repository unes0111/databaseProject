<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class WorksFor extends DbModel
{
    /**
     * @var int
     */
    public $EmployeeId;

    /**
     * @var DateTime
     */
    public $StartDate;

    /**
     * @var DateTime
     */
    public $FinishDate;

    /**
     * @var boolean
     */
    public $IsManager;

    /**
     * @var int
     */
    public $PostOfficeId;


    /**
     * WorksFor constructor.
     * @param int $employeeId
     * @param DateTime $startDate
     * @param DateTime $finishDate
     * @param bool $isManager
     * @param int $postOfficeId
     */
    function __construct($employeeId, $startDate, $finishDate, $isManager, $postOfficeId)
    {
        $this->EmployeeId = $employeeId;
        $this->StartDate = $startDate;
        $this->FinishDate = $finishDate;
        $this->IsManager = $isManager;
        $this->PostOfficeId = $postOfficeId;
    }
}