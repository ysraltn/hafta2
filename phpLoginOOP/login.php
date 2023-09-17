<?php
    include_once 'header.php'
?>
    <h2>Login</h2>
        <form action="./includes/login.inc.php" method="post">
            <input type="text" name="userName" placeholder="Username/Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Login</button>
        </form>


<?php
    include_once 'footer.php'
?>