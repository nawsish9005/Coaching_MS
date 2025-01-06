var counter = "";
var name_counter = "";
var get_select = '';

function addCounter()
{
    if(counter == "" && name_counter == "")
    {
        counter = parseInt(document.getElementById('database_row_count').value);
        name_counter = parseInt(document.getElementById('database_row_count').value);
    }
    counter = parseInt(counter) + 1;
    name_counter = parseInt(name_counter) + 1;
    document.getElementById('row-counter').value = counter;
    document.getElementById('row-name-counter').value = name_counter;
}

function removeCounter()
{
    if(counter == "")
    {
        counter = parseInt(document.getElementById('database_row_count').value);
        name_counter = parseInt(document.getElementById('database_row_count').value);
    }
    counter = parseInt(counter) - 1;
    name_counter = parseInt(name_counter);
    document.getElementById('row-counter').value = counter;
    document.getElementById('row-name-counter').value = name_counter;
}

//function to initialize select2
function initializeSelect2(selectElementObj) 
{
  selectElementObj.select2(
  {
    width: "100%",
    tags: true
  });
}

//dynamically added selects
// function addRouteProcess(serial) 
// {
//   addCounter();
//   $.ajax({  
//   url:"routeprocessselect.php",  
//   method:"POST",  
//   data: {serial: serial},
//   dataType: "text",  
//   success:function(data)  
//   {

//     var dynamically_created_dropzone = $('<div class="full_row col-md-12 col-sm-12 col-xs-12" id="'+counter+'">'
//                                         +'<div class="col-md-5 col-sm-5 col-xs-4">'
//                                         +'<select id="route'+counter+'" name="route'+counter+'" class="version-route select2 form-control col-md-12 col-xs-12">'
//                                         +data
//                                         +'</select>'
//                                         +'</div>'
//                                         +'<div class="col-md-5 col-sm-5 col-xs-4">'
//                                         +'<select id="process'+counter+'" name="process'+counter+'" class="version-process select2 form-control col-md-12 col-xs-12">'
//                                         +'<option value="process" selected="selected">Process</option>'
//                                         +'<option value="reprocess">Reprocess</option>'
//                                         +'</select>'
//                                         +'</div>'
//                                         +'<div class="col-md-1 col-sm-1 col-xs-4">'
//                                         +' <input id="process_number'+counter+'" value="" name="process_number'+counter+'" placeholder="Number" class="version-number date-picker form-control col-md-12 col-xs-12" type="text">'
//                                         +'</div>'
//                                         +'<div class="col-md-1 col-sm-1 col-xs-2">'
//                                         +' <button type="button" class="btn-xs btn-danger btn_remove" id="'+counter+'" onclick="rmv_row_for_edit(this.id);">X</button>'
//                                         +'</div>'
//                                         +'</div>');

//     $("#new_dropzone_section_version").append(dynamically_created_dropzone);
//     get_select = $('.select2');
//     initializeSelect2(get_select);
//   }

// });

// }



//dynamically added selects
function addnewroute(serial) 
{
    addCounter();
    $.ajax(
    {  
        url:"routeprocessselect.php",
        method:"POST", 
        data: {serial: serial}, 
        dataType: "text",  
        success:function(data)  
        {

            var dynamically_created_dropzone = $('<div class="full_row col-md-12 col-sm-12 col-xs-12" id="'+counter+'">'
                                                +'<div class="col-md-5 col-sm-5 col-xs-4">'
                                                +'<select id="route'+name_counter+'" name="route'+name_counter+'" class="version-route select2 form-control col-md-12 col-xs-12">'
                                                +data
                                                +'</select>'
                                                +'</div>'
                                                +'<div class="col-md-5 col-sm-5 col-xs-4">'
                                                +'<select id="process'+name_counter+'" name="process'+name_counter+'" class="version-process select2 form-control col-md-12 col-xs-12">'
                                                +'<option value="process" selected="selected">Process</option>'
                                                +'<option value="reprocess">Reprocess</option>'
                                                +'</select>'
                                                +'</div>'
                                                +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                                +' <input id="process_number'+name_counter+'" value="" name="process_number'+name_counter+'" placeholder="Number" class="version-number date-picker form-control col-md-12 col-xs-12" type="text">'
                                                +'</div>'
                                                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                                +' <button type="button" class="btn-xs btn-danger btn_remove" id="'+counter+'" onclick="rmv_row_for_edit(this.id);">X</button>'
                                                +'</div>'
                                                +'</div>');

            $("#new_dropzone_section_version").append(dynamically_created_dropzone);
            get_select = $('.select2');
            initializeSelect2(get_select);

        }

    });

}


function rmv_row_for_edit(counter_id)
{
    $("#"+counter_id).remove();
    removeCounter();
}
    
function update_route_data()
{
    var name_counter = parseInt(document.getElementById("row-name-counter").value);
    var row_counter = parseInt(document.getElementById("row-counter").value);

    for (var i = 0; i < row_counter; i++) 
    {
        if(document.getElementsByClassName("version-route")[i].value == "")
        {
            missing_alert_for_class("version-route", i);
            return false;
        }

        if(document.getElementsByClassName("version-process")[i].value == "")
        {
            missing_alert_for_class("version-process", i);
            return false;
        }

        if(document.getElementsByClassName("version-number")[i].value == "")
        {
            missing_alert_for_class("version-number", i);
            return false;
        }
    }

    var formdata = new FormData(document.getElementById('route_selected_form'));
    for (var i = 1; i < name_counter; i++) 
    {
        if(document.getElementsByName("process"+i)[0])
        {
            formdata.append('route'+i,document.getElementsByName("route"+i)[0].value);
            formdata.append('process'+i,document.getElementsByName("process"+i)[0].value);
            formdata.append('process_number'+i,document.getElementsByName("process_number"+i)[0].value);
            if (document.getElementsByName("complete"+i)[0]) 
            {
                formdata.append('complete'+i,document.getElementsByName("complete"+i)[0].value);
            }

            else
            {
                formdata.append('complete'+i, 0);
            }
            
        }
        
    }

    $.ajax(
    {
        type: "POST",
        url: "edit_route_selection_for_greige_saving.php",
        data: formdata,
        processData: false,
        contentType: false,
        error: function(jqXHR, textStatus, errorMessage) 
        {
            alert(errorMessage);
        },
        success: function(data) 
        {
            counter = 1;
            name_counter = 1;
            //info_alert(data);
            if (data == "Duplicate Process Number")
            {
              info_alert("Duplicate Process Number");
            }
            else if (data == "Not insert new pp details")
            {
              info_alert("Data not insert in Database");
            }
            else
            {
                //var pp_id_number = document.getElementById("pp_no_id").value;
                //success_alert("All Data Update Successfully", "../route/route_issue.php");

                var pp_no_id = document.getElementById("pp_no_id").value;
                var pp_version = document.getElementById("pp_details_id").value;
                //var formdata = new FormData(document.getElementById("define-standard-form"));
                //alert(formdata);

                $.ajax(
                {
                      type: "POST",
                      //url: "define_route_issue.php",
                      url: "show_details_of_pp_version.php",
                      method: "POST",
                      data: 
                      {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version
                      },
                      success:function(data)
                      {
                          $('#retrieve_general_data').html(data);
                          $('#retrieve_route_data').html("");

                          //more show
                          // $.ajax(
                          // {
                          //     type: "POST",
                          //     url: "define_route_issue.php",
                          //     method: "POST",
                          //     data: 
                          //     {
                          //       pp_no_id: pp_no_id, 
                          //       pp_version: pp_version
                          //     },
                          //     success:function(data)
                          //     {
                          //         $('#retrieve_general_data').html(data);
                          //         $('#retrieve_route_data').html("");
                          //     }
                          // });
                      }
                });

            }
        } 
    });
      
}