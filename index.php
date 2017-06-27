<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title2</title>
</head>
<body>
<?php

// TODO : بررسی مجدد مدل ها
// TODO : تبدیل int ها به bigint


error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_PARSE);

echo "HI";
echo 'shima';

require_once 'dataLayer/DbContext.php';

$db = new DbContext();
//$list = $db->select(City::class);
//$person = new RealPerson(1234567890, 'علی', 'راهبر', 4715263848, '09114251425', '05132461874', 'مشهد بین طالقانی 8 پلاک 9');
//$employee = new Employee(1234567890, 'email@mail.com', 2, 'alipass123');
//$postoffice = new PostOffice(null, 'دفتر مشهد', 0, 3, 4, 5, 6);
//$worksfor = new WorksFor(1234567890, new DateTime('2023-01-14'), null, false, 1);
//var_dump($db->insert($person));
//var_dump($db->insert($employee));
//var_dump($db->insert($postoffice));
//var_dump($db->insert($worksfor));
//var_dump($db->update(City::class,"Name = 'اردبیل', ParentId = null",'Id = 3'))
//$first = $db->firstOrDefault($list, ['Name' => 'تهران']);
//var_dump($db->delete(City::class, 'parentId = 3'))
//var_dump($first);
//var_dump($list);

?>

</body>
</html>
