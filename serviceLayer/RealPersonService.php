<?php

require_once($_SERVER ['DOCUMENT_ROOT'] . '/dataLayer/DbContext.php');


class RealPersonService
{
    public static function getPerson(int $nationalId)
    {
        $db = new DbContext();
        $list = $db->select(RealPerson::class, 'NationalId = ' . $nationalId);
        return DbContext::firstOrDefault($list);
    }
}