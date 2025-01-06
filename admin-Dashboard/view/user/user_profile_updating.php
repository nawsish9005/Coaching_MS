<?php
session_start();
require_once('../includes/db_session_chk.php');

$data_update_hampering = "No";
$image_update_hampering = "No";
$error_msg = "";

$id 			= 		mysqli_real_escape_string($con, stripslashes(trim($_POST['id'])));

$select_sql_statement = "SELECT * FROM `user_login` WHERE id = $id";
$result_sql_statement = mysqli_query($con, $select_sql_statement);
$row_sql_statement = mysqli_fetch_assoc($result_sql_statement);
$image_src_of_id = $row_sql_statement["image_src"];
$image_src_loc_of_id = "../../build/user_pic/".$row_sql_statement["image_src"];

$first_name		=		mysqli_real_escape_string($con, stripslashes(trim($_POST['new_first_name'])));
$last_name		=		mysqli_real_escape_string($con, stripslashes(trim($_POST['new_last_name'])));
$middle_name	=		mysqli_real_escape_string($con, stripslashes(trim($_POST['new_middle_name'])));
$new_user_id	=		mysqli_real_escape_string($con, stripslashes(trim($_POST['new_user_id'])));
$email			=		mysqli_real_escape_string($con, stripslashes(trim($_POST['new_email'])));
$contact_no		=		mysqli_real_escape_string($con, stripslashes(trim($_POST['new_contact_no'])));

if(isset($_POST['new_department']))
	$department		=		mysqli_real_escape_string($con, stripslashes(trim($_POST['new_department'])));
if(isset($_POST['new_designation']))
	$designation	=		mysqli_real_escape_string($con, stripslashes(trim($_POST['new_designation'])));
if(isset($_POST['new_user_type']))
	$user_type		=		mysqli_real_escape_string($con, stripslashes(trim($_POST['new_user_type'])));
if(isset($_POST['new_status']))
	$status			=		mysqli_real_escape_string($con, stripslashes(trim($_POST['new_status'])));

$image_files		= $_FILES['new_image_src'];
$image_src_name		= $_FILES['new_image_src']["name"];
$image_src_type		= $_FILES['new_image_src']["type"];
$image_src_tmp_name	= $_FILES['new_image_src']["tmp_name"];
$image_src_error 	= $_FILES['new_image_src']["error"];
$image_src_size		= $_FILES['new_image_src']["size"];

if(empty($image_files) || $image_src_name == "" || $image_src_type == "" || $image_src_tmp_name == "" || $image_src_error == 4)
{
	$error_msg = "No Image file is uploaded!";
}
else
{
	$target_dir = "../../build/user_pic/";
	$target_file = $target_dir . basename($image_src_name);
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	if(!in_array($imageFileType, array("jpg","jpeg","png","gif","JPG","JPEG","PNG","GIF")))
	{
	    $error_msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed!";
	}
	else if($image_src_size > 10000000)
	{
	    $error_msg = "Sorry, your image file is too large. Maximum size is 10MB!";
	}
}

mysqli_query($con, "BEGIN");
mysqli_query($con, "START TRANSACTION") or die(mysqli_error($con));

if($error_msg != "")
{
	if($_SESSION['edfms_user_type'] == "Super Admin")
	{
		$update_sql_statement = "UPDATE `user_login` 
									SET `first_name` = '$first_name',
									   	`last_name` = '$last_name',
									   	`middle_name` = '$middle_name',
								 	   	`user_id` = '$new_user_id',
								 	   	`email` = '$email',
								 	  	`contact_no` = '$contact_no',
								 	   	`department` = $department,
								 	   	`designation` = $designation,
								 	   	`user_type` = '$user_type',
								 	   	`status` = '$status',
								 	   	`modifying_person_id` = '$edfms_logged_user_id',
								 	   	`modification_time` = NOW()
								  WHERE id = '$id'";
	}
	else
	{
		$update_sql_statement = "UPDATE `user_login` 
									SET `first_name` = '$first_name',
									   	`last_name` = '$last_name',
									   	`middle_name` = '$middle_name',
								 	   	`user_id` = '$new_user_id',
								 	   	`email` = '$email',
								 	  	`contact_no` = '$contact_no',
								 	   	`modifying_person_id` = '$edfms_logged_user_id',
								 	   	`modification_time` = NOW()
								  WHERE id = '$id'";
	}
}
else
{
	if($_SESSION['edfms_user_type'] == "Super Admin")
	{
		$update_sql_statement = "UPDATE `user_login` 
								SET `first_name` = '$first_name',
								   	`last_name` = '$last_name',
								   	`middle_name` = '$middle_name',
							 	   	`user_id` = '$new_user_id',
							 	   	`email` = '$email',
							 	  	`contact_no` = '$contact_no',
							 	   	`department` = $department,
							 	   	`designation` = $designation,
							 	   	`user_type` = '$user_type',
							 	   	`status` = '$status',
							 	   	`image_src` = '$image_src_name',
							 	   	`modifying_person_id` = '$edfms_logged_user_id',
							 	   	`modification_time` = NOW()
							  WHERE id = '$id'";
	}
	else
	{
		$update_sql_statement = "UPDATE `user_login` 
								SET `first_name` = '$first_name',
								   	`last_name` = '$last_name',
								   	`middle_name` = '$middle_name',
							 	   	`user_id` = '$new_user_id',
							 	   	`email` = '$email',
							 	  	`contact_no` = '$contact_no',
							 	   	`image_src` = '$image_src_name',
							 	   	`modifying_person_id` = '$edfms_logged_user_id',
							 	   	`modification_time` = NOW()
							  WHERE id = '$id'";
	}
}

mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));

if(mysqli_affected_rows($con) <> 1)
{
	$data_update_hampering = "Yes";
}
else
{
	if($error_msg != "")
	{
		$image_update_hampering = "Yes";
	}
	else
	{
		if($image_src_of_id != "default.png")
		{
			unlink($image_src_loc_of_id);
		}

		if(move_uploaded_file($image_src_tmp_name, $target_file))
		{
		}
		else 
		{
			$image_update_hampering = "Yes";
		    $error_msg = "Sorry, there was an unknown error uploading your image file!";
		}
	}
}

if($data_update_hampering == "No" && $image_update_hampering == "Yes")
{
	mysqli_query($con, "COMMIT");
	echo "User update is completed. ".$error_msg;
}
else if($data_update_hampering == "No" && $image_update_hampering == "No")
{
	mysqli_query($con, "COMMIT");
	echo "User update is completed successfully.";
}
else
{
	mysqli_query($con, "ROLLBACK");
	echo "User update is failed!";
}

$obj->disconnection();
?>
