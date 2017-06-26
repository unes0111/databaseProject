<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class ParcelPostService extends DbModel
{
    /**
     * @var int
     */
    public $ParcelPostId;

    /**
     * @var int
     */
    public $PostServiceId;

    /**
     * ParcelPostService constructor.
     * @param int $parcelPostId
     * @param int $postServiceId
     */
    function __construct($parcelPostId, $postServiceId)
    {
        $this->ParcelPostId = $parcelPostId;
        $this->PostServiceId = $postServiceId;
    }


    static function createFromDbResult($dbResult)
    {
        $list = array();
        foreach ($dbResult as $row)
        {
            $item = new ParcelPostService($row["ParcelPostId"], $row["PostServiceId"]);
            array_push($list, $item);
        }
        return $list;
    }
}