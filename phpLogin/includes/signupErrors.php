<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
        else if($_GET["error"] == "invalidusername"){
            echo "<p>Choose a proper username!</p>";
        }
        else if($_GET["error"] == "invalidemail"){
            echo "<p>Write a proper email!</p>";
        }
        else if($_GET["error"] == "passwordsdontmatch"){
            echo "<p>Passwords doesn't match!</p>";
        }
        else if($_GET["error"] == "userexists"){
            echo "<p>User already exists!</p>";
        }
        else if($_GET["error"] == "statementfailed"){
            echo "<p>Something went wrong!</p>";
        }
        else if($_GET["error"] == "none"){
            echo "<p>You have signed up!</p>";
        }
        
    }


?>