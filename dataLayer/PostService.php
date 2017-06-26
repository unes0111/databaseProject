<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


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
    function __construct($id, $name, $cost)
    {
        $this->Id = $id;
        $this->Name = $name;
        $this->Cost = $cost;
    }


    static function createFromDbResult($dbResult)
    {
        $list = array();
        foreach ($dbResult as $row)
        {
            $item = new PostService($row["Id"], $row["Name"], $row["Cost"]);
            array_push($list, $item);
        }
        return $list;
    }
}