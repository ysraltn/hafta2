<!DOCTYPE html>
<html lang="tr">

<head>
<title>ornek</title>
</head>

<body>
    <?php
    
    $Deger1 = "deger1";
    $Deger2 = "deger2";

    $Deger3 = "{$Deger1} ve {$Deger2}"; //cok dogru bir kullanim degil
    $Deger4 = $Deger1 . " ve " . $Deger2; //daha dogru

    echo $Deger3;
    echo "<br \>";
    echo $Deger4;
    

    ?>
</body>