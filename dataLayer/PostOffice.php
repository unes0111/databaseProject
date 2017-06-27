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
     * کد استان
     * @var int
     */
    public $StateId;

    /**
     * کد شهرستان
     * @var int
     */
    public $CityId;

    /**
     * کد بخش
     * @var int
     */
    public $SectionId;

    /**
     * کد دهستان
     * @var int
     */
    public $RuralId;

    /**
     * PostOffice constructor.
     * @param int $id
     * @param string $name
     * @param int $typeCode
     * @param int $stateId کد استان
     * @param int $cityId کد شهرستان
     * @param int $sectionId کد بخش
     * @param int $ruralId کد دهستان
     */
    function __construct($id, $name, $typeCode, $stateId, $cityId, $sectionId, $ruralId)
    {
        $this->Id = $id;
        $this->Name = $name;
        $this->TypeCode = $typeCode;
        $this->StateId = $stateId;
        $this->CityId = $cityId;
        $this->SectionId = $sectionId;
        $this->RuralId = $ruralId;
    }
}