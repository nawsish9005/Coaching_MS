<?php 
	session_start();
	require_once("../includes/db_session_chk.php");
	$customers_name=	$demo2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['customers_name'])));
	$demo2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['demo2'])));

	#echo "rrrrrrrrr".$demo2;
	#echo $customers_name;
	$demo3=explode(",",$demo2);
#print_r($demo3);

if (($customers_name == '') || (empty($customers_name)) || is_null($customers_name)) 
	{
	   echo "Input Customer Name";
	   exit();
	}


   $delete_sql_statement1 ="DELETE FROM `customer_selection` WHERE `cutomer_name`='$customers_name'";
   mysqli_query($con, $delete_sql_statement1) or die(mysqli_error($con));
foreach($demo3 as $x => $val) {
 $x = $val;

 $sql_for_duplicate = "SELECT * FROM `customer_selection` WHERE `cutomer_name`='$customers_name' and `saveNameID`='$val'"; 
  $res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
  $row_for_duplicate = mysqli_num_rows($res_for_duplicate);

		 if ($row_for_duplicate >= 1) 
		  {

		  }
		  else {
		  	# code...

   
	  
 	 $insert_sql_statement = "INSERT INTO `customer_selection` 
                             ( 
                              `cutomer_name`,
                              `saveNameID`
                             ) 
                        VALUES 
                             ( 
                              '$customers_name',
                              '$val'
                             )";
                   /* $insert_sql_statement = "UPDATE `customer_selection` SET `saveNameID`='$val' WHERE  `cutomer_name`='$customers_name'";*/


                   
                   mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
                   }


}
						
			# code...
			
 								echo "Data Saved Successfully";

           				    	exit();
				    

				/*    
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

			# code...
		}
		*/			
			
	
		 #echo $insert_sql_statement;


	   
		
	
?>