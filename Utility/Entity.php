<?php
 class Entity {
	private $conn;
	function __construct() 
	{
		$config = simplexml_load_file ( Loader::GetGeneralConfigUrl () );
		if ($config->configBdd->count () != 1)
			return;
		else 
		{
			foreach ( $config->configBdd as $configBdd ) {
				$host = ( string ) $configBdd ["serverUrl"];
				$database = ( string ) $configBdd ["dbName"];
				$username = ( string ) $configBdd ["dbUser"];
				$password = ( string ) $configBdd ["dbPassword"];
			}
			
			try {
				$this->conn = new PDO ( 'mysql:host=' . $host . ';dbname=' . $database . '', $username, $password );
			} catch ( PDOException $e ) {
				echo 'ERROR: ' . $e->getMessage ();
			}
		}
	}
}