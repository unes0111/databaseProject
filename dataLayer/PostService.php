<?php


class PostService extends DbModel
{
    /**
     * @var int
     */
    public $Id;

    /**
     * @var string
     */
    public $Name;

    /**
     * @var int
     */
    public $Cost;

    /**
     * PostService constructor.
     * @param int $id
     * @param string $name
     * @param int $cost
     */
    function __construct(int $id, string $name, int $cost)
    {
        $this->Id=$id;
        $this->Name=$name;
        $this->Cost=$cost;
    }
}