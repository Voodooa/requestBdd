<?php

$conn_string = "host=rg-masson-postgre.postgres.database.azure.com port=5432 dbname=postgres@rg-masson-postgre.postgres.database.azure.com user=$_ENV['mydbuser@rg-masson-postgre.postgres.database.azure.com'] password=$_ENV['db_password']";
$dbconn4 = pg_connect($conn_string);