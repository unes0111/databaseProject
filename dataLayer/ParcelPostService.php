<?php


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
    function __construct(int $parcelPostId, int $postServiceId)
    {
        $this->ParcelPostId = $parcelPostId;
        $this->PostServiceId = $postServiceId;
    }
}