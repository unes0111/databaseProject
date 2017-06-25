<?php

/**
 * Created by PhpStorm.
 * User: Shima
 * Date: 6/27/2017
 * Time: 5:47 AM
 */
class Parcelposttype extends DbModel
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
     * Parcelposttype constructor.
     * @param int $id
     * @param string $title
     */
    function __construct(int $id, string $title)
    {
        $this->Id = $id;
        $this->Title = $title;
    }
}