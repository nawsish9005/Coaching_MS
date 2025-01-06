<?php
session_start();
require_once("../../inc/db_con_log_chk.php");

if(isset($_POST['requisition_no']))
{
    $id_name = $_POST['requisition_no'];
}

$res = "";

if(isset($_POST['requisition_no']))
{

    $requisition_no = $_POST['requisition_no'];
    $requisition_no = str_replace("Plus_Smbl", "+", $requisition_no);
    $requisition_no = str_replace('Ampersand_Smbl','&', $requisition_no);
    $requisition_no = str_replace("'","''", $requisition_no);

    $sql = "SELECT * FROM requisition WHERE requisition_no = '$requisition_no'";
    $result = mysql_query($sql) or die(mysql_error());

    while($rows = mysql_fetch_assoc($result))
    {
        $res .=  '<object  data="'.$rows['pdf_file'].'" type="application/pdf" width="100%" height="600px">';
        $res .=  '<p>Alternative text - include a link <a href="'.$rows['pdf_file'].'"> To the PDF!</a></p> </object>';
    }

}

echo $res;

?>