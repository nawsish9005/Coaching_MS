<?php
 require_once('../config/db_connection.php'); 

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
 
  
                if ($_FILES["user_image_p"]["error"] > 0) {
                    $user_image_p = "No .jpg";
                    
                } else {
                    $user_image_p = time().$_FILES["user_image_p"]["name"];
                    move_uploaded_file($_FILES["user_image_p"]["tmp_name"],"upload/" . $user_image_p);
                }
                if ($_FILES["user_signature"]["error"] > 0) {
                    $user_signature = "No .jpg";
                    
                } else {
                    $user_signature = time().$_FILES["user_signature"]["name"];
                    move_uploaded_file($_FILES["user_signature"]["tmp_name"],"upload/" . $user_signature);
                }
                if ($_FILES["nid_birth_image"]["error"] > 0) {
                    $nid_birth_image = "No .jpg";
                    
                } else {
                    $nid_birth_image = time().$_FILES["nid_birth_image"]["name"];
                    move_uploaded_file($_FILES["nid_birth_image"]["tmp_name"],"upload/" . $nid_birth_image);
                }
  
	 $password = $_POST['password'];
  $password2 = $_POST['password2'];
		if($password==$password2 && strlen($password) > 3){
			$password = ($password);
 
  $login_query = "INSERT INTO user_signup(full_name,email,father_name,mother_name,subject_area,contact_number,date_of_birth,nid_birth,present_address,permanent_address,gender,user_image_p,user_signature,nid_birth_image,created_on) VALUES ('$full_name','$email','$father_name','$mother_name','$subject_area','$contact_number','$date_of_birth','$nid_birth','$present_address','$permanent_address','$gender','$user_image_p','$user_signature','$nid_birth_image','$password','$user_active_from')";
  $login = mysqli_query($con,$login_query);

    echo "Successfully Registered!!!";
   echo "<script> window.open('../index.php','_self'); </script>";
 
  }
}
  else{
      echo "<script> alert(' Incorrect information, try again !!') </script>";
      echo "<script> window.open('registration.php','_self'); </script>";
    }
?>         