
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
  
 //  $sql_for_duplicate = "SELECT * FROM `savetestnames` WHERE `testmethod`='$testmethod'"; 
 //  $res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
 //  $row_for_duplicate = mysqli_num_rows($res_for_duplicate);

 // if ($row_for_duplicate >= 1) 
 //  {
 //     echo "Name Already Exists";
 //     exit();
 //  }

 //  else
 //  {  

 $sql_for_duplicate = "SELECT `testmethod`, `testName` FROM `savetestnames` WHERE `testmethod` = '$testmethod'";
  $res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
  $row_for_duplicate = mysqli_num_rows($res_for_duplicate);

  if ($row_for_duplicate >= 1) 
  {
     echo "Test Method & Test Name Already Exists";
     exit();
  }

  else
  {     
    $insert_sql_statement = "INSERT INTO `savetestnames` 
                             ( `TestName`,
                             `testmethod`,
                             `criteria`
                             ) 
                        VALUES 
                             ('$testname',
                          '$name_ID',                 
                              '$Lab'                      
                             )"; 

  $insert_sql_statement="UPDATE savetestnames SET TestName='$TestName', testmethod='$testmethod', criteria='$criteria' 
  WHERE saveNameID='$saveNameID'";

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
