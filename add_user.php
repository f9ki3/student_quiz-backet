<?php
// Get posted data
$name = $_POST['name'];
$quiz1 = $_POST['quiz1'];
$quiz2 = $_POST['quiz2'];
$quiz3 = $_POST['quiz3'];
$quiz4 = $_POST['quiz4'];
$quiz5 = $_POST['quiz5'];
$average = $_POST['average'];

// Load XML file
$xml = simplexml_load_file('users.xml');

// Add new user
$user = $xml->addChild('user');
$user->addChild('name', $name);
$user->addChild('quiz1', $quiz1);
$user->addChild('quiz2', $quiz2);
$user->addChild('quiz3', $quiz3);
$user->addChild('quiz4', $quiz4);
$user->addChild('quiz5', $quiz5);
$user->addChild('average', $average);

// Save XML file
$xml->asXML('users.xml');

echo 'User added successfully!';
?>
