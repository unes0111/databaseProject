<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbContext.php');


class LegalPersonService
{
    public static function getPerson(string $nationalId)
    {
        $db = new DbContext();
        $list = $db->select(LegalPerson::class, 'NationalId = ' . $nationalId);
        return DbContext::firstOrDefault($list);
    }
}