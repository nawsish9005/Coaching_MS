<?php
session_start();
require_once("../includes/db_session_chk.php");

$res = "";

// $sql = "SELECT req.*, 
//                unit.name AS unit_name, 
//                dof.name AS dealing_officer_name
//           FROM requisition AS req
//      LEFT JOIN unit AS unit ON req.unit = unit.id
//      LEFT JOIN dealing_office AS dof ON req.dealing_officer = dof.id";

$sql = "SELECT pp.*, 
               pp_details.*, 
               gi.*, 
               route_issue.*,
               bleaching.*,
               curing.*,
               equalize.*,
               mercerize.*,
               printing.*,
               ready_mercerize.*,
               singe.*
          FROM pp 
     LEFT JOIN pp_details ON pp_details.pp_no_id = pp.pp_id AND pp_details.active = '1'
     LEFT JOIN greige_issunce AS gi ON gi.pp_no_id = pp_details.pp_no_id AND gi.pp_details_id = pp_details.pp_id AND gi.active = '1'
     LEFT JOIN route_issue ON route_issue.greige_issunce_id = gi.greige_issunce_id AND route_issue.active='1'
     LEFT JOIN bleaching ON bleaching.route_issue_id = route_issue.route_issue_id AND bleaching.status='1'
     LEFT JOIN curing ON curing.route_issue_id = route_issue.route_issue_id AND curing.status='1'
     LEFT JOIN equalize ON equalize.route_issue_id = route_issue.route_issue_id AND equalize.status='1'
     LEFT JOIN mercerize ON mercerize.route_issue_id = route_issue.route_issue_id AND mercerize.status='1'
     LEFT JOIN printing ON printing.route_issue_id = route_issue.route_issue_id AND printing.status='1'
     LEFT JOIN ready_mercerize ON ready_mercerize.route_issue_id = route_issue.route_issue_id AND ready_mercerize.status='1'
     LEFT JOIN singe ON singe.route_issue_id = route_issue.route_issue_id AND singe.status='1'";


$result = mysqli_query($sql) or die(mysqli_error());
$data = array();
$sl= 0;

while($rows = mysqli_fetch_assoc($result))
{
    array_push($data, $rows);
}

echo json_encode($data);

?>