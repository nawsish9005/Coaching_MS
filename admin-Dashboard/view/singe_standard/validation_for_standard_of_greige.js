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

function fiber_warp_condition() 
{
    if (document.getElementById("fiber_warp_cond1").value == 1) 
    {
    document.getElementById("fiber_warp_cond2").value = 1;
    }
    else
    {
    document.getElementById("fiber_warp_cond2").value = 2;
    }
}

function fiber_weft_condition() 
{
    if (document.getElementById("fiber_weft_cond1").value == 1) 
    {
    document.getElementById("fiber_weft_cond2").value = 1;
    }
    else
    {
    document.getElementById("fiber_weft_cond2").value = 2;
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

    //start fiber warp
    if(document.getElementById("fiber_warp_cond1").value == "")
    {
        missing_alert("fiber_warp_cond1");
        return false;
    }
    if(document.getElementById("fiber_warp_value1").value == "")
    {
        missing_alert("fiber_warp_value1");
        return false;
    }
    if(isNaN(document.getElementById("fiber_warp_value1").value))
    {
        number_alert("fiber_warp_value1");
        return false;
    }
    if(document.getElementById("fiber_warp_value2").value == "")
    {
        missing_alert("fiber_warp_value2");
        return false;
    }
    if(isNaN(document.getElementById("fiber_warp_value2").value))
    {
        number_alert("fiber_warp_value2");
        return false;
    }
    if(document.getElementById("fiber_warp_cond1").value == 1 && (parseFloat(document.getElementById("fiber_warp_value2").value)) <= (parseFloat(document.getElementById("fiber_warp_value1").value)))
    {
        warning_alert("Should be Bigger", "fiber_warp_value2");
        return false;
    }
    if(document.getElementById("fiber_warp_cond1").value == 2 && (parseFloat(document.getElementById("fiber_warp_value2").value)) < (parseFloat(document.getElementById("fiber_warp_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "fiber_warp_value2");
        return false;
    }
    if(document.getElementById("fiber_warp_cond2").value == "")
    {
        missing_alert("fiber_warp_cond2");
        return false;
    }

    //start fiber weft
    if(document.getElementById("fiber_weft_cond1").value == "")
    {
        missing_alert("fiber_weft_cond1");
        return false;
    }
    if(document.getElementById("fiber_weft_value1").value == "")
    {
        missing_alert("fiber_weft_value1");
        return false;
    }
    if(isNaN(document.getElementById("fiber_weft_value1").value))
    {
        number_alert("fiber_weft_value1");
        return false;
    }
    if(document.getElementById("fiber_weft_value2").value == "")
    {
        missing_alert("fiber_weft_value2");
        return false;
    }
    if(isNaN(document.getElementById("fiber_weft_value2").value))
    {
        number_alert("fiber_weft_value2");
        return false;
    }
    if(document.getElementById("fiber_weft_cond1").value == 1 && (parseFloat(document.getElementById("fiber_weft_value2").value)) <= (parseFloat(document.getElementById("fiber_weft_value1").value)))
    {
        warning_alert("Should be Bigger", "fiber_weft_value2");
        return false;
    }
    if(document.getElementById("fiber_weft_cond1").value == 2 && (parseFloat(document.getElementById("fiber_weft_value2").value)) < (parseFloat(document.getElementById("fiber_weft_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "fiber_weft_value2");
        return false;
    }
    if(document.getElementById("fiber_weft_cond2").value == "")
    {
        missing_alert("fiber_weft_cond2");
        return false;
    }
}