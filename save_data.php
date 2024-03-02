<?php
// Get posted data
$users = json_decode($_POST['users'], true);

// Load XML file
$xml = simplexml_load_file('users.xml');

// Update user
foreach ($users as $user) {
    $id = $user['id'];
    $name = $user['name'];
    $quiz1 = $user['quiz1'];
    $quiz2 = $user['quiz2'];
    $quiz3 = $user['quiz3'];
    $quiz4 = $user['quiz4'];
    $quiz5 = $user['quiz5'];
    $average = $user['average'];
    $xml->user[$id]->name = $name;
    $xml->user[$id]->quiz1 = $quiz1;
    $xml->user[$id]->quiz2 = $quiz2;
    $xml->user[$id]->quiz3 = $quiz3;
    $xml->user[$id]->quiz4 = $quiz4;
    $xml->user[$id]->quiz5 = $quiz5;
    $xml->user[$id]->average = $average;
}

// Save XML file
$xml->asXML('users.xml');

echo 'Data saved successfully!';
?>
