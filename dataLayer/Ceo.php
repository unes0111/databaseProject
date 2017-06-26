<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class Ceo extends DbModel
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
     * @var string
     */
    public $Password;


    /**
     * Ceo constructor.
     * @param int $realPersonId
     * @param DateTime $startDate
     * @param DateTime $finishDate
     * @param string $email
     * @param string $password
     */
    function __construct($realPersonId, $startDate, $finishDate, $email, $password)
    {
        $this->RealPersonId = $realPersonId;
        $this->StartDate = $startDate;
        $this->FinishDate = $finishDate;
        $this->Email = $email;
        $this->Password = $password;
    }
}