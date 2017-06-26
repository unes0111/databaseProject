<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class City extends DbModel
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
    public $ParentId;


    /**
     * City constructor.
     * @param int $id
     * @param string $name
     * @param int $parentId
     */
    function __construct($id, $name, $parentId)
    {
        $this->Id = $id;
        $this->Name = $name;
        $this->ParentId = $parentId;
    }
}