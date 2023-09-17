<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
        else if($_GET["error"] == "wrongcredentials"){
            echo "<p>Wrong Credentials!</p>";
        }
    }


?>