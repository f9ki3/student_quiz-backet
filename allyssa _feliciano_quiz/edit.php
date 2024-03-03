<?php
session_start();

// Check if the form was submitted
if (isset($_POST['edit'])) {
    // Load the XML file
    $xmlFile = 'Feliciano_Allyssa.xml';
    $users = simplexml_load_file($xmlFile);

    // Find the user with the specified ID
    foreach ($users->user as $user) {
        if ($user->id == $_POST['id']) {
            // Update the user's information
            $user->student_name = $_POST['student_name'];
            $user->q1 = $_POST['q1'];
            $user->q2 = $_POST['q2'];
            $user->q3 = $_POST['q3'];
            $user->q4 = $_POST['q4'];
            $user->q5 = $_POST['q5'];
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
