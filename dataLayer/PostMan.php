<?php


class PostMan extends DbModel
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
     * PostMan constructor.
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