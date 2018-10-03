<?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'SteveDatabase';

    try{
    	$conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
    	echo $e->getMessage();
    }

    $conn = null;

    function validate($data){
    	$input = trim($data);
    	$input = stripslashes($data);
    	$input = htmlspecialchars($data);
    	return $input;
    }
    function escape($html){
        return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
?>    