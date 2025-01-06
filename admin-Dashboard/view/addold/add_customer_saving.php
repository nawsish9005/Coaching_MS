<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$customer = mysqli_real_escape_string($con, stripslashes(trim($_POST['customer'])));
	$customer_address = mysqli_real_escape_string($con, stripslashes(trim($_POST['customer_address'])));
	$customer_country = mysqli_real_escape_string($con, stripslashes(trim($_POST['customer_country'])));	
	$key_account_manager = mysqli_real_escape_string($con, stripslashes(trim($_POST['key_account_manager'])));	
	

	if (($customer == '') || (empty($customer)) || is_null($customer)) 
	{
	   echo "Input Customer Name";
	   exit();
	}


	//check duplicate
	$sql_for_duplicate = "SELECT * FROM `customers` WHERE `customers_name` = '$customer'";
	$res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	$row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	if ($row_for_duplicate >= 1) 
	{
	   echo "Customer Name Already Exists";
	   exit();
	}

	else
	{ 
	 	
		$insert_sql_statement = "INSERT INTO `customers` 
                             (
                              `customers_name`,
                              `customer_address`,
                              `customer_country`,
                              `key_account_manager`
                             ) 
                        VALUES 
                             ( 
                              '$customer',
                              '$customer_address',
                              '$customer_country',
                              '$key_account_manager'
                             )";

	    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
	    
	    if(mysqli_affected_rows($con) <> 1)
	    {
	        echo "Data Not Inserted";
	        exit();
	    }
	    else
	    {
	    	echo "Data Save Successfully";
	    	exit();
	    }
		
	}
?>