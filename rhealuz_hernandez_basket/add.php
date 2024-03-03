<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$users = simplexml_load_file('Hernandez_Rhealuz.xml');
		$user = $users->addChild('user');
		$user->addChild('id', $_POST['id']);
		$user->addChild('basket_owner', $_POST['basket_owner']);
		$user->addChild('f1', $_POST['f1']);
		$user->addChild('f2', $_POST['f2']);
		$user->addChild('f3', $_POST['f3']);
		$user->addChild('f4', $_POST['f4']);
		$user->addChild('f5', $_POST['f5']);
		// Save to file
		// file_put_contents('Hernandez_Rhealuz.xml', $users->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($users->asXML());
		$dom->save('Hernandez_Rhealuz.xml');
		// Prettify / Format XML and save

		$_SESSION['message'] = 'Basket Added Successfully';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
		header('location: index.php');
	}

?>