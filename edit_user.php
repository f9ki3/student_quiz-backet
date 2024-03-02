<?php
// Load the XML file
$xml = simplexml_load_file('data.xml');

// Find the user with ID 2 and change their email
foreach ($xml->user as $user) {
    if ($user->id == 2) {
        $user->email = 'newemail@example.com';
        break;
    }
}

// Save the changes back to the file
$xml->asXML('data.xml');

echo 'Data updated successfully!';
?>
