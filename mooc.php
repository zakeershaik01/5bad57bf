<?php
// Demand a GET parameter
if ( !isset($_GET['name']) || strlen($_GET['name']) < 1 ) {
    die('Name parameter missing');
}

// If the user requested logout, redirect to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

// Set up the values for the game
// 0 is Rock, 1 is Paper, and 2 is Scissors
$names = array('Rock', 'Paper', 'Scissors');

// Get the human play; default is -1 if not set
$human = isset($_POST["human"]) ? $_POST['human'] + 0 : -1;

// Computer play is randomized
$computer = rand(0, 2);

// Function to determine the game result
function check($computer, $human) {
    if ($human == $computer) {
        return "Tie";
    } else if (
        ($human == 1 && $computer == 0) || 
        ($human == 2 && $computer == 1) || 
        ($human == 0 && $computer == 2)
    ) {
        return "You Win";
    } else {
        return "You Lose";
    }
}

// Determine the result of the game
$result = check($computer, $human);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rock Paper Scissors 5bad57bf</title> 
    <?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
    <h1>Rock Paper Scissors</h1>
    <?php
    if (isset($_REQUEST['name'])) {
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
if ($human == -1) {
    print "Please select a strategy and press Play.\n";
} else if ($human == 3) {
    for ($c = 0; $c < 3; $c++) {
        for ($h = 0; $h < 3; $h++) {
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
</body>
</html>
