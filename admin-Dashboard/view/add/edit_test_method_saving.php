
<?php 

  session_start();
  require_once("../includes/db_session_chk.php");

  $saveNameID = mysqli_real_escape_string($con, stripslashes(trim($_POST['saveNameID'])));
  $TestName = mysqli_real_escape_string($con, stripslashes(trim($_POST['testname'])));
  $testmethod = mysqli_real_escape_string($con, stripslashes(trim($_POST['testmethod'])));
  $criteria = mysqli_real_escape_string($con, stripslashes(trim($_POST['Lab'])));


  if (($TestName == '') || (empty($TestName)) || is_null($TestName)) 
  {
     echo "Input Name";
     exit();
  }
  
 //  $sql_for_duplicate = "SELECT * FROM `test_method_name` WHERE `testmethod`='$testmethod'"; 
 //  $res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
 //  $row_for_duplicate = mysqli_num_rows($res_for_duplicate);

 // if ($row_for_duplicate >= 1) 
 //  {
 //     echo "Name Already Exists";
 //     exit();
 //  }

 //  else
 //  {  

 $sql_for_duplicate = "SELECT `test_method_name`, `test_name` FROM `test_method_name` WHERE `test_method_name` = '$testmethod'";
  $res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
  $row_for_duplicate = mysqli_num_rows($res_for_duplicate);

  if ($row_for_duplicate >= 1) 
  {
     echo "Test Method & Test Name Already Exists";
     exit();
  }

  else
  {     
    
  $insert_sql_statement="UPDATE test_method_name SET test_name='$TestName', test_method_name='$testmethod', criteria_or_testing_lab='$criteria' 
  WHERE test_method_id='$saveNameID'";

      mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
      
      if(mysqli_affected_rows($con) <> 1)
      {
          echo "Data Not Inserted";
          exit();
      }
      else
      {
        echo "Updated Successfully";
        exit();
      }
    
  //}
    }

 
  
  
?>
