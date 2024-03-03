<?php
session_start();

// Check if the form was submitted
if (isset($_POST['edit'])) {
    // Load the XML file
    $xmlFile = 'Hernandez_Rhealuz.xml';
    $users = simplexml_load_file($xmlFile);

    // Find the user with the specified ID
    foreach ($users->user as $user) {
        if ($user->id == $_POST['id']) {
            // Update the user's information
            $user->basket_owner = $_POST['basket_owner'];
            $user->f1 = $_POST['f1'];
            $user->f2 = $_POST['f2'];
            $user->f3 = $_POST['f3'];
            $user->f4 = $_POST['f4'];
            $user->f5 = $_POST['f5'];
            break;
        }
    }

    // Save the changes back to the XML file
    file_put_contents($xmlFile, $users->asXML());

    // Set a success message and redirect
    $_SESSION['message'] = 'Member updated successfully';
    header('location: index.php');
} else {
    // If the form was not submitted, set an error message and redirect
    $_SESSION['message'] = 'Select member to edit first';
    header('location: index.php');
}
?>
