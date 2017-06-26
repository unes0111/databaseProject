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

//$t = new City(null,'az',null);
//var_dump($t);

$c->select(City::class,'');

?>

</body>
</html>
