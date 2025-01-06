<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$subject_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['subject_digital'])));
	$about_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['about_digital'])));
	$price_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['price_digital'])));
	$image_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['image_digital'])));
	$duration_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['duration_digital'])));
	$effort_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['effort_digital'])));
	$certificate_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['certificate_digital'])));
	$total_class_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['total_class_digital'])));
	

			if ($_FILES["image_digital"]["error"] > 0) {
                    $image_digital = "No .jpg";
                    
                } else {
                    $image_digital = time().$_FILES["image_digital"]["name"];
                    move_uploaded_file($_FILES["image_digital"]["tmp_name"],"../../build/user_pic/" . $image_digital);
                }
	if (($subject_digital == '') || (empty($subject_digital)) || is_null($subject_digital)) 
	{
	   echo "Input Subject Name";
	   exit();
	}

	//check duplicate
	// $sql_for_duplicate = "SELECT * FROM `key_account_manager` WHERE `key_account_manager_name` = '$key_account_manager'";
	// $res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	// $row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	// if ($row_for_duplicate >= 1) 
	// {
	//    echo "Key Account Manager Name Already Exists";
	//    exit();
	// }

	// else
	// { 
	 	
		$insert_sql_statement = "INSERT INTO `all_digital` 
													 ( 
													  `subject_digital`,
													  `about_digital`,
													  `price_digital`,
													  `image_digital`,
													  `duration_digital`,
													  `effort_digital`,
													  `certificate_digital`,
													  `total_class_digital`
													 ) 
												VALUES
													 ( 
													  '$subject_digital',
													  '$about_digital',
													  '$price_digital',
													  '$image_digital',
													  '$duration_digital',
													  '$effort_digital',
													  '$certificate_digital',
													  '$total_class_digital'
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
		
	//}
?>