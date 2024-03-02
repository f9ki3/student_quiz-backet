<?php
// Get posted data
$users = json_decode($_POST['users'], true);

// Load XML file
$xml = simplexml_load_file('users.xml');

// Remove all existing users
foreach ($xml->user as $user) {
    unset($user[0]);
}

// Add new users
foreach ($users as $user) {
    $new_user = $xml->addChild('user');
    $new_user->addChild('name', $user['name']);
    $new_user->addChild('quiz1', $user['quiz1']);
    $new_user->addChild('quiz2', $user['quiz2']);
    $new_user->addChild('quiz3', $user['quiz3']);
    $new_user->addChild('quiz4', $user['quiz4']);
    $new_user->addChild('quiz5', $user['quiz5']);
    $new_user->addChild('average', $user['average']);
}

// Save XML file
$xml->asXML('users.xml');

echo 'Data saved successfully!';
?>
