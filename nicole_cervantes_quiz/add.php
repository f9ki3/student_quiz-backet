<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$users = simplexml_load_file('Cervantes_Nicole.xml');
		$user = $users->addChild('user');
		$user->addChild('id', $_POST['id']);
		$user->addChild('student_name', $_POST['student_name']);
		$user->addChild('q1', $_POST['q1']);
		$user->addChild('q2', $_POST['q2']);
		$user->addChild('q3', $_POST['q3']);
		$user->addChild('q4', $_POST['q4']);
		$user->addChild('q5', $_POST['q5']);
		// Save to file
		// file_put_contents('Cervantes_Nicole.xml', $users->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($users->asXML());
		$dom->save('Cervantes_Nicole.xml');
		// Prettify / Format XML and save

		$_SESSION['message'] = 'Student Added successfully';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
		header('location: index.php');
	}

?>