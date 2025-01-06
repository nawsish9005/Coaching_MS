<?php 
	session_start();
	require_once("../includes/db_session_chk.php");
	
	$graphics_id = $_POST['graphics_id'];
	$subject_graphics = mysqli_real_escape_string($con, stripslashes(trim($_POST['subject_graphics'])));
	$about_graphics = mysqli_real_escape_string($con, stripslashes(trim($_POST['about_graphics'])));
	$price_graphics = mysqli_real_escape_string($con, stripslashes(trim($_POST['price_graphics'])));
	$image_graphics = mysqli_real_escape_string($con, stripslashes(trim($_POST['image_graphics'])));
	$duration_graphics = mysqli_real_escape_string($con, stripslashes(trim($_POST['duration_graphics'])));
	$effort_graphics = mysqli_real_escape_string($con, stripslashes(trim($_POST['effort_graphics'])));
	$certificate_graphics = mysqli_real_escape_string($con, stripslashes(trim($_POST['certificate_graphics'])));
	$total_class_graphics = mysqli_real_escape_string($con, stripslashes(trim($_POST['total_class_graphics'])));
	
	if ($_FILES["image_graphics"]["error"] > 0) {
                    $image_graphics = "No .jpg";
                    
		} else {
			$image_graphics = time().$_FILES["image_graphics"]["name"];
			move_uploaded_file($_FILES["image_graphics"]["tmp_name"],"../../build/user_pic/" . $image_graphics);
		}

	if (($subject_graphics == '') || (empty($subject_graphics)) || is_null($subject_graphics)) 
	{
	   echo "Input Subject Name";
	   exit();
	}

	 	
		$insert_sql_statement = "UPDATE `all_graphics` SET `subject_graphics`='$subject_graphics', `about_graphics`='$about_graphics', `price_graphics`='$price_graphics', `image_graphics` = '$image_graphics', `duration_graphics`='$duration_graphics',`effort_graphics`='$effort_graphics',`certificate_graphics`='$certificate_graphics',`total_class_graphics`='$total_class_graphics' WHERE `graphics_id`='$graphics_id'";

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
		
	//}
?>