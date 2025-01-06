<?php 
	session_start();
	require_once("../includes/db_session_chk.php");
	
	$web_id = $_POST['web_id'];
	
	$subject_web = mysqli_real_escape_string($con, stripslashes(trim($_POST['subject_web'])));
	$web_about = mysqli_real_escape_string($con, stripslashes(trim($_POST['web_about'])));
	$web_price = mysqli_real_escape_string($con, stripslashes(trim($_POST['web_price'])));
	$web_image = mysqli_real_escape_string($con, stripslashes(trim($_POST['web_image'])));
	$web_duration = mysqli_real_escape_string($con, stripslashes(trim($_POST['web_duration'])));
	$web_effort = mysqli_real_escape_string($con, stripslashes(trim($_POST['web_effort'])));
	$web_certificate = mysqli_real_escape_string($con, stripslashes(trim($_POST['web_certificate'])));
	$web_total_class = mysqli_real_escape_string($con, stripslashes(trim($_POST['web_total_class'])));
	
	if ($_FILES["web_image"]["error"] > 0) {
                    $web_image = "No .jpg";
                    
		} else {
			$web_image = time().$_FILES["web_image"]["name"];
			move_uploaded_file($_FILES["web_image"]["tmp_name"],"../../build/user_pic/" . $web_image);
		}

	if (($subject_web == '') || (empty($subject_web)) || is_null($subject_web)) 
	{
	   echo "Input Subject Name";
	   exit();
	}

	 	
	 $insert_sql_statement = "UPDATE `all_web` SET `subject_web`='$subject_web', `web_about`='$web_about', `web_price`='$web_price', `web_image` = '$web_image', `web_duration`='$web_duration',`web_effort`='$web_effort',`web_certificate`='$web_certificate',`web_total_class`='$web_total_class' WHERE `web_id`='$web_id'";
 
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