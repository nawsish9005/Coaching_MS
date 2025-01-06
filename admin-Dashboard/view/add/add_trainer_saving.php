<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$trainer_name = mysqli_real_escape_string($con, stripslashes(trim($_POST['trainer_name'])));
	$trainer_contact = mysqli_real_escape_string($con, stripslashes(trim($_POST['trainer_contact'])));
	$trainer_email = mysqli_real_escape_string($con, stripslashes(trim($_POST['trainer_email'])));	
	$trainer_designation = mysqli_real_escape_string($con, stripslashes(trim($_POST['trainer_designation'])));
	$trainer_description = mysqli_real_escape_string($con, stripslashes(trim($_POST['trainer_description'])));
	$experience = mysqli_real_escape_string($con, stripslashes(trim($_POST['experience'])));
	$specializing_skill = mysqli_real_escape_string($con, stripslashes(trim($_POST['specializing_skill'])));
	
	if ($_FILES["trainer_image"]["error"] > 0) {
                    $trainer_image = "No .jpg";
                    
                } else {
                    $trainer_image = time().$_FILES["trainer_image"]["name"];
                    move_uploaded_file($_FILES["trainer_image"]["tmp_name"],"../../build/user_pic/" . $trainer_image);
                }

	if (($trainer_name == '') || (empty($trainer_name)) || is_null($trainer_name)) 
	{
	   echo "Input Trainer Name";
	   exit();
	}


	//check duplicate
	$sql_for_duplicate = "SELECT * FROM `mowgli_trainer` WHERE `trainer_name` = '$trainer_name'";
	$res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
	$row_for_duplicate = mysqli_num_rows($res_for_duplicate);

	if ($row_for_duplicate >= 1) 
	{
	   echo "Trainer Name Already Exists";
	   exit();
	}

	else
	{ 
	 	
		$insert_sql_statement = "INSERT INTO `mowgli_trainer` 
                             (
                              `trainer_name`,
                              `trainer_contact`,
                              `trainer_email`,
                              `trainer_designation`,
                              `trainer_description`,
                              `experience`,
                              `specializing_skill`,
                              `trainer_image`
                             ) 
                        VALUES 
                             ( 
                              '$trainer_name',
                              '$trainer_contact',
                              '$trainer_email',
                              '$trainer_designation',
                              '$trainer_description',
                              '$experience',
                              '$specializing_skill',
                              '$trainer_image'
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