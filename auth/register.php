<?php

include '../config.php';

/**
 * Regexp for account credentials
 */
$emailRegex = "/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/";
$pwRegex = "/^.{6,}$/";

/**
 * Email validation
 * Password Validation
 */

if (!empty($_POST['submit'])) {
	$email = $pdo->query("SELECT * FROM users WHERE email='{$_POST[':email']}'");
	$emailTaken = $email->fetchColumn();

	if ($emailTaken) {
		header('Location: ../signup.php?emailTaken=true');
	} else if ($_POST[':password'] !== $_POST['passwordConfirmation']) {
		header('Location: ../signup.php?validatePassword=true');
	} else if (!preg_match($emailRegex, $_POST[':email'])) {
		header('Location: ../signup.php?emailNotValid=true');
	} else if (!preg_match($pwRegex, $_POST[':password'])) {
		header('Location: ../signup.php?passwordNotValid=true');
	}

	/**
	 * Generate the Query Values and Fields
	 */
	$values = array_filter($_POST, function($key) {
	    return $key != 'submit' && $key != 'passwordConfirmation';
	}, ARRAY_FILTER_USE_KEY);

	$fields = array_keys($values);

	/**
	 * We create a SQL Query
	 * We use fields and placeholders
	 */

	$sql = sprintf(
		"INSERT INTO users (%s) VALUES (%s)",
		implode(', ', placeholderToField($fields)),
		implode(', ', $fields)
	);

	/**
	 * Replace the value of password with a hashed password
	 * SQL Prepared $statement
	 * When we execute the prepared statement, the placeholders are turned into values
	 */
	$password = password_hash($values[':password'], PASSWORD_BCRYPT);

	$values = array_replace($values,
	    array_fill_keys(
	        array_keys($values, $values[':password']),
	        $password
	    )
	);

	try {
		$statement = $pdo->prepare($sql);
		$statement->execute($values);
		echo "registration successful";
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	/**
	 * Turn the SQL values into placeholders
	 * Turn the fields from placeholders to actual fields
	 */

	 function placeholderToField($f)
	 {
	 	return array_map(function($el) {
	 		return substr($el, 1);
	 	}, $f);
	 }
	/*
	function toPlaceholder($parameters)
	{
		$placeholders = array_map(function($placeholder) {
			return ":{$placeholder}, ";
		}, $parameters);
		return $placeholders;
	}

	function removeLastChar($placeholder)
	{
		return substr($placeholder, 0, -2);
	}
	*/
}
?>
