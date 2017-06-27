<?php
    $Email=$POST['Email'];
    $Password=$POST['Password'];
    $LastDegreeCode=$POST['LastDegreeCode'];
    $RealPersonId=$POST['RealPersonId'];

    $Email=stripcslashes($Email);
    $Password=stripcslashes($Password);
    $LastDegreeCode=stripcslashes($LastDegreeCode);
    $RealPersonId=stripcslashes($RealPersonId);

    mysql_connect("localhost","root","root");
    mysql_select_db("login");

    //whaaaaat?
    $result=mysql_query("select * from ");

?>
