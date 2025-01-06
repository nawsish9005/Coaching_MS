<?php
session_start();
require_once("../includes/db_session_chk.php");
$greige_issunce_id;
$pp_no_id;
?>

<div class="x_panel">
  <div class="x_title">
    <h2>Process Route Selection</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <div class="col-md-12 center-margin">
      <form id="route_selected_form" name="route_selected_form" data-parsley-validate class="form-horizontal form-label-left">
        <div>
            <input type="hidden" value="1" id="row-counter" name="row-counter" class="form-control col-md-7 col-xs-12">
            <input type="hidden" value="<?php echo $pp_no_id; ?>" id="pp_no_id_add" name="pp_no_id_add" class="form-control col-md-7 col-xs-12">
            <input type="hidden" value="1" id="row-name-counter" name="row-name-counter" class="form-control col-md-7 col-xs-12">
        </div>

        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <p>
               Active :
              <input type="radio" class="flat" name="active" id="active" value="1" checked/> 

               Not Active :
              <input type="radio" class="flat" name="active" id="notactive" value="0" />
            </p>
          </div>
        </div>

        <?php 

            $sql = "SELECT * FROM route ORDER BY route_name";
            $res = mysqli_query($con, $sql) or die(mysqli_error($con));
            while ($row = mysqli_fetch_assoc($res)) 
            {
                echo '<div class="btn-group" role="group" aria-label="Basic example">';
                //echo '<input type="checkbox" id="route_process'.$row['route_id'].'" name="route_process'.$row['route_id'].'" onclick="addRouteProcess('.$row['route_id'].')">';
                echo '<button type="button" id="route_process'.$row['route_id'].'" name="route_process'.$row['route_id'].'" onclick="addRouteProcess('.$row['route_id'].')" class="btn btn-success">'.$row['route_name'].'</button>';
                echo "</div>";
            }
        ?>

        <br>

        <div id="new_dropzone_section_version"></div>

        <script type="text/javascript">
        var counter = 0;
        var name_counter = 0;

        function addCounter()
        {
          counter = parseInt(counter) + 1;
          name_counter = parseInt(name_counter) + 1;
          document.getElementById('row-counter').value = counter;
          document.getElementById('row-name-counter').value = counter;
        }

        function removeCounter()
        {
          counter = parseInt(counter) - 1;
          document.getElementById('row-counter').value = counter;
        }

        function rmv_row(counter_id)
        {
            $("#"+counter_id).remove();
            removeCounter();
        }


          //dynamically added selects
          function addRouteProcess(serial) 
          {
              addCounter();
              $.ajax({  
              url:"routeprocessselect.php",  
              method:"POST",  
              data: {serial: serial},
              dataType: "text",  
              success:function(data)  
              {

                var dynamically_created_dropzone = $('<div class="full_row col-md-12 col-sm-12 col-xs-12" id="'+counter+'">'
                                                    +'<div class="col-md-5 col-sm-5 col-xs-4">'
                                                    +'<select id="route'+counter+'" name="route'+counter+'" class="version-route select2 form-control col-md-12 col-xs-12">'
                                                    +data
                                                    +'</select>'
                                                    +'</div>'
                                                    +'<div class="col-md-5 col-sm-5 col-xs-4">'
                                                    +'<select id="process'+counter+'" name="process'+counter+'" class="version-process select2 form-control col-md-12 col-xs-12">'
                                                    +'<option value="process" selected="selected">Process</option>'
                                                    +'<option value="reprocess">Reprocess</option>'
                                                    +'</select>'
                                                    +'</div>'
                                                    +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                                    +' <input id="process_number'+counter+'" value="" name="process_number'+counter+'" placeholder="Number" class="version-number date-picker form-control col-md-12 col-xs-12" type="text">'
                                                    +'</div>'
                                                    +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                                    +' <button type="button" class="btn-xs btn-danger btn_remove" id="'+counter+'" onclick="rmv_row(this.id);">X</button>'
                                                    +'</div>'
                                                    +'</div>');

                $("#new_dropzone_section_version").append(dynamically_created_dropzone);
                get_select = $('.select2');
                initializeSelect2(get_select);
              }

            });

          }
      </script>


        
        <!-- <div class="ln_solid"></div> -->
        <br>

        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <button type="button" name="submit" id="submit" class="btn btn-success" onclick="on_submit_for_route_issue_data();">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php 

?>
