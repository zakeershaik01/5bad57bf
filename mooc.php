<!DOCTYPE html>
<html>
<head>
    <title>Shaik Zakeer Pasha 5bad57bf</title>
</head>
<body>
<h1>Welcome to my guessing game</h1>

<?php
// Set the correct number for the guessing game
$correctnumber = 59;

// Check if the 'guess' parameter exists in the URL
if (isset($_GET['guess'])) {
    $guess = $_GET['guess'];

    // Check if the guess is not a number
    if (!is_numeric($guess)) {
        echo "Your guess is not a number";
    }
    // Check if the guess is too low
    else if ($guess < $correctnumber) {
        echo "Your guess is too low";
    }
    // Check if the guess is too high
    else if ($guess > $correctnumber) {
        echo "Your guess is too high";
    }
    // Check if the guess is correct
    else if ($guess == $correctnumber) {
        echo "Congratulations - You are right!";
    }
} else {
    // If no 'guess' parameter, provide feedback
    echo "Missing guess parameter <br> Your guess is too short";
}
?>
</body>
</html>
