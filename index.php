<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
require_once 'dataLayer/DbContext.php';

$c = new DbContext();

//$list = $c->select(City::class);

function h_type2txt($type_id)
{
    static $types;

    if (!isset($types))
    {
        $types = array();
        $constants = get_defined_constants(true);
        foreach ($constants['mysqli'] as $c => $n) if (preg_match('/^MYSQLI_TYPE_(.*)/', $c, $m)) $types[$n] = $m[1];
    }

    return array_key_exists($type_id, $types) ? $types[$type_id] : NULL;
}

function h_flags2txt($flags_num)
{
    static $flags;

    if (!isset($flags))
    {
        $flags = array();
        $constants = get_defined_constants(true);
        foreach ($constants['mysqli'] as $c => $n) if (preg_match('/MYSQLI_(.*)_FLAG$/', $c, $m)) if (!array_key_exists($n, $flags)) $flags[$n] = $m[1];
    }

    $result = array();
    foreach ($flags as $n => $t) if ($flags_num & $n) $result[] = $t;
    return implode(' ', $result);
}

$tables = $c->executeRawSqlCommand("SHOW TABLES;");

$filedTypes = array();
foreach ($tables as $row)
{
    var_dump($row);
    $table = reset($row);

    $list = $c->executeRawSqlCommand("SELECT * FROM " . $table);
    $fields = mysqli_fetch_fields($list);
    //var_dump($fields);
    foreach ($fields as $field)
    {
        $newType = h_type2txt($field->type);
        var_dump($field->name . '  :  ' . $newType);
        if (!in_array($newType, $filedTypes))
            array_push($filedTypes, $newType);
    }
}
var_dump($filedTypes);

?>

</body>
</html>
