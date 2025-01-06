<?php 
	session_start();
	require_once("../includes/db_session_chk.php");
	
	$trainer_id = $_POST['trainer_id'];
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


		$insert_sql_statement = "UPDATE `mowgli_trainer` SET `trainer_name`='$trainer_name', `trainer_contact`='$trainer_contact', `trainer_email`='$trainer_email', `trainer_designation` = '$trainer_designation',`trainer_description`='$trainer_description',`experience`='$experience',`specializing_skill`='$specializing_skill', `trainer_image`='$trainer_image' WHERE `trainer_id`='$trainer_id'";

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