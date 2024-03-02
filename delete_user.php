<?php
// Get posted data
$name = $_POST['name'];

// Load XML file
$xml = simplexml_load_file('users.xml');

// Find and remove user
$users = $xml->xpath("//user[name='{$name}']");
if (!empty($users)) {
    unset($users[0][0]);
}

// Save XML file
$xml->asXML('users.xml');

echo 'User deleted successfully!';
?>
