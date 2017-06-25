<?php

/**
 * Created by PhpStorm.
 * User: Shima
 * Date: 6/27/2017
 * Time: 5:49 AM
 */
class Parcelpostservice extends DbModel
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
     * Parcelpostservice constructor.
     * @param int $parcelPostId
     * @param int $postServiceId
     */
    function __construct(int $parcelPostId, int $postServiceId)
    {
        $this->ParcelPostId = $parcelPostId;
        $this->PostServiceId = $postServiceId;
    }
}