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
        $this->StartDate = $employeeId;
        $this->FinishDate = $finishDate;
        $this->IsManager = $isManager;
        $this->PostOfficeId = $postOfficeId;
    }


    static function createFromDbResult($dbResult)
    {
        $list = array();
        foreach ($dbResult as $row)
        {
            $item = new WorksFor($row["EmployeeId"], $row["StartDate"], $row["FinishDate"], $row["IsManager"], $row["PostOfficeId"]);
            array_push($list, $item);
        }
        return $list;
    }
}