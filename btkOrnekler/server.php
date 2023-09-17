<!DOCTYPE html>
<html lang="tr">

<head>
<title>ornek</title>
</head>
<body>
    <?php
        //dosyanin server icindeki konumu
        echo $_SERVER["PHP_SELF"] . "<br>";

        echo $_SERVER["GATEWAY_INTERFACE"] . "<br>";

        echo $_SERVER["SERVER_ADDR"] . "<br>";

    ?>
</body>