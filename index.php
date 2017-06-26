<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_PARSE);


require_once 'dataLayer/DbContext.php';

$c = new DbContext();

$list = $c->select(City::class);
$first = $c->firstOrDefault($list, ['Name' => 'تهران']);
var_dump($first);
//var_dump($list);

?>

</body>
</html>
