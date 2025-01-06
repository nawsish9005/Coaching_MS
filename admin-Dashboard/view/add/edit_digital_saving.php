<?php 
	session_start();
	require_once("../includes/db_session_chk.php");
	
	$digital_id = $_POST['digital_id'];
	$subject_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['subject_digital'])));
	$about_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['about_digital'])));
	$price_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['price_digital'])));
	$image_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['image_digital'])));
	$duration_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['duration_digital'])));
	$effort_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['effort_digital'])));
	$certificate_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['certificate_digital'])));
	$total_class_digital = mysqli_real_escape_string($con, stripslashes(trim($_POST['total_class_digital'])));
	
	if ($_FILES["image_digital"]["error"] > 0) {
                    $image_digital_advance = "No .jpg";
                    
		} else {
			$image_digital = time().$_FILES["image_digital"]["name"];
			move_uploaded_file($_FILES["image_digital"]["tmp_name"],"../../build/user_pic/" . $image_digital);
		}

	if (($subject_digital == '') || (empty($subject_digital)) || is_null($subject_digital)) 
	{
	   echo "Input Subject Name";
	   exit();
	}

	 	
		$insert_sql_statement = "UPDATE `all_digital` SET `subject_digital`='$subject_digital', `about_digital`='$about_digital', `price_digital`='$price_digital', `image_digital` = '$image_digital', `duration_digital`='$duration_digital',`effort_digital`='$effort_digital',`certificate_digital`='$certificate_digital',`total_class_digital`='$total_class_digital' WHERE `digital_id`='$digital_id'";

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