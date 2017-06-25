<?php

/**
 * Created by PhpStorm.
 * User: Shima
 * Date: 6/27/2017
 * Time: 5:12 AM
 */
class Worksfor extends DbModel
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
     * Worksfor constructor.
     * @param $employeeId
     * @param $startDate
     * @param $finishDate
     * @param $isManager
     * @param $postOfficeId
     */
    function __construct($employeeId, $startDate, $finishDate, $isManager, $postOfficeId)
    {
        $this->EmployeeId = $employeeId;
        $this->StartDate = $employeeId;
        $this->FinishDate = $finishDate;
        $this->IsManager = $isManager;
        $this->PostOfficeId = $postOfficeId;
    }
}