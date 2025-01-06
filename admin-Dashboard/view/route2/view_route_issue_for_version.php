<?php ?>

<div class="x_panel">
	<div class="x_title">
	  <h2>Route Issue</h2>
	  <ul class="nav navbar-right panel_toolbox">
	    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	    </li>
	  </ul>
	  <div class="clearfix"></div>
	</div>
	<div class="x_content">
	  <table id="datatable-buttons" class="table table-striped table-bordered">
	    <thead>
	      <tr>
	        <th>SI</th>
	        <th>Route</th>
	        <th>Process/Reprocess</th>
	      </tr>
	    </thead>
	    
	    <tbody>
	      <?php 
	        $s1 = 1;
	        $sql_for_pp = "SELECT route_issue.*, greige_issunce.*
	                       FROM route_issue, greige_issunce  
	                       WHERE route_issue.greige_issunce_id = '$greige_issunce_id'
	                       AND route_issue.greige_issunce_id = greige_issunce.greige_issunce_id
	                       AND route_issue.active = '1'
	                       AND greige_issunce.active = '1'
	                       ORDER BY route_issue.process_number ASC
	                       ";

	        $res_for_pp = mysqli_query($con, $sql_for_pp);
	        while ($row = mysqli_fetch_assoc($res_for_pp)) 
	        {
	          ?>
	          <tr>
	            <td><?php echo $s1; ?></td>
	            <td>
	              <?php 
	                $route_id = $row['route'];
	                $sql_for_route = "SELECT route_name FROM route WHERE route_id = '$route_id'";
	                $res_for_route = mysqli_query($con, $sql_for_route);
	                $row_for_route = mysqli_fetch_assoc($res_for_route);
	                echo $row_for_route['route_name'];
	               ?> 
	            </td>
	            <td><?php echo $row['process'] ?></td>
	          </tr>
	          <?php 
	          ++$s1;
	        }
	      ?>
	    </tbody> 
	  </table>
	</div>
	</div>


<?php  ?>