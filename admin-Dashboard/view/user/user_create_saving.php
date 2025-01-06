<?php
session_start();
require_once('../includes/db_session_chk.php');

$data_previously_saved = "No";
$data_insertion_hampering = "No";
$image_insertion_hampering = "No";
$error_msg = "";

$first_name		=		mysqli_real_escape_string($con, stripslashes(trim($_POST['first_name'])));
$last_name		=		mysqli_real_escape_string($con, stripslashes(trim($_POST['last_name'])));
$middle_name	=		mysqli_real_escape_string($con, stripslashes(trim($_POST['middle_name'])));
$new_user_id	=		mysqli_real_escape_string($con, stripslashes(trim($_POST['user_id'])));
$password		=		md5(mysqli_real_escape_string($con, trim($_POST['password'])));
$email			=		mysqli_real_escape_string($con, stripslashes(trim($_POST['email'])));
$contact_no		=		mysqli_real_escape_string($con, stripslashes(trim($_POST['contact_no'])));
$department		=		mysqli_real_escape_string($con, stripslashes(trim($_POST['department'])));
$designation	=		mysqli_real_escape_string($con, stripslashes(trim($_POST['designation'])));
$user_type		=		mysqli_real_escape_string($con, stripslashes(trim($_POST['user_type'])));
$status			=		mysqli_real_escape_string($con, stripslashes(trim($_POST['status'])));

$image_files		= $_FILES['image_src'];
$image_src_name		= $_FILES['image_src']["name"];
$image_src_type		= $_FILES['image_src']["type"];
$image_src_tmp_name	= $_FILES['image_src']["tmp_name"];
$image_src_error 	= $_FILES['image_src']["error"];
$image_src_size		= $_FILES['image_src']["size"];

if(empty($image_files) || $image_src_name == "" || $image_src_type == "" || $image_src_tmp_name == "" || $image_src_error == 4)
{
	$error_msg = "Sorry, No Image file is attached!";
	$image_src_name = "default.png";
}
else
{
	$target_dir = "../../build/user_pic/";
	$target_file = $target_dir . basename($image_src_name);
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	if(file_exists($target_file))
	{
	    $error_msg = "Sorry, image file already exists!";
	    $image_src_name = "default.png";
	}
	else
	{
		if(!in_array($imageFileType, array("jpg","jpeg","png","gif","JPG","JPEG","PNG","GIF")))
		{
		    $error_msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed!";
		    $image_src_name = "default.png";
		}
		else if($image_src_size > 10000000)
		{
		    $error_msg = "Sorry, your image file is too large. Maximum size is 10MB!";
		    $image_src_name = "default.png";
		}
	}
}
	

mysqli_query($con, "BEGIN");
mysqli_query($con, "START TRANSACTION") or die(mysqli_error($con));

$select_sql_for_duplicacy = "SELECT * 
							   FROM `user_login` 
							  WHERE `user_id`='$new_user_id'";

$result = mysqli_query($con, $select_sql_for_duplicacy) or die(mysqli_error($con));

if(mysqli_num_rows($result) > 0)
{
	$data_previously_saved = "Yes";
}
else if(mysqli_num_rows($result) < 1)
{
	$insert_sql_statement = "INSERT INTO `user_login` 
									 ( 
									   `first_name`,
									   `last_name`,
									   `middle_name`,
								 	   `user_id`,
								 	   `password`,
								 	   `email`,
								 	   `contact_no`,
								 	   `department`,
								 	   `designation`,
								 	   `user_type`,
								 	   `status`,
								 	   `image_src`,
								 	   `recording_person_id`,
								 	   `recording_time`,
								 	   `modifying_person_id`, 
								 	   `modification_time` 
								 	 ) 
								VALUES 
								     ( 
								       '$first_name',
								       '$last_name',
								       '$middle_name',
								       '$new_user_id',
								       '$password',
								       '$email',
								       '$contact_no',
								        $department,
								        $designation,
								       '$user_type',
								       '$status',
								       '$image_src_name',
								       '$edfms_logged_user_id',
								       NOW(),
								       '$edfms_logged_user_id',
								       NOW()
								     )";

	mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));

	if(mysqli_affected_rows($con) <> 1)
	{
		$data_insertion_hampering = "Yes";
	}
	else
	{

		if ($user_type == "super_admin") {
			$users = 1;
				$create_user = 1;
				$user_list = 1;
			$files = 1;
				$file_create = 1;
				$file_list = 1;
			$lc_and_pi = 1;
				$lc_and_pi_doc = 1;
				$lc_and_pi_acceptance_doc = 1;
			$b2b = 1; 
				$b2b_lc_and_pi_weave_doc = 1;
				$b2b_lc_and_pi_spin_doc = 1;
				$b2b_doc_weave_doc = 1;
				$b2b_doc_spin_doc = 1;
			$btma_and_cash = 1; 
				$btma_weave_doc = 1;
				$btma_spin_doc = 1;
				$cash_weave_doc = 1;
			$banking = 1;
				$banking_bank_acceptance_doc = 1;
			$prc = 1;
				$prc_duration_doc = 1;
			$others = 1;
				$backup_doc = 1;
			$settings = 1;
		}

		else if ($user_type == "admin") {
			$users = 1;
				$create_user = 1;
				$user_list = 1;
			$files = 1;
				$file_create = 1;
				$file_list = 1;
			$lc_and_pi = 1;
				$lc_and_pi_doc = 1;
				$lc_and_pi_acceptance_doc = 1;
			$b2b = 1; 
				$b2b_lc_and_pi_weave_doc = 1;
				$b2b_lc_and_pi_spin_doc = 1;
				$b2b_doc_weave_doc = 1;
				$b2b_doc_spin_doc = 1;
			$btma_and_cash = 1; 
				$btma_weave_doc = 1;
				$btma_spin_doc = 1;
				$cash_weave_doc = 1;
			$banking = 1;
				$banking_bank_acceptance_doc = 1;
			$prc = 1;
				$prc_duration_doc = 1;
			$others = 1;
				$backup_doc = 1;
			$settings = 0;
		}

		else if ($user_type == "senior_officer_lc_pi") {
			$users = 0;
				$create_user = 0;
				$user_list = 0;
			$files = 1;
				$file_create = 1;
				$file_list = 1;
			$lc_and_pi = 1;
				$lc_and_pi_doc = 1;
				$lc_and_pi_acceptance_doc = 0;
			$b2b = 0; 
				$b2b_lc_and_pi_weave_doc = 0;
				$b2b_lc_and_pi_spin_doc = 0;
				$b2b_doc_weave_doc = 0;
				$b2b_doc_spin_doc = 0;
			$btma_and_cash = 0; 
				$btma_weave_doc = 0;
				$btma_spin_doc = 0;
				$cash_weave_doc = 0;
			$banking = 0;
				$banking_bank_acceptance_doc = 0;
			$prc = 0;
				$prc_duration_doc = 0;
			$others = 0;
				$backup_doc = 0;
			$settings = 0;
		}

		else if ($user_type == "assistant_manager") {
			$users = 0;
				$create_user = 0;
				$user_list = 0;
			$files = 0;
				$file_create = 0;
				$file_list = 0;
			$lc_and_pi = 1;
				$lc_and_pi_doc = 0;
				$lc_and_pi_acceptance_doc = 1;
			$b2b = 0; 
				$b2b_lc_and_pi_weave_doc = 0;
				$b2b_lc_and_pi_spin_doc = 0;
				$b2b_doc_weave_doc = 0;
				$b2b_doc_spin_doc = 0;
			$btma_and_cash = 0; 
				$btma_weave_doc = 0;
				$btma_spin_doc = 0;
				$cash_weave_doc = 0;
			$banking = 0;
				$banking_bank_acceptance_doc = 0;
			$prc = 0;
				$prc_duration_doc = 0;
			$others = 0;
				$backup_doc = 0;
			$settings = 0;
		}

		else if ($user_type == "assistant_officer_b2b") {
			$users = 0;
				$create_user = 0;
				$user_list = 0;
			$files = 0;
				$file_create = 0;
				$file_list = 0;
			$lc_and_pi = 0;
				$lc_and_pi_doc = 0;
				$lc_and_pi_acceptance_doc = 0;
			$b2b = 1; 
				$b2b_lc_and_pi_weave_doc = 1;
				$b2b_lc_and_pi_spin_doc = 1;
				$b2b_doc_weave_doc = 0;
				$b2b_doc_spin_doc = 0;
			$btma_and_cash = 0; 
				$btma_weave_doc = 0;
				$btma_spin_doc = 0;
				$cash_weave_doc = 0;
			$banking = 0;
				$banking_bank_acceptance_doc = 0;
			$prc = 0;
				$prc_duration_doc = 0;
			$others = 0;
				$backup_doc = 0;
			$settings = 0;
		}

		else if ($user_type == "senior_officer_b2b") {
			$users = 0;
				$create_user = 0;
				$user_list = 0;
			$files = 0;
				$file_create = 0;
				$file_list = 0;
			$lc_and_pi = 0;
				$lc_and_pi_doc = 0;
				$lc_and_pi_acceptance_doc = 0;
			$b2b = 1; 
				$b2b_lc_and_pi_weave_doc = 0;
				$b2b_lc_and_pi_spin_doc = 0;
				$b2b_doc_weave_doc = 1;
				$b2b_doc_spin_doc = 1;
			$btma_and_cash = 0; 
				$btma_weave_doc = 0;
				$btma_spin_doc = 0;
				$cash_weave_doc = 0;
			$banking = 0;
				$banking_bank_acceptance_doc = 0;
			$prc = 0;
				$prc_duration_doc = 0;
			$others = 0;
				$backup_doc = 0;
			$settings = 0;
		}

		else if ($user_type == "assistant_officer_btma") {
			$users = 0;
				$create_user = 0;
				$user_list = 0;
			$files = 0;
				$file_create = 0;
				$file_list = 0;
			$lc_and_pi = 0;
				$lc_and_pi_doc = 0;
				$lc_and_pi_acceptance_doc = 0;
			$b2b = 0; 
				$b2b_lc_and_pi_weave_doc = 0;
				$b2b_lc_and_pi_spin_doc = 0;
				$b2b_doc_weave_doc = 0;
				$b2b_doc_spin_doc = 0;
			$btma_and_cash = 1; 
				$btma_weave_doc = 1;
				$btma_spin_doc = 1;
				$cash_weave_doc = 0;
			$banking = 0;
				$banking_bank_acceptance_doc = 0;
			$prc = 0;
				$prc_duration_doc = 0;
			$others = 0;
				$backup_doc = 0;
			$settings = 0;
		}

		else if ( ($user_type == "assistant_manager_banking") || ($user_type == "officer")) {
			$users = 0;
				$create_user = 0;
				$user_list = 0;
			$files = 0;
				$file_create = 0;
				$file_list = 0;
			$lc_and_pi = 0;
				$lc_and_pi_doc = 0;
				$lc_and_pi_acceptance_doc = 0;
			$b2b = 0; 
				$b2b_lc_and_pi_weave_doc = 0;
				$b2b_lc_and_pi_spin_doc = 0;
				$b2b_doc_weave_doc = 0;
				$b2b_doc_spin_doc = 0;
			$btma_and_cash = 0; 
				$btma_weave_doc = 0;
				$btma_spin_doc = 0;
				$cash_weave_doc = 0;
			$banking = 1;
				$banking_bank_acceptance_doc = 1;
			$prc = 0;
				$prc_duration_doc = 0;
			$others = 0;
				$backup_doc = 0;
			$settings = 0;
		}

		else
		{
			$users = 0;
				$create_user = 0;
				$user_list = 0;
			$files = 0;
				$file_create = 0;
				$file_list = 0;
			$lc_and_pi = 0;
				$lc_and_pi_doc = 0;
				$lc_and_pi_acceptance_doc = 0;
			$b2b = 0; 
				$b2b_lc_and_pi_weave_doc = 0;
				$b2b_lc_and_pi_spin_doc = 0;
				$b2b_doc_weave_doc = 0;
				$b2b_doc_spin_doc = 0;
			$btma_and_cash = 0; 
				$btma_weave_doc = 0;
				$btma_spin_doc = 0;
				$cash_weave_doc = 0;
			$banking = 0;
				$banking_bank_acceptance_doc = 0;
			$prc = 1;
				$prc_duration_doc = 1;
			$others = 0;
				$backup_doc = 0;
			$settings = 0;
		}


		$insert_sql_for_uam = "INSERT INTO `user_access_management` 
										 ( 
										   `user_id`,
										   `users`, 
										   `create_user`, 
										   `user_list`, 
										   `files`, 
										   `file_create`, 
										   `file_list`, 
										   `lc_and_pi`, 
										   `lc_and_pi_doc`, 
										   `lc_and_pi_acceptance_doc`, 
										   `b2b`, 
										   `b2b_lc_and_pi_weave_doc`, 
										   `b2b_lc_and_pi_spin_doc`, 
										   `b2b_doc_weave_doc`, 
										   `b2b_doc_spin_doc`, 
										   `btma_and_cash`, 
										   `btma_weave_doc`, 
										   `btma_spin_doc`, 
										   `cash_weave_doc`, 
										   `banking`, 
										   `banking_bank_acceptance_doc`, 
										   `prc`, 
										   `prc_duration_doc`, 
										   `others`, 
										   `backup_doc`, 
										   `settings`, 
										   `recording_person_id`, 
										   `recording_time`, 
										   `modifying_person_id`, 
										   `modification_time` 
									 	 )
									VALUES 
									     ( 
									       '$new_user_id',
									       '$users',
									       '$create_user',
									       '$user_list',
									       '$files',
									       '$file_create',
									       '$file_list',
									       '$lc_and_pi',
									       '$lc_and_pi_doc',
									       '$lc_and_pi_acceptance_doc',
									       '$b2b',
									       '$b2b_lc_and_pi_weave_doc',
									       '$b2b_lc_and_pi_spin_doc',
									       '$b2b_doc_weave_doc',
									       '$b2b_doc_spin_doc',
									       '$btma_and_cash',
									       '$btma_weave_doc',
										   '$btma_spin_doc',
										   '$cash_weave_doc',
									       '$banking',
									       '$banking_bank_acceptance_doc',
									       '$prc',
									       '$prc_duration_doc',
									       '$others',
									       '$backup_doc',
									       '$settings',
									       '$edfms_logged_user_id',
									       NOW(),
									       '$edfms_logged_user_id',
									       NOW()
									     )";

		mysqli_query($con, $insert_sql_for_uam) or die(mysqli_error($con));

		if(mysqli_affected_rows($con) <> 1)
		{
			$data_insertion_hampering = "Yes";
		}
		else
		{
			if($error_msg != "")
			{
				$image_insertion_hampering = "Yes";
			}
			else
			{
				if(move_uploaded_file($image_src_tmp_name, $target_file))
				{
				}
				else 
				{
					$image_insertion_hampering = "Yes";
				    $error_msg = "Sorry, there was an unknown error uploading your image file!";
				}
			}
		}
	}
}

if($data_previously_saved == "Yes")
{
	mysqli_query($con, "ROLLBACK");
	echo "User ID already exists!";
}
else if($data_insertion_hampering == "No" && $image_insertion_hampering == "Yes")
{
	mysqli_query($con, "COMMIT");
	echo "User creation is completed. ".$error_msg;
}
else if($data_insertion_hampering == "No" && $image_insertion_hampering == "No")
{
	mysqli_query($con, "COMMIT");
	echo "User creation is completed successfully.";
}
else
{
	mysqli_query($con, "ROLLBACK");
	echo "User creation is failed!";
}

$obj->disconnection();
?>
