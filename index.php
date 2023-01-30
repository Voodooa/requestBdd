<?php

	$myserver = "rg-masson-postgre.postgres.database.azure.com";
	$myusername = $_ENV['myusername'];
	$mypassword = $_ENV['password'];
	$mydb = "mybase";
	$connection = pg_connect("host=$myserver dbname=$mydb user=$myusername password=$mypassword");
	$request_method = $_SERVER["REQUEST_METHOD"];

	function getUserTel()
    {
        global $connection;
        $result = pg_query($connection, "SELECT * FROM users");
        if (!$result) {
            echo json_encode(array("error" => "Une erreur est survenue."));
            exit;
        }
        $response = array();
        while ($row = pg_fetch_row($result)) {
            $response[] = array("Id" => $row[0], "username" => $row[1], "tel" => $row[2]);
        }
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
	
	switch($request_method)
	{
		
		case 'GET':
            getUserTel();
			break;
		default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
            
	}
