<?php


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
    function __construct(int $employeeId, DateTime $startDate, DateTime $finishDate, boolean $isManager, int $postOfficeId)
    {
        $this->EmployeeId = $employeeId;
        $this->StartDate = $employeeId;
        $this->FinishDate = $finishDate;
        $this->IsManager = $isManager;
        $this->PostOfficeId = $postOfficeId;
    }
}