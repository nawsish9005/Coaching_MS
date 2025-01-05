<?php
 require_once('config/db_connection.php'); 

if(isset($_POST['submit'])){

  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $father_name = $_POST['father_name'];
  $mother_name = $_POST['mother_name'];
  $subject_area = $_POST['subject_area'];
  $contact_number = $_POST['contact_number'];
  $date_of_birth = $_POST['date_of_birth'];
  $nid_birth = $_POST['nid_birth'];
  $present_address = $_POST['present_address'];
  $permanent_address = $_POST['permanent_address'];
  $gender = $_POST['gender'];
  $user_active_from=date('Y-m-d H:i:s'); 
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
		
			
	$customer_check_query = "SELECT mowgli_code FROM students_registration ";

	$customer_check_res = mysqli_query($con, $customer_check_query) or die(mysqli_error($con));

	if (mysqli_num_rows($customer_check_res) < 1)
	{
		$pp_id = 1000000;
	}
	else
	{
		$sql = 'SELECT mowgli_code FROM students_registration ORDER BY mowgli_code DESC LIMIT 1';
		$sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
		$sql_row = mysqli_fetch_assoc($sql_res);
		$pp_id = $sql_row['mowgli_code'] + 1;
	}		
			
		if($password==$password2 && strlen($password) > 3){
			$password = ($password);
  
				if ($_FILES["user_image_p"]["error"] > 0) {
                    $user_image_p = "No .jpg";
                    
                } else {
                    $user_image_p = time().$_FILES["user_image_p"]["name"];
                    move_uploaded_file($_FILES["user_image_p"]["tmp_name"],"registration/upload/" . $user_image_p);
                }
                if ($_FILES["user_signature"]["error"] > 0) {
                    $user_signature = "No .jpg";
                    
                } else {
                    $user_signature = time().$_FILES["user_signature"]["name"];
                    move_uploaded_file($_FILES["user_signature"]["tmp_name"],"registration/upload/" . $user_signature);
                }
                if ($_FILES["nid_birth_image"]["error"] > 0) {
                    $nid_birth_image = "No .jpg";
                    
                } else {
                    $nid_birth_image = time().$_FILES["nid_birth_image"]["name"];
                    move_uploaded_file($_FILES["nid_birth_image"]["tmp_name"],"registration/upload/" . $nid_birth_image);
                }
						//check duplicate
					$sql_for_duplicate = "SELECT * FROM students_registration WHERE `email` = '$email' AND `nid_birth`='$nid_birth'";
					$res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
					$row_for_duplicate = mysqli_num_rows($res_for_duplicate);

					if ($row_for_duplicate >= 1) 
					{
					   echo "Email or NID Exists";
					   echo "<script> window.open('registration.php','_self'); </script>";
					   exit();
					}

					else
					{
				  $login_query = "INSERT INTO students_registration (full_name,email, father_name,mother_name,subject_area,contact_number,date_of_birth,nid_birth,present_address, permanent_address,gender,user_image_p,user_signature, nid_birth_image, password,created_on,mowgli_code) 
				  VALUES  ('$full_name','$email','$father_name','$mother_name','$subject_area','$contact_number','$date_of_birth','$nid_birth','$present_address','$permanent_address','$gender','$user_image_p','$user_signature','$nid_birth_image','$password','$user_active_from','$pp_id')";
				  $login = mysqli_query($con,$login_query);

    echo "Successfully Registered!!!";
	echo "<script> window.open('signin.php','_self'); </script>";
 
  }
}
  else{
      echo "<script> alert(' Incorrect information, try again !!') </script>";
      echo "<script> window.open('registration.php','_self'); </script>";
    }
}
?>         




