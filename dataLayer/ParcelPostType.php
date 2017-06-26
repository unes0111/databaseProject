<?php


class ParcelPostType extends DbModel
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
     * ParcelPostType constructor.
     * @param int $id
     * @param string $title
     */
    function __construct(int $id, string $title)
    {
        $this->Id = $id;
        $this->Title = $title;
    }
}