<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$customer = mysqli_real_escape_string($con, stripslashes(trim($_POST['customer'])));
	$customer_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['customer_id'])));
	$customer_address = mysqli_real_escape_string($con, stripslashes(trim($_POST['customer_address'])));
	$customer_country = mysqli_real_escape_string($con, stripslashes(trim($_POST['customer_country'])));	
	$key_account_manager = mysqli_real_escape_string($con, stripslashes(trim($_POST['key_account_manager'])));	

	if (($customer == '') || (empty($customer)) || is_null($customer)) 
	{
	   echo "Input Customer Name";
	   exit();
	}


		$insert_sql_statement = "UPDATE `customers` SET `customers_name`='$customer', `customer_address`='$customer_address', `customer_country`='$customer_country', `key_account_manager` = '$key_account_manager' WHERE `customers_id`='$customer_id'";

	    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
	    
	    if(mysqli_affected_rows($con) <> 1)
	    {
	        echo "Data Not Inserted";
	        exit();
	    }
	    else
	    {
	    	echo "Update Successfully";
	    	exit();
	    }
		
	
?>