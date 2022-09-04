<?php // Do not put any HTML above this line

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: cdh.php");
    return;
}

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';


$failure = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['who']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
        $failure = "User name and password are required";
    } else {
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) {
            // Redirect the browser to game.php
            header("Location: cdhgame.php?name=".urlencode($_POST['who']));
            return;
        } else {
            $failure = "Incorrect password";
        }
    }
}

// Fall through into the View
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Control Data Hub</title>
    <link rel="stylesheet" href="css/stylecdh.css">
</head>
<body>
    <header>
        <h1>Welcome To The New World Of Theo Laubsher</h1>
        <nav class="navbar">
                <a href='index.html'><strong>Home |</strong></a>
                <a href='index.html'><strong>About Me |</strong></a>
                <a href='cdh.html'><strong>Control Data Hub |</strong></a>
                <a href='cdh.php'><strong>Play a Game |</strong></a>
                <p>Please note all links will redirect to this <strong>Home page</strong> only until this web page is done constructed</p> 
        </nav>
    </header>
        <div class="bl1">
            <h1>Please Log In</h1>
                <?php
                // Note triple not equals and think how badly double
                // not equals would work here...
                if ( $failure !== false ) {
                    // Look closely at the use of single and double quotes
                    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
                }
                ?>
                <form method="POST">
                <label for="nam">User Name</label>
                <input type="text" name="who" id="nam">
                    <br>
                <label for="id_1723">Password</label>
                <input type="text" name="pass" id="id_1723">
                    <br>
                <input type="submit" value="Log In">
                <input type="submit" name="cancel" value="Cancel">
                </form>
                <p>
                You can enter your name in the <strong>"User Name"</strong> field:<br>
                Password = "php123"
                </p>
        </div>
    
    <footer>
        <h2 class="footerh2">My Company in Progress: Control Data Hub</h2>
        <img src = "https://600020.github.io/cdh/CDH.png" alt = "logo"/>
        <div class="footbar">
        <p><strong>The CDH logo is still in progress</strong></p></div>
        <p>This page was created by Theo Laubsher &amp; The official Home page for Control Data Hub can be found at: 
        <a href='index.html'>Control Data Hub |(To be)</a>
        </p>
    </footer>

</body>
</html>