<!DOCTYPE html>
<html>
<head>
    <title>login page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="frm">
        <form action="process.php" method="post">
            <p>
               <label>EMAIL:</label>
                <input type="email" id="user" name="user" />
            </p>
            <p>
                <label>PASSWORD:</label>
                <input type="password" id="pass" name="pass" />
            </p>
            <p>
                <label>Last Degree Code:</label>
                <input type="" id="degree" name="degree" />
            </p>
            <p>
                <label>Real personal ID:</label>
                <input type="" id="rid" name="rid" />
            </p>
            <p>
                <input type="submit" id="btn" value="login" />
            </p>
        </form>
    </div>
</body>
</html>