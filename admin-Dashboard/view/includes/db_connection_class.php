<?php

class DB_Connection_Class
{
	function connection()
	{
		global $con;
		$con = mysqli_connect("localhost","root","","znz");
		//$con = mysqli_connect("www.mowgli-it.com","mowgliit_mowgliit","Nawsish@12","mowgliit_mowgli");

		if(!$con)
		{
		    echo "Error: Unable to connect to MySQL." . PHP_EOL;
		    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}

		// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
		// echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
	}
 
	function disconnection()
   	{
		global $con;
		mysqli_close($con);
   	}
}

?>
