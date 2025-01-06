
function rubbing_dry_condition() 
{
    if (document.getElementById("rubbing_dry_cond1").value == 1) 
    {
    document.getElementById("rubbing_dry_cond2").value = 1;
    }
    else
    {
    document.getElementById("rubbing_dry_cond2").value = 2;
    }
}

function rubbing_wet_condition() 
{
    if (document.getElementById("rubbing_wet_cond1").value == 1) 
    {
    document.getElementById("rubbing_wet_cond2").value = 1;
    }
    else
    {
    document.getElementById("rubbing_wet_cond2").value = 2;
    }
}


function time_condition() 
{
    if (document.getElementById("time_cond1").value == 1) 
    {
    document.getElementById("time_cond2").value = 1;
    }
    else
    {
    document.getElementById("time_cond2").value = 2;
    }
}

function temp_condition() 
{
    if (document.getElementById("temp_cond1").value == 1) 
    {
    document.getElementById("temp_cond2").value = 1;
    }
    else
    {
    document.getElementById("temp_cond2").value = 2;
    }
}

function pilling_condition() 
{
    if (document.getElementById("pilling_cond1").value == 1) 
    {
    document.getElementById("pilling_cond2").value = 1;
    }
    else
    {
    document.getElementById("pilling_cond2").value = 2;
    }
}


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





function Form_Validation_For_Curing()
{

    //start rubbing dry
    if(isNaN(document.getElementById("rubbing_dry_value1").value))
    {
        number_alert("rubbing_dry_value1");
        return false;
    }
    if(isNaN(document.getElementById("rubbing_dry_value2").value))
    {
        number_alert("rubbing_dry_value2");
        return false;
    }
    if(document.getElementById("rubbing_dry_cond1").value == 1 && (parseFloat(document.getElementById("rubbing_dry_value2").value)) <= (parseFloat(document.getElementById("rubbing_dry_value1").value)))
    {
        warning_alert("Should be Bigger", "rubbing_dry_value2");
        return false;
    }
    if(document.getElementById("rubbing_dry_cond1").value == 2 && (parseFloat(document.getElementById("rubbing_dry_value2").value)) < (parseFloat(document.getElementById("rubbing_dry_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "rubbing_dry_value2");
        return false;
    }

    //start rubbing wet
    if(isNaN(document.getElementById("rubbing_wet_value1").value))
    {
        number_alert("rubbing_wet_value1");
        return false;
    }
    if(isNaN(document.getElementById("rubbing_wet_value2").value))
    {
        number_alert("rubbing_wet_value2");
        return false;
    }
    if(document.getElementById("rubbing_wet_cond1").value == 1 && (parseFloat(document.getElementById("rubbing_wet_value2").value)) <= (parseFloat(document.getElementById("rubbing_wet_value1").value)))
    {
        warning_alert("Should be Bigger", "rubbing_wet_value2");
        return false;
    }
    if(document.getElementById("rubbing_wet_cond1").value == 2 && (parseFloat(document.getElementById("rubbing_wet_value2").value)) < (parseFloat(document.getElementById("rubbing_wet_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "rubbing_wet_value2");
        return false;
    }


    if(isNaN(document.getElementById("yarn_warp_value1").value))
    {
        number_alert("yarn_warp_value1");
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


    //start yarn weft
    if(isNaN(document.getElementById("yarn_weft_value1").value))
    {
        number_alert("yarn_weft_value1");
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

    //start thread epi
    if(isNaN(document.getElementById("thread_epi_value1").value))
    {
        number_alert("thread_epi_value1");
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

    //start thread ppi
    if(isNaN(document.getElementById("thread_ppi_value1").value))
    {
        number_alert("thread_ppi_value1");
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

    //start gsm warp
    if(isNaN(document.getElementById("gsm_warp_value1").value))
    {
        number_alert("gsm_warp_value1");
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


    //start Dimensional Change to Washing & Drying Warp (Befor Iron)
    if(document.getElementById("wash_dry_warp_before_iron_cond1").value == "")
    {
        missing_alert("wash_dry_warp_before_iron_cond1");
        return false;
    }
    if(document.getElementById("wash_dry_warp_before_iron_value1").value == "")
    {
        missing_alert("wash_dry_warp_before_iron_value1");
        return false;
    }
    if(document.getElementById("wash_dry_warp_before_iron_value2").value == "")
    {
        missing_alert("wash_dry_warp_before_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_warp_before_iron_cond2").value == "")
    {
        missing_alert("wash_dry_warp_before_iron_cond2");
        return false;
    }
    if(isNaN(document.getElementById("wash_dry_warp_before_iron_value1").value))
    {
        number_alert("wash_dry_warp_before_iron_value1");
        return false;
    }
    if(isNaN(document.getElementById("wash_dry_warp_before_iron_value2").value))
    {
        number_alert("wash_dry_warp_before_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_warp_before_iron_cond1").value == 1 && (parseFloat(document.getElementById("wash_dry_warp_before_iron_value2").value)) <= (parseFloat(document.getElementById("wash_dry_warp_before_iron_value1").value)))
    {
        warning_alert("Should be Bigger", "wash_dry_warp_before_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_warp_before_iron_cond1").value == 2 && (parseFloat(document.getElementById("wash_dry_warp_before_iron_value2").value)) < (parseFloat(document.getElementById("wash_dry_warp_before_iron_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "wash_dry_warp_before_iron_value2");
        return false;
    }

    //Dimensional Change to Washing & Drying Weft (Befor Iron)
    if(document.getElementById("wash_dry_weft_before_iron_cond1").value == "")
    {
        missing_alert("wash_dry_weft_before_iron_cond1");
        return false;
    }
    if(document.getElementById("wash_dry_weft_before_iron_value1").value == "")
    {
        missing_alert("wash_dry_weft_before_iron_value1");
        return false;
    }
    if(document.getElementById("wash_dry_weft_before_iron_value2").value == "")
    {
        missing_alert("wash_dry_weft_before_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_weft_before_iron_cond2").value == "")
    {
        missing_alert("wash_dry_weft_before_iron_cond2");
        return false;
    }
    if(isNaN(document.getElementById("wash_dry_weft_before_iron_value1").value))
    {
        number_alert("wash_dry_weft_before_iron_value1");
        return false;
    }
    if(isNaN(document.getElementById("wash_dry_weft_before_iron_value2").value))
    {
        number_alert("wash_dry_weft_before_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_weft_before_iron_cond1").value == 1 && (parseFloat(document.getElementById("wash_dry_weft_before_iron_value2").value)) <= (parseFloat(document.getElementById("wash_dry_weft_before_iron_value1").value)))
    {
        warning_alert("Should be Bigger", "wash_dry_weft_before_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_weft_before_iron_cond1").value == 2 && (parseFloat(document.getElementById("wash_dry_weft_before_iron_value2").value)) < (parseFloat(document.getElementById("wash_dry_weft_before_iron_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "wash_dry_weft_before_iron_value2");
        return false;
    }

    //start Dimensional Change to Washing & Drying Warp (After Iron)
    if(document.getElementById("wash_dry_warp_after_iron_cond1").value == "")
    {
        missing_alert("wash_dry_warp_after_iron_cond1");
        return false;
    }
    if(document.getElementById("wash_dry_warp_after_iron_value1").value == "")
    {
        missing_alert("wash_dry_warp_after_iron_value1");
        return false;
    }
    if(document.getElementById("wash_dry_warp_after_iron_value2").value == "")
    {
        missing_alert("wash_dry_warp_after_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_warp_after_iron_cond2").value == "")
    {
        missing_alert("wash_dry_warp_after_iron_cond2");
        return false;
    }
    if(isNaN(document.getElementById("wash_dry_warp_after_iron_value1").value))
    {
        number_alert("wash_dry_warp_after_iron_value1");
        return false;
    }
    if(isNaN(document.getElementById("wash_dry_warp_after_iron_value2").value))
    {
        number_alert("wash_dry_warp_after_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_warp_after_iron_cond1").value == 1 && (parseFloat(document.getElementById("wash_dry_warp_after_iron_value2").value)) <= (parseFloat(document.getElementById("wash_dry_warp_after_iron_value1").value)))
    {
        warning_alert("Should be Bigger", "wash_dry_warp_after_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_warp_after_iron_cond1").value == 2 && (parseFloat(document.getElementById("wash_dry_warp_after_iron_value2").value)) < (parseFloat(document.getElementById("wash_dry_warp_after_iron_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "wash_dry_warp_after_iron_value2");
        return false;
    }


    //start Dimensional Change to Washing & Drying Weft (After Iron)
    if(document.getElementById("wash_dry_weft_after_iron_cond1").value == "")
    {
        missing_alert("wash_dry_weft_after_iron_cond1");
        return false;
    }
    if(document.getElementById("wash_dry_weft_after_iron_value1").value == "")
    {
        missing_alert("wash_dry_weft_after_iron_value1");
        return false;
    }
    if(document.getElementById("wash_dry_weft_after_iron_value2").value == "")
    {
        missing_alert("wash_dry_weft_after_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_weft_after_iron_cond2").value == "")
    {
        missing_alert("wash_dry_weft_after_iron_cond2");
        return false;
    }
    if(isNaN(document.getElementById("wash_dry_weft_after_iron_value1").value))
    {
        number_alert("wash_dry_weft_after_iron_value1");
        return false;
    }
    if(isNaN(document.getElementById("wash_dry_weft_after_iron_value2").value))
    {
        number_alert("wash_dry_weft_after_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_weft_after_iron_cond1").value == 1 && (parseFloat(document.getElementById("wash_dry_weft_after_iron_value2").value)) <= (parseFloat(document.getElementById("wash_dry_weft_after_iron_value1").value)))
    {
        warning_alert("Should be Bigger", "wash_dry_weft_after_iron_value2");
        return false;
    }
    if(document.getElementById("wash_dry_weft_after_iron_cond1").value == 2 && (parseFloat(document.getElementById("wash_dry_weft_after_iron_value2").value)) < (parseFloat(document.getElementById("wash_dry_weft_after_iron_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "wash_dry_weft_after_iron_value2");
        return false;
    }


    //start time
    if(document.getElementById("time_cond1").value == "")
    {
        missing_alert("time_cond1");
        return false;
    }
    if(document.getElementById("time_value1").value == "")
    {
        missing_alert("time_value1");
        return false;
    }
    if(document.getElementById("time_value2").value == "")
    {
        missing_alert("time_value2");
        return false;
    }
    if(document.getElementById("time_cond2").value == "")
    {
        missing_alert("time_cond2");
        return false;
    }
    if(isNaN(document.getElementById("time_value1").value))
    {
        number_alert("time_value1");
        return false;
    }
    if(isNaN(document.getElementById("time_value2").value))
    {
        number_alert("time_value2");
        return false;
    }
    if(document.getElementById("time_cond1").value == 1 && (parseFloat(document.getElementById("time_value2").value)) <= (parseFloat(document.getElementById("time_value1").value)))
    {
        warning_alert("Should be Bigger", "time_value2");
        return false;
    }
    if(document.getElementById("time_cond1").value == 2 && (parseFloat(document.getElementById("time_value2").value)) < (parseFloat(document.getElementById("time_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "time_value2");
        return false;
    }


    //start temp
    if(document.getElementById("temp_cond1").value == "")
    {
        missing_alert("temp_cond1");
        return false;
    }
    if(document.getElementById("temp_value1").value == "")
    {
        missing_alert("temp_value1");
        return false;
    }
    if(document.getElementById("temp_value2").value == "")
    {
        missing_alert("temp_value2");
        return false;
    }
    if(document.getElementById("temp_cond2").value == "")
    {
        missing_alert("temp_cond2");
        return false;
    }
    if(isNaN(document.getElementById("temp_value1").value))
    {
        number_alert("temp_value1");
        return false;
    }
    if(isNaN(document.getElementById("temp_value2").value))
    {
        number_alert("temp_value2");
        return false;
    }
    if(document.getElementById("temp_cond1").value == 1 && (parseFloat(document.getElementById("temp_value2").value)) <= (parseFloat(document.getElementById("temp_value1").value)))
    {
        warning_alert("Should be Bigger", "temp_value2");
        return false;
    }
    if(document.getElementById("temp_cond1").value == 2 && (parseFloat(document.getElementById("temp_value2").value)) < (parseFloat(document.getElementById("temp_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "temp_value2");
        return false;
    }


    //start Tensile Properties Warp
    if(isNaN(document.getElementById("tensile_warp_value1").value))
    {
        number_alert("tensile_warp_value1");
        return false;
    }
    if(isNaN(document.getElementById("tensile_warp_value2").value))
    {
        number_alert("tensile_warp_value2");
        return false;
    }
    if(document.getElementById("tensile_warp_cond1").value == 1 && (parseFloat(document.getElementById("tensile_warp_value2").value)) <= (parseFloat(document.getElementById("tensile_warp_value1").value)))
    {
        warning_alert("Should be Bigger", "tensile_warp_value2");
        return false;
    }
    if(document.getElementById("tensile_warp_cond1").value == 2 && (parseFloat(document.getElementById("tensile_warp_value2").value)) < (parseFloat(document.getElementById("tensile_warp_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "tensile_warp_value2");
        return false;
    }


    //start Tensile Properties weft
    if(isNaN(document.getElementById("tensile_weft_value1").value))
    {
        number_alert("tensile_weft_value1");
        return false;
    }
    if(isNaN(document.getElementById("tensile_weft_value2").value))
    {
        number_alert("tensile_weft_value2");
        return false;
    }
    if(document.getElementById("tensile_weft_cond1").value == 1 && (parseFloat(document.getElementById("tensile_weft_value2").value)) <= (parseFloat(document.getElementById("tensile_weft_value1").value)))
    {
        warning_alert("Should be Bigger", "tensile_weft_value2");
        return false;
    }
    if(document.getElementById("tensile_weft_cond1").value == 2 && (parseFloat(document.getElementById("tensile_weft_value2").value)) < (parseFloat(document.getElementById("tensile_weft_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "tensile_weft_value2");
        return false;
    }


    //start  Tear Force Warp
    if(isNaN(document.getElementById("tear_force_warp_value1").value))
    {
        number_alert("tear_force_warp_value1");
        return false;
    }
    if(isNaN(document.getElementById("tear_force_warp_value2").value))
    {
        number_alert("tear_force_warp_value2");
        return false;
    }
    if(document.getElementById("tear_force_warp_cond1").value == 1 && (parseFloat(document.getElementById("tear_force_warp_value2").value)) <= (parseFloat(document.getElementById("tear_force_warp_value1").value)))
    {
        warning_alert("Should be Bigger", "tear_force_warp_value2");
        return false;
    }
    if(document.getElementById("tear_force_warp_cond1").value == 2 && (parseFloat(document.getElementById("tear_force_warp_value2").value)) < (parseFloat(document.getElementById("tear_force_warp_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "tear_force_warp_value2");
        return false;
    }


    //start Tear Force weft
    if(isNaN(document.getElementById("tear_force_weft_value1").value))
    {
        number_alert("tear_force_weft_value1");
        return false;
    }
    if(isNaN(document.getElementById("tear_force_weft_value2").value))
    {
        number_alert("tear_force_weft_value2");
        return false;
    }
    if(document.getElementById("tear_force_weft_cond1").value == 1 && (parseFloat(document.getElementById("tear_force_weft_value2").value)) <= (parseFloat(document.getElementById("tear_force_weft_value1").value)))
    {
        warning_alert("Should be Bigger", "tear_force_weft_value2");
        return false;
    }
    if(document.getElementById("tear_force_weft_cond1").value == 2 && (parseFloat(document.getElementById("tear_force_weft_value2").value)) < (parseFloat(document.getElementById("tear_force_weft_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "tear_force_weft_value2");
        return false;
    }

    //start pH
    
    if(isNaN(document.getElementById("washing_ph_value1").value))
    {
        number_alert("washing_ph_value1");
        return false;
    }
    if(isNaN(document.getElementById("washing_ph_value2").value))
    {
        number_alert("washing_ph_value2");
        return false;
    }
    if(document.getElementById("washing_ph_cond1").value == 1 && (parseFloat(document.getElementById("washing_ph_value2").value)) <= (parseFloat(document.getElementById("washing_ph_value1").value)))
    {
        warning_alert("Should be Bigger", "washing_ph_value2");
        return false;
    }
    if(document.getElementById("washing_ph_cond1").value == 2 && (parseFloat(document.getElementById("washing_ph_value2").value)) < (parseFloat(document.getElementById("washing_ph_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "washing_ph_value2");
        return false;
    }


    //start pilling
    
    if(isNaN(document.getElementById("pilling_value1").value))
    {
        number_alert("pilling_value1");
        return false;
    }
    if(isNaN(document.getElementById("pilling_value2").value))
    {
        number_alert("pilling_value2");
        return false;
    }
    if(document.getElementById("pilling_cond1").value == 1 && (parseFloat(document.getElementById("pilling_value2").value)) <= (parseFloat(document.getElementById("pilling_value1").value)))
    {
        warning_alert("Should be Bigger", "pilling_value2");
        return false;
    }
    if(document.getElementById("pilling_cond1").value == 2 && (parseFloat(document.getElementById("pilling_value2").value)) < (parseFloat(document.getElementById("pilling_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "pilling_value2");
        return false;
    }


}