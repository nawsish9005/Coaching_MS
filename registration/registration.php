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
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  
 if($password==$password2 && strlen($password) > 3){
  $password = ($password);
 
  $login_query = "INSERT INTO user_signup(full_name, email, father_name, mother_name, subject_area, contact_number, date_of_birth, nid_birth, present_address, permanent_address, gender, created_on) VALUES ('$full_name', '$email', '$father_name', '$mother_name','$subject_area','$contact_number','$date_of_birth','$nid_birth','$present_address','$permanent_address','$gender','$password','$user_active_from')";
  $login = mysqli_query($con,$login_query);

    echo "Successfully Registered!!!";
   echo "<script> window.open('index.php','_self'); </script>";
 
  }
}
  else{
      echo "<script> alert(' Incorrect information, try again !!') </script>";
      echo "<script> window.open('index.php','_self'); </script>";
    }
?>         