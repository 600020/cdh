<?php

// Demand a GET parameter
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: cdh.php');
    return;
}

// Set up the values for the game...
// 0 is Rock, 1 is Paper, and 2 is Scissors
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human']+0 : -1;

$computer = 0; // Hard code the computer to rock

$computer = rand(0,2);

// This function takes as its input the computer and human play
// and returns "Tie", "You Lose", "You Win" depending on play
// where "You" is the human being addressed by the computer
function check($computer, $human) {

    if ( $human == 0 & $computer == 0 ) {
        return "Tie";
    } else if ( $human == 1 & $computer == 1) {
        return "Tie";
    } else if ( $human == 2 & $computer == 2 ) {
        return "Tie";
    } else if ( $human == 1 & $computer == 0 ) {
        return "You Win";
    } else if ( $human == 2 & $computer == 0 ) {
        return "You Lose";
    } else if ( $human == 0 & $computer == 1 ) {
        return "You Lose";
    } else if ( $human == 0 & $computer == 2 ) {
        return "You Win";
    } else if ( $human == 2 & $computer == 1 ) {
        return "You Win";
    } else if ( $human == 1 & $computer == 2 ) {
        return "You Lose";
    }
}

// Check to see how the play happenned
$result = check($computer, $human);

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
                <h1>Rock Paper Scissors</h1>
                <?php
                if ( isset($_REQUEST['name']) ) {
                    echo "<p>Welcome: ";
                    echo htmlentities($_REQUEST['name']);
                    echo "</p>\n";
                }
                ?>
                <form method="post">
                <select name="human">
                <option value="-1">Select</option>
                <option value="0">Rock</option>
                <option value="1">Paper</option>
                <option value="2">Scissors</option>
                <option value="3">Test</option>
                </select>
                <input type="submit" value="Play">
                <input type="submit" name="logout" value="Logout">
                </form>

                <pre>
                <?php
                if ( $human == -1 ) {
                    print "Please select a strategy and press Play.\n";
                } else if ( $human == 3 ) {
                    for($c=0;$c<3;$c++) {
                        for($h=0;$h<3;$h++) {
                            $r = check($c, $h);
                            print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
                        }
                    }
                } else {
                    print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
                }
                ?>
                </pre>
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