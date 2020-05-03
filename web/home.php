<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $data =  $_COOKIE['data'];
    $arryedData = explode('/',$data);
    $user = $arryedData[0];
    $password = $arryedData[1];
    echo $user . $password;
    ?>
</body>
</html>