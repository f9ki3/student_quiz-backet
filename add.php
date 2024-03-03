<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$users = simplexml_load_file('files/members.xml');
		$user = $users->addChild('user');
		$user->addChild('id', $_POST['id']);
		$user->addChild('student_name', $_POST['student_name']);
		$user->addChild('q1', $_POST['q1']);
		$user->addChild('q2', $_POST['q2']);
		$user->addChild('q3', $_POST['q3']);
		$user->addChild('q4', $_POST['q4']);
		$user->addChild('q5', $_POST['q5']);
		// Save to file
		// file_put_contents('files/members.xml', $users->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($users->asXML());
		$dom->save('files/members.xml');
		// Prettify / Format XML and save

		$_SESSION['message'] = 'Member added successfully';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
		header('location: index.php');
	}

?>