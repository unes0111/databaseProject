<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


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
    function __construct($id, $title)
    {
        $this->Id = $id;
        $this->Title = $title;
    }
}