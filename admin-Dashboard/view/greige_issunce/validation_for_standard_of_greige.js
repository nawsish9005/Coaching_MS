function yarn_warp_condition() 
{
    if (document.getElementById("yarn_warp_cond1").value == 1) 
    {
    document.getElementById("yarn_warp_cond2").value = 1;
    }
    else
    {
    document.getElementById("yarn_warp_cond2").value = 2;
    }
}

function yarn_weft_condition() 
{
    if (document.getElementById("yarn_weft_cond1").value == 1) 
    {
    document.getElementById("yarn_weft_cond2").value = 1;
    }
    else
    {
    document.getElementById("yarn_weft_cond2").value = 2;
    }
}

function thread_epi_condition() 
{
    if (document.getElementById("thread_epi_cond1").value == 1) 
    {
    document.getElementById("thread_epi_cond2").value = 1;
    }
    else
    {
    document.getElementById("thread_epi_cond2").value = 2;
    }
}

function thread_ppi_condition() 
{
    if (document.getElementById("thread_ppi_cond1").value == 1) 
    {
    document.getElementById("thread_ppi_cond2").value = 1;
    }
    else
    {
    document.getElementById("thread_ppi_cond2").value = 2;
    }
}

function gsm_condition() 
{
    if (document.getElementById("gsm_warp_cond1").value == 1) 
    {
    document.getElementById("gsm_warp_cond2").value = 1;
    }
    else
    {
    document.getElementById("gsm_warp_cond2").value = 2;
    }
}

function greige_width_condition() 
{
    if (document.getElementById("greige_width_cond1").value == 1) 
    {
    document.getElementById("greige_width_cond2").value = 1;
    }
    else
    {
    document.getElementById("greige_width_cond2").value = 2;
    }
}

function Form_Validation()
{

    if(document.getElementById("yarn_warp_cond1").value == "")
    {
        missing_alert("yarn_warp_cond1");
        return false;
    }
    if(document.getElementById("yarn_warp_value1").value == "")
    {
        missing_alert("yarn_warp_value1");
        return false;
    }
    if(isNaN(document.getElementById("yarn_warp_value1").value))
    {
        number_alert("yarn_warp_value1");
        return false;
    }
    if(document.getElementById("yarn_warp_value2").value == "")
    {
        missing_alert("yarn_warp_value2");
        return false;
    }
    if(isNaN(document.getElementById("yarn_warp_value2").value))
    {
        number_alert("yarn_warp_value2");
        return false;
    }
    if(document.getElementById("yarn_warp_cond1").value == 1 && (parseFloat(document.getElementById("yarn_warp_value2").value)) <= (parseFloat(document.getElementById("yarn_warp_value1").value)))
    {
        warning_alert("Should be Bigger", "yarn_warp_value2");
        return false;
    }
    if(document.getElementById("yarn_warp_cond1").value == 2 && (parseFloat(document.getElementById("yarn_warp_value2").value)) < (parseFloat(document.getElementById("yarn_warp_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "yarn_warp_value2");
        return false;
    }
    if(document.getElementById("yarn_warp_cond2").value == "")
    {
        missing_alert("yarn_warp_cond2");
        return false;
    }


    //start yarn weft
    if(document.getElementById("yarn_weft_cond1").value == "")
    {
        missing_alert("yarn_weft_cond1");
        return false;
    }
    if(document.getElementById("yarn_weft_value1").value == "")
    {
        missing_alert("yarn_weft_value1");
        return false;
    }
    if(isNaN(document.getElementById("yarn_weft_value1").value))
    {
        number_alert("yarn_weft_value1");
        return false;
    }
    if(document.getElementById("yarn_weft_value2").value == "")
    {
        missing_alert("yarn_weft_value2");
        return false;
    }
    if(isNaN(document.getElementById("yarn_weft_value2").value))
    {
        number_alert("yarn_weft_value2");
        return false;
    }
    if(document.getElementById("yarn_weft_cond1").value == 1 && (parseFloat(document.getElementById("yarn_weft_value2").value)) <= (parseFloat(document.getElementById("yarn_weft_value1").value)))
    {
        warning_alert("Should be Bigger", "yarn_weft_value2");
        return false;
    }
    if(document.getElementById("yarn_weft_cond1").value == 2 && (parseFloat(document.getElementById("yarn_weft_value2").value)) < (parseFloat(document.getElementById("yarn_weft_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "yarn_weft_value2");
        return false;
    }
    if(document.getElementById("yarn_weft_cond2").value == "")
    {
        missing_alert("yarn_weft_cond2");
        return false;
    }

    //start thread epi
    if(document.getElementById("thread_epi_cond1").value == "")
    {
        missing_alert("thread_epi_cond1");
        return false;
    }
    if(document.getElementById("thread_epi_value1").value == "")
    {
        missing_alert("thread_epi_value1");
        return false;
    }
    if(isNaN(document.getElementById("thread_epi_value1").value))
    {
        number_alert("thread_epi_value1");
        return false;
    }
    if(document.getElementById("thread_epi_value2").value == "")
    {
        missing_alert("thread_epi_value2");
        return false;
    }
    if(isNaN(document.getElementById("thread_epi_value2").value))
    {
        number_alert("thread_epi_value2");
        return false;
    }
    if(document.getElementById("thread_epi_cond1").value == 1 && (parseFloat(document.getElementById("thread_epi_value2").value)) <= (parseFloat(document.getElementById("thread_epi_value1").value)))
    {
        warning_alert("Should be Bigger", "thread_epi_value2");
        return false;
    }
    if(document.getElementById("thread_epi_cond1").value == 2 && (parseFloat(document.getElementById("thread_epi_value2").value)) < (parseFloat(document.getElementById("thread_epi_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "thread_epi_value2");
        return false;
    }
    if(document.getElementById("thread_epi_cond2").value == "")
    {
        missing_alert("thread_epi_cond2");
        return false;
    }

    //start thread ppi
    if(document.getElementById("thread_ppi_cond1").value == "")
    {
        missing_alert("thread_ppi_cond1");
        return false;
    }
    if(document.getElementById("thread_ppi_value1").value == "")
    {
        missing_alert("thread_ppi_value1");
        return false;
    }
    if(isNaN(document.getElementById("thread_ppi_value1").value))
    {
        number_alert("thread_ppi_value1");
        return false;
    }
    if(document.getElementById("thread_ppi_value2").value == "")
    {
        missing_alert("thread_ppi_value2");
        return false;
    }
    if(isNaN(document.getElementById("thread_ppi_value2").value))
    {
        number_alert("thread_ppi_value2");
        return false;
    }
    if(document.getElementById("thread_ppi_cond1").value == 1 && (parseFloat(document.getElementById("thread_ppi_value2").value)) <= (parseFloat(document.getElementById("thread_ppi_value1").value)))
    {
        warning_alert("Should be Bigger", "thread_ppi_value2");
        return false;
    }
    if(document.getElementById("thread_ppi_cond1").value == 2 && (parseFloat(document.getElementById("thread_ppi_value2").value)) < (parseFloat(document.getElementById("thread_ppi_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "thread_ppi_value2");
        return false;
    }
    if(document.getElementById("thread_ppi_cond2").value == "")
    {
        missing_alert("thread_ppi_cond2");
        return false;
    }

    //start gsm warp
    if(document.getElementById("gsm_warp_cond1").value == "")
    {
        missing_alert("gsm_warp_cond1");
        return false;
    }
    if(document.getElementById("gsm_warp_value1").value == "")
    {
        missing_alert("gsm_warp_value1");
        return false;
    }
    if(isNaN(document.getElementById("gsm_warp_value1").value))
    {
        number_alert("gsm_warp_value1");
        return false;
    }
    if(document.getElementById("gsm_warp_value2").value == "")
    {
        missing_alert("gsm_warp_value2");
        return false;
    }
    if(isNaN(document.getElementById("gsm_warp_value2").value))
    {
        number_alert("gsm_warp_value2");
        return false;
    }
    if(document.getElementById("gsm_warp_cond1").value == 1 && (parseFloat(document.getElementById("gsm_warp_value2").value)) <= (parseFloat(document.getElementById("gsm_warp_value1").value)))
    {
        warning_alert("Should be Bigger", "gsm_warp_value2");
        return false;
    }
    if(document.getElementById("gsm_warp_cond1").value == 2 && (parseFloat(document.getElementById("gsm_warp_value2").value)) < (parseFloat(document.getElementById("gsm_warp_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "gsm_warp_value2");
        return false;
    }
    if(document.getElementById("gsm_warp_cond2").value == "")
    {
        missing_alert("gsm_warp_cond2");
        return false;
    }


    //start greige_width
    if(document.getElementById("greige_width_cond1").value == "")
    {
        missing_alert("greige_width_cond1");
        return false;
    }
    if(document.getElementById("greige_width_value1").value == "")
    {
        missing_alert("greige_width_value1");
        return false;
    }
    if(isNaN(document.getElementById("greige_width_value1").value))
    {
        number_alert("greige_width_value1");
        return false;
    }
    if(document.getElementById("greige_width_value2").value == "")
    {
        missing_alert("greige_width_value2");
        return false;
    }
    if(isNaN(document.getElementById("greige_width_value2").value))
    {
        number_alert("greige_width_value2");
        return false;
    }
    if(document.getElementById("greige_width_cond1").value == 1 && (parseFloat(document.getElementById("greige_width_value2").value)) <= (parseFloat(document.getElementById("greige_width_value1").value)))
    {
        warning_alert("Should be Bigger", "greige_width_value2");
        return false;
    }
    if(document.getElementById("greige_width_cond1").value == 2 && (parseFloat(document.getElementById("greige_width_value2").value)) < (parseFloat(document.getElementById("greige_width_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "greige_width_value2");
        return false;
    }
    if(document.getElementById("greige_width_cond2").value == "")
    {
        missing_alert("greige_width_cond2");
        return false;
    }



    if ((document.getElementsByName("fiber_content")[0].checked) || (document.getElementsByName("fiber_content")[1].checked) || (document.getElementsByName("fiber_content")[2].checked) )
    {
        update_check = document.getElementById("update").value;
        //check not more than 100 or less than 100
        var fiber_content_selected_for_number = parseInt(document.getElementById("fiber_content_selected_for_number").value);

        if (update_check == "yes") 
        {
            if (fiber_content_selected_for_number == 1) 
            {
                if ( (document.getElementById("fiber_total_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_total_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_total_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_total_fourth_tol_value1").value != "") )
                {
                    var total_fiber_content = 0;
                    var total_polyester_value = parseInt(document.getElementById("fiber_total_polyester_tol_value1").value);
                    var total_cotton_value = parseInt(document.getElementById("fiber_total_cotton_tol_value1").value);
                    var total_thired_value = parseInt(document.getElementById("fiber_total_thired_tol_value1").value);
                    var total_fourth_value = parseInt(document.getElementById("fiber_total_fourth_tol_value1").value);

                    var total_polyester = isNaN(total_polyester_value) ? 0 : total_polyester_value;
                    var total_cotton = isNaN(total_cotton_value) ? 0 : total_cotton_value;
                    var total_thired = isNaN(total_thired_value) ? 0 : total_thired_value;
                    var total_fourth = isNaN(total_fourth_value) ? 0 : total_fourth_value;

                    total_fiber_content = total_polyester + total_cotton + total_thired + total_fourth;

                    if (total_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Total value result exactly 100");
                        return false;
                    }
                }
                    
            }


            else if (fiber_content_selected_for_number == 2) 
            {
                if ( (document.getElementById("fiber_warp_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_warp_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_warp_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_warp_fourth_tol_value1").value != "") )
                {
                    var total_warp_fiber_content = 0;
                    var total_warp_polyester_value = parseInt(document.getElementById("fiber_warp_polyester_tol_value1").value);
                    var total_warp_cotton_value = parseInt(document.getElementById("fiber_warp_cotton_tol_value1").value);
                    var total_warp_thired_value = parseInt(document.getElementById("fiber_warp_thired_tol_value1").value);
                    var total_warp_fourth_value = parseInt(document.getElementById("fiber_warp_fourth_tol_value1").value);

                    var total_warp_polyester = isNaN(total_warp_polyester_value) ? 0 : total_warp_polyester_value;
                    var total_warp_cotton = isNaN(total_warp_cotton_value) ? 0 : total_warp_cotton_value;
                    var total_warp_thired = isNaN(total_warp_thired_value) ? 0 : total_warp_thired_value;
                    var total_warp_fourth = isNaN(total_warp_fourth_value) ? 0 : total_warp_fourth_value;

                    total_warp_fiber_content = total_warp_polyester + total_warp_cotton + total_warp_thired + total_warp_fourth;

                    if (total_warp_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Wrap all value result exactly 100");
                        return false;
                    }
                }


                if ( (document.getElementById("fiber_weft_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_weft_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_weft_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_weft_fourth_tol_value1").value != "") )
                {
                    var total_weft_fiber_content = 0;

                    var total_weft_polyester_value = parseInt(document.getElementById("fiber_weft_polyester_tol_value1").value);
                    var total_weft_cotton_value = parseInt(document.getElementById("fiber_weft_cotton_tol_value1").value);
                    var total_weft_thired_value = parseInt(document.getElementById("fiber_weft_thired_tol_value1").value);
                    var total_weft_fourth_value = parseInt(document.getElementById("fiber_weft_fourth_tol_value1").value);

                    var total_weft_polyester = isNaN(total_weft_polyester_value) ? 0 : total_weft_polyester_value;
                    var total_weft_cotton = isNaN(total_weft_cotton_value) ? 0 : total_weft_cotton_value;
                    var total_weft_thired = isNaN(total_weft_thired_value) ? 0 : total_weft_thired_value;
                    var total_weft_fourth = isNaN(total_weft_fourth_value) ? 0 : total_weft_fourth_value;

                    total_weft_fiber_content = total_weft_polyester + total_weft_cotton + total_weft_thired + total_weft_fourth;

                    if (total_weft_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Weft all value result exactly 100");
                        return false;
                    }
                }

            }

            else if (fiber_content_selected_for_number == 3) 
            {

                if ( (document.getElementById("fiber_total_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_total_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_total_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_total_fourth_tol_value1").value != "") )
                {
                    var total_fiber_content = 0;
                    var total_polyester_value = parseInt(document.getElementById("fiber_total_polyester_tol_value1").value);
                    var total_cotton_value = parseInt(document.getElementById("fiber_total_cotton_tol_value1").value);
                    var total_thired_value = parseInt(document.getElementById("fiber_total_thired_tol_value1").value);
                    var total_fourth_value = parseInt(document.getElementById("fiber_total_fourth_tol_value1").value);

                    var total_polyester = isNaN(total_polyester_value) ? 0 : total_polyester_value;
                    var total_cotton = isNaN(total_cotton_value) ? 0 : total_cotton_value;
                    var total_thired = isNaN(total_thired_value) ? 0 : total_thired_value;
                    var total_fourth = isNaN(total_fourth_value) ? 0 : total_fourth_value;

                    total_fiber_content = total_polyester + total_cotton + total_thired + total_fourth;

                    if (total_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Total value result exactly 100");
                        return false;
                    }
                }


                if ( (document.getElementById("fiber_warp_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_warp_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_warp_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_warp_fourth_tol_value1").value != "") )
                {
                    var total_warp_fiber_content = 0;
                    var total_warp_polyester_value = parseInt(document.getElementById("fiber_warp_polyester_tol_value1").value);
                    var total_warp_cotton_value = parseInt(document.getElementById("fiber_warp_cotton_tol_value1").value);
                    var total_warp_thired_value = parseInt(document.getElementById("fiber_warp_thired_tol_value1").value);
                    var total_warp_fourth_value = parseInt(document.getElementById("fiber_warp_fourth_tol_value1").value);

                    var total_warp_polyester = isNaN(total_warp_polyester_value) ? 0 : total_warp_polyester_value;
                    var total_warp_cotton = isNaN(total_warp_cotton_value) ? 0 : total_warp_cotton_value;
                    var total_warp_thired = isNaN(total_warp_thired_value) ? 0 : total_warp_thired_value;
                    var total_warp_fourth = isNaN(total_warp_fourth_value) ? 0 : total_warp_fourth_value;

                    total_warp_fiber_content = total_warp_polyester + total_warp_cotton + total_warp_thired + total_warp_fourth;

                    if (total_warp_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Wrap all value result exactly 100");
                        return false;
                    }
                }


                if ( (document.getElementById("fiber_weft_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_weft_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_weft_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_weft_fourth_tol_value1").value != "") )
                {
                    var total_weft_fiber_content = 0;

                    var total_weft_polyester_value = parseInt(document.getElementById("fiber_weft_polyester_tol_value1").value);
                    var total_weft_cotton_value = parseInt(document.getElementById("fiber_weft_cotton_tol_value1").value);
                    var total_weft_thired_value = parseInt(document.getElementById("fiber_weft_thired_tol_value1").value);
                    var total_weft_fourth_value = parseInt(document.getElementById("fiber_weft_fourth_tol_value1").value);

                    var total_weft_polyester = isNaN(total_weft_polyester_value) ? 0 : total_weft_polyester_value;
                    var total_weft_cotton = isNaN(total_weft_cotton_value) ? 0 : total_weft_cotton_value;
                    var total_weft_thired = isNaN(total_weft_thired_value) ? 0 : total_weft_thired_value;
                    var total_weft_fourth = isNaN(total_weft_fourth_value) ? 0 : total_weft_fourth_value;

                    total_weft_fiber_content = total_weft_polyester + total_weft_cotton + total_weft_thired + total_weft_fourth;

                    if (total_weft_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Weft all value result exactly 100");
                        return false;
                    }
                }

            }

            else
            {
                info_alert("Something Wrong");
                return false;
            }
        }

        else
        {
            var fiber_content_select = document.getElementById("fiber_content_select").value;

            if ( (fiber_content_select == null) || (fiber_content_select == "") ) 
            {
                if (fiber_content_selected_for_number == 1) 
                {
                    var total_fiber_content = 0;
                    var total_polyester_value = parseInt(document.getElementById("fiber_total_polyester_tol_value1").value);
                    var total_cotton_value = parseInt(document.getElementById("fiber_total_cotton_tol_value1").value);
                    var total_thired_value = parseInt(document.getElementById("fiber_total_thired_tol_value1").value);
                    var total_fourth_value = parseInt(document.getElementById("fiber_total_fourth_tol_value1").value);

                    var total_polyester = isNaN(total_polyester_value) ? 0 : total_polyester_value;
                    var total_cotton = isNaN(total_cotton_value) ? 0 : total_cotton_value;
                    var total_thired = isNaN(total_thired_value) ? 0 : total_thired_value;
                    var total_fourth = isNaN(total_fourth_value) ? 0 : total_fourth_value;

                    total_fiber_content = total_polyester + total_cotton + total_thired + total_fourth;

                    if (total_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Total value result exactly 100");
                        return false;
                    }
                        
                }


                else if (fiber_content_selected_for_number == 2) 
                {
                    
                    var total_warp_fiber_content = 0;
                    var total_warp_polyester_value = parseInt(document.getElementById("fiber_warp_polyester_tol_value1").value);
                    var total_warp_cotton_value = parseInt(document.getElementById("fiber_warp_cotton_tol_value1").value);
                    var total_warp_thired_value = parseInt(document.getElementById("fiber_warp_thired_tol_value1").value);
                    var total_warp_fourth_value = parseInt(document.getElementById("fiber_warp_fourth_tol_value1").value);

                    var total_warp_polyester = isNaN(total_warp_polyester_value) ? 0 : total_warp_polyester_value;
                    var total_warp_cotton = isNaN(total_warp_cotton_value) ? 0 : total_warp_cotton_value;
                    var total_warp_thired = isNaN(total_warp_thired_value) ? 0 : total_warp_thired_value;
                    var total_warp_fourth = isNaN(total_warp_fourth_value) ? 0 : total_warp_fourth_value;

                    total_warp_fiber_content = total_warp_polyester + total_warp_cotton + total_warp_thired + total_warp_fourth;

                    if (total_warp_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Wrap all value result exactly 100");
                        return false;
                    }


                    var total_weft_fiber_content = 0;

                    var total_weft_polyester_value = parseInt(document.getElementById("fiber_weft_polyester_tol_value1").value);
                    var total_weft_cotton_value = parseInt(document.getElementById("fiber_weft_cotton_tol_value1").value);
                    var total_weft_thired_value = parseInt(document.getElementById("fiber_weft_thired_tol_value1").value);
                    var total_weft_fourth_value = parseInt(document.getElementById("fiber_weft_fourth_tol_value1").value);

                    var total_weft_polyester = isNaN(total_weft_polyester_value) ? 0 : total_weft_polyester_value;
                    var total_weft_cotton = isNaN(total_weft_cotton_value) ? 0 : total_weft_cotton_value;
                    var total_weft_thired = isNaN(total_weft_thired_value) ? 0 : total_weft_thired_value;
                    var total_weft_fourth = isNaN(total_weft_fourth_value) ? 0 : total_weft_fourth_value;

                    total_weft_fiber_content = total_weft_polyester + total_weft_cotton + total_weft_thired + total_weft_fourth;

                    if (total_weft_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Weft all value result exactly 100");
                        return false;
                    }

                }

                else if (fiber_content_selected_for_number == 3) 
                {
                    var total_fiber_content = 0;
                    var total_polyester_value = parseInt(document.getElementById("fiber_total_polyester_tol_value1").value);
                    var total_cotton_value = parseInt(document.getElementById("fiber_total_cotton_tol_value1").value);
                    var total_thired_value = parseInt(document.getElementById("fiber_total_thired_tol_value1").value);
                    var total_fourth_value = parseInt(document.getElementById("fiber_total_fourth_tol_value1").value);

                    var total_polyester = isNaN(total_polyester_value) ? 0 : total_polyester_value;
                    var total_cotton = isNaN(total_cotton_value) ? 0 : total_cotton_value;
                    var total_thired = isNaN(total_thired_value) ? 0 : total_thired_value;
                    var total_fourth = isNaN(total_fourth_value) ? 0 : total_fourth_value;

                    total_fiber_content = total_polyester + total_cotton + total_thired + total_fourth;

                    if (total_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Total value result exactly 100");
                        return false;
                    }

                    var total_warp_fiber_content = 0;
                    var total_warp_polyester_value = parseInt(document.getElementById("fiber_warp_polyester_tol_value1").value);
                    var total_warp_cotton_value = parseInt(document.getElementById("fiber_warp_cotton_tol_value1").value);
                    var total_warp_thired_value = parseInt(document.getElementById("fiber_warp_thired_tol_value1").value);
                    var total_warp_fourth_value = parseInt(document.getElementById("fiber_warp_fourth_tol_value1").value);

                    var total_warp_polyester = isNaN(total_warp_polyester_value) ? 0 : total_warp_polyester_value;
                    var total_warp_cotton = isNaN(total_warp_cotton_value) ? 0 : total_warp_cotton_value;
                    var total_warp_thired = isNaN(total_warp_thired_value) ? 0 : total_warp_thired_value;
                    var total_warp_fourth = isNaN(total_warp_fourth_value) ? 0 : total_warp_fourth_value;

                    total_warp_fiber_content = total_warp_polyester + total_warp_cotton + total_warp_thired + total_warp_fourth;

                    if (total_warp_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Wrap all value result exactly 100");
                        return false;
                    }


                    
                    var total_weft_fiber_content = 0;

                    var total_weft_polyester_value = parseInt(document.getElementById("fiber_weft_polyester_tol_value1").value);
                    var total_weft_cotton_value = parseInt(document.getElementById("fiber_weft_cotton_tol_value1").value);
                    var total_weft_thired_value = parseInt(document.getElementById("fiber_weft_thired_tol_value1").value);
                    var total_weft_fourth_value = parseInt(document.getElementById("fiber_weft_fourth_tol_value1").value);

                    var total_weft_polyester = isNaN(total_weft_polyester_value) ? 0 : total_weft_polyester_value;
                    var total_weft_cotton = isNaN(total_weft_cotton_value) ? 0 : total_weft_cotton_value;
                    var total_weft_thired = isNaN(total_weft_thired_value) ? 0 : total_weft_thired_value;
                    var total_weft_fourth = isNaN(total_weft_fourth_value) ? 0 : total_weft_fourth_value;

                    total_weft_fiber_content = total_weft_polyester + total_weft_cotton + total_weft_thired + total_weft_fourth;

                    if (total_weft_fiber_content != 100)
                    {
                        info_alert("Make sure Fiber Weft all value result exactly 100");
                        return false;
                    }

                }

                else
                {
                    info_alert("Something Wrong");
                    return false;
                }
            }

            else
            {
                if (fiber_content_selected_for_number == 1) 
                {   
                    if ( (document.getElementById("fiber_total_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_total_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_total_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_total_fourth_tol_value1").value != "") )
                    {
                        var total_fiber_content = 0;
                        var total_polyester_value = parseInt(document.getElementById("fiber_total_polyester_tol_value1").value);
                        var total_cotton_value = parseInt(document.getElementById("fiber_total_cotton_tol_value1").value);
                        var total_thired_value = parseInt(document.getElementById("fiber_total_thired_tol_value1").value);
                        var total_fourth_value = parseInt(document.getElementById("fiber_total_fourth_tol_value1").value);

                        var total_polyester = isNaN(total_polyester_value) ? 0 : total_polyester_value;
                        var total_cotton = isNaN(total_cotton_value) ? 0 : total_cotton_value;
                        var total_thired = isNaN(total_thired_value) ? 0 : total_thired_value;
                        var total_fourth = isNaN(total_fourth_value) ? 0 : total_fourth_value;

                        total_fiber_content = total_polyester + total_cotton + total_thired + total_fourth;

                        if (total_fiber_content != 100)
                        {
                            info_alert("Make sure Fiber Total value result exactly 100");
                            return false;
                        }
                    }
                        
                }


                else if (fiber_content_selected_for_number == 2) 
                {
                    if ( (document.getElementById("fiber_warp_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_warp_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_warp_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_warp_fourth_tol_value1").value != "") )
                    {
                        var total_warp_fiber_content = 0;
                        var total_warp_polyester_value = parseInt(document.getElementById("fiber_warp_polyester_tol_value1").value);
                        var total_warp_cotton_value = parseInt(document.getElementById("fiber_warp_cotton_tol_value1").value);
                        var total_warp_thired_value = parseInt(document.getElementById("fiber_warp_thired_tol_value1").value);
                        var total_warp_fourth_value = parseInt(document.getElementById("fiber_warp_fourth_tol_value1").value);

                        var total_warp_polyester = isNaN(total_warp_polyester_value) ? 0 : total_warp_polyester_value;
                        var total_warp_cotton = isNaN(total_warp_cotton_value) ? 0 : total_warp_cotton_value;
                        var total_warp_thired = isNaN(total_warp_thired_value) ? 0 : total_warp_thired_value;
                        var total_warp_fourth = isNaN(total_warp_fourth_value) ? 0 : total_warp_fourth_value;

                        total_warp_fiber_content = total_warp_polyester + total_warp_cotton + total_warp_thired + total_warp_fourth;

                        if (total_warp_fiber_content != 100)
                        {
                            info_alert("Make sure Fiber Wrap all value result exactly 100");
                            return false;
                        }
                    }


                    if ( (document.getElementById("fiber_weft_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_weft_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_weft_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_weft_fourth_tol_value1").value != "") )
                    {
                        var total_weft_fiber_content = 0;

                        var total_weft_polyester_value = parseInt(document.getElementById("fiber_weft_polyester_tol_value1").value);
                        var total_weft_cotton_value = parseInt(document.getElementById("fiber_weft_cotton_tol_value1").value);
                        var total_weft_thired_value = parseInt(document.getElementById("fiber_weft_thired_tol_value1").value);
                        var total_weft_fourth_value = parseInt(document.getElementById("fiber_weft_fourth_tol_value1").value);

                        var total_weft_polyester = isNaN(total_weft_polyester_value) ? 0 : total_weft_polyester_value;
                        var total_weft_cotton = isNaN(total_weft_cotton_value) ? 0 : total_weft_cotton_value;
                        var total_weft_thired = isNaN(total_weft_thired_value) ? 0 : total_weft_thired_value;
                        var total_weft_fourth = isNaN(total_weft_fourth_value) ? 0 : total_weft_fourth_value;

                        total_weft_fiber_content = total_weft_polyester + total_weft_cotton + total_weft_thired + total_weft_fourth;

                        if (total_weft_fiber_content != 100)
                        {
                            info_alert("Make sure Fiber Weft all value result exactly 100");
                            return false;
                        }
                    }

                }

                else if (fiber_content_selected_for_number == 3) 
                {
                    if ( (document.getElementById("fiber_total_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_total_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_total_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_total_fourth_tol_value1").value != "") )
                    {
                        var total_fiber_content = 0;
                        var total_polyester_value = parseInt(document.getElementById("fiber_total_polyester_tol_value1").value);
                        var total_cotton_value = parseInt(document.getElementById("fiber_total_cotton_tol_value1").value);
                        var total_thired_value = parseInt(document.getElementById("fiber_total_thired_tol_value1").value);
                        var total_fourth_value = parseInt(document.getElementById("fiber_total_fourth_tol_value1").value);

                        var total_polyester = isNaN(total_polyester_value) ? 0 : total_polyester_value;
                        var total_cotton = isNaN(total_cotton_value) ? 0 : total_cotton_value;
                        var total_thired = isNaN(total_thired_value) ? 0 : total_thired_value;
                        var total_fourth = isNaN(total_fourth_value) ? 0 : total_fourth_value;

                        total_fiber_content = total_polyester + total_cotton + total_thired + total_fourth;

                        if (total_fiber_content != 100)
                        {
                            info_alert("Make sure Fiber Total value result exactly 100");
                            return false;
                        }
                    }


                    if ( (document.getElementById("fiber_warp_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_warp_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_warp_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_warp_fourth_tol_value1").value != "") )
                    {
                        var total_warp_fiber_content = 0;
                        var total_warp_polyester_value = parseInt(document.getElementById("fiber_warp_polyester_tol_value1").value);
                        var total_warp_cotton_value = parseInt(document.getElementById("fiber_warp_cotton_tol_value1").value);
                        var total_warp_thired_value = parseInt(document.getElementById("fiber_warp_thired_tol_value1").value);
                        var total_warp_fourth_value = parseInt(document.getElementById("fiber_warp_fourth_tol_value1").value);

                        var total_warp_polyester = isNaN(total_warp_polyester_value) ? 0 : total_warp_polyester_value;
                        var total_warp_cotton = isNaN(total_warp_cotton_value) ? 0 : total_warp_cotton_value;
                        var total_warp_thired = isNaN(total_warp_thired_value) ? 0 : total_warp_thired_value;
                        var total_warp_fourth = isNaN(total_warp_fourth_value) ? 0 : total_warp_fourth_value;

                        total_warp_fiber_content = total_warp_polyester + total_warp_cotton + total_warp_thired + total_warp_fourth;

                        if (total_warp_fiber_content != 100)
                        {
                            info_alert("Make sure Fiber Wrap all value result exactly 100");
                            return false;
                        }
                    }


                    if ( (document.getElementById("fiber_weft_polyester_tol_value1").value != "") || 
                    (document.getElementById("fiber_weft_cotton_tol_value1").value != "") || 
                    (document.getElementById("fiber_weft_thired_tol_value1").value != "") ||
                    (document.getElementById("fiber_weft_fourth_tol_value1").value != "") )
                    {
                        var total_weft_fiber_content = 0;

                        var total_weft_polyester_value = parseInt(document.getElementById("fiber_weft_polyester_tol_value1").value);
                        var total_weft_cotton_value = parseInt(document.getElementById("fiber_weft_cotton_tol_value1").value);
                        var total_weft_thired_value = parseInt(document.getElementById("fiber_weft_thired_tol_value1").value);
                        var total_weft_fourth_value = parseInt(document.getElementById("fiber_weft_fourth_tol_value1").value);

                        var total_weft_polyester = isNaN(total_weft_polyester_value) ? 0 : total_weft_polyester_value;
                        var total_weft_cotton = isNaN(total_weft_cotton_value) ? 0 : total_weft_cotton_value;
                        var total_weft_thired = isNaN(total_weft_thired_value) ? 0 : total_weft_thired_value;
                        var total_weft_fourth = isNaN(total_weft_fourth_value) ? 0 : total_weft_fourth_value;

                        total_weft_fiber_content = total_weft_polyester + total_weft_cotton + total_weft_thired + total_weft_fourth;

                        if (total_weft_fiber_content != 100)
                        {
                            info_alert("Make sure Fiber Weft all value result exactly 100");
                            return false;
                        }

                    }
                }

                else
                {
                    info_alert("Something Wrong");
                    return false;
                }
            }
        }
    }

    else
    {
        info_alert("Please Select Fiber Content");
        return false;
    }
}