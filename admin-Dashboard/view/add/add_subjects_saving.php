<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$course_subject = mysqli_real_escape_string($con, stripslashes(trim($_POST['course_subject'])));
	$about_courses = mysqli_real_escape_string($con, stripslashes(trim($_POST['about_courses'])));
	$courses_price = mysqli_real_escape_string($con, stripslashes(trim($_POST['courses_price'])));
	$courses_image = mysqli_real_escape_string($con, stripslashes(trim($_POST['courses_image'])));
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
	 	
		$insert_sql_statement = "INSERT INTO `m_courses` 
													 ( 
													  `course_subject`,
													  `about_courses`,
													  `courses_price`,
													  `courses_image`,
													  `course_duration`,
													  `courses_effort`,
													  `course_language`,
													  `certificate`,
													  `total_class`
													 ) 
												VALUES
													 ( 
													  '$course_subject',
													  '$about_courses',
													  '$courses_price',
													  '$courses_image',
													  '$course_duration',
													  '$courses_effort',
													  '$course_language',
													  '$certificate',
													  '$total_class'
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