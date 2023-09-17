<?php
    include_once 'header.php'
?>

    <h2>Sign Up</h2>
        <form action="./includes/signup.inc.php" method="post">
            <input type="text" name="firstName" placeholder="Firstname">
            <input type="text" name="lastName" placeholder="Lastname">
            <input type="text" name="userName" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="repeatPassword" placeholder="Repeat Password">
            <button type="submit" name="submit">Sign Up</button>
        </form>

        

<?php
    include_once 'footer.php'
?>