<?php

/**
 * Created by PhpStorm.
 * User: Shima
 * Date: 6/27/2017
 * Time: 5:31 AM
 */
class Postservice extends DbModel
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
     * Postservice constructor.
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