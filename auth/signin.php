<?php

include '../config.php';

if (!empty($_POST['submit'])) {
	if (empty($_POST['email']) || empty($_POST['password'])) {
		header('Location: ../login.php?emptyFields=true');
	}

	$sql = $pdo->query("SELECT * FROM users WHERE email='{$_POST['email']}'");
	$accountExists = $sql->fetchColumn();
	$result = $sql->fetchAll(PDO::FETCH_ASSOC);
	$password = $result[0]['password'];
	$passwordIsValid = password_verify($_POST['password'], $password);

	if (!$accountExists) {
		header('Location: ../login.php?wrongEmail=true');
	} else if (!$passwordIsValid) {
		header('Location: ../login.php?wrongPassword=true');
	} else {
		if ($_POST['rememberLogin']) {
			setcookie("email", $_POST['email'], time()+60*60*24*100, "/");
	   		setcookie("password", $_POST['password'], time()+60*60*24*100, "/");
		} else {
			setcookie("email", '', time() -1, "/");
			setcookie("password", '', time() -1, "/");
		}
		session_start();
		$_SESSION['email'] = $result[0]['email'];
		$_SESSION['name'] = $result[0]['name'];
		$_SESSION['password'] = $result[0]['password'];
		header('Location: ../dashboard.php');
	}
}

 ?>
