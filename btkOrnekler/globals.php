<!DOCTYPE html>
<html lang="tr">

<head>
<title>ornek</title>
</head>
<body>
    <?php
        //local ve global degiskenleri birbirlerinin alanında kullandik
        //local alanda degiskenin onune global ifadesi getirilerek global alandan cagirilmasi da mumkundur.
        $degisken1 = "hello";
        $degisken3 = "merhaba";
        function func(){
            echo $GLOBALS["degisken1"];
            echo "<br>";
            $GLOBALS["degisken2"] = "hi";

            global $degisken3;
            echo $degisken3;
            echo "<br>";
        }
        func();
        echo $degisken2;
    ?>
</body>