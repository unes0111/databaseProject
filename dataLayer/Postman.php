<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


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
    function __construct($realPersonId, $startDate, $finishDate, $email)
    {
        $this->RealPersonId = $realPersonId;
        $this->StartDate = $startDate;
        $this->FinishDate = $finishDate;
        $this->Email = $email;
    }


    static function createFromDbResult($dbResult)
    {
        $list = array();
        foreach ($dbResult as $row)
        {
            $item = new Postman($row["RealPersonId"], $row["StartDate"], $row["FinishDate"], $row["Email"]);
            array_push($list, $item);
        }
        return $list;
    }
}