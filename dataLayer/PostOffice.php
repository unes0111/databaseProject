<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbModel.php');


class PostOffice extends DbModel
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
    public $TypeCode;

    /**
     * @var int
     */
    public $StateId;

    /**
     * @var int
     */
    public $CityId;

    /**
     * @var int
     */
    public $SectionId;

    /**
     * @var int
     */
    public $RuralId;

    /**
     * PostOffice constructor.
     * @param int $id
     * @param string $name
     * @param int $typeCode
     * @param int $stateId
     * @param int $cityId
     * @param int $sectionId
     * @param int $ruralId
     */
    function __construct($id, $name, $typeCode, $stateId, $cityId, $sectionId, $ruralId)
    {
        $this->Id = $id;
        $this->Name = $name;
        $this->TypeCode = $typeCode;
        $this->StateId = $stateId;
        $this->CityId = $cityId;
        $this->StateId = $stateId;
        $this->CityId = $cityId;
        $this->SectionId = $sectionId;
        $this->RuralId = $ruralId;
    }
}