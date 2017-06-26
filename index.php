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

$list = $c->select(City::class);
var_dump($list);
?>

</body>
</html>
