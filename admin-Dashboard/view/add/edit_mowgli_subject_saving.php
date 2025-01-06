<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$m_courses_id = $_POST['m_courses_id'];
	$m_courses_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['m_courses_id'])));
	$course_subject = mysqli_real_escape_string($con, stripslashes(trim($_POST['course_subject'])));
	$about_courses = mysqli_real_escape_string($con, stripslashes(trim($_POST['about_courses'])));
	$courses_price = mysqli_real_escape_string($con, stripslashes(trim($_POST['courses_price'])));
	$course_duration = mysqli_real_escape_string($con, stripslashes(trim($_POST['course_duration'])));
	$courses_effort = mysqli_real_escape_string($con, stripslashes(trim($_POST['courses_effort'])));
	$course_language = mysqli_real_escape_string($con, stripslashes(trim($_POST['course_language'])));
	$certificate = mysqli_real_escape_string($con, stripslashes(trim($_POST['certificate'])));
	$total_class = mysqli_real_escape_string($con, stripslashes(trim($_POST['total_class'])));
	
	if ($_FILES["courses_image"]["error"] > 0) {
                    $courses_image = "No .jpg";
                    
		} else {
			$courses_image = time().$_FILES["courses_image"]["name"];
			move_uploaded_file($_FILES["courses_image"]["tmp_name"],"../../build/user_pic/" . $courses_image);
		}

	if (($course_subject == '') || (empty($course_subject)) || is_null($course_subject)) 
	{
	   echo "Input Subject Name";
	   exit();
	}

	 	
		$insert_sql_statement = "UPDATE `m_courses` SET `course_subject`='$course_subject', `about_courses`='$about_courses', `courses_price`='$courses_price', `courses_image` = '$courses_image', `course_duration`='$course_duration',`courses_effort`='$courses_effort',`course_language`='$course_language',`certificate`='$certificate',`total_class`='$total_class' WHERE `m_courses_id`='$m_courses_id'";

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