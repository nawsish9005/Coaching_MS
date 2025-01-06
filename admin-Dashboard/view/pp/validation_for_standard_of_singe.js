function intensity_condition() 
{
    if (document.getElementById("intensity_cond1").value == 1) 
    {
    document.getElementById("intensity_cond2").value = 1;
    }
    else
    {
    document.getElementById("intensity_cond2").value = 2;
    }
}

function speed_condition() 
{
    if (document.getElementById("speed_cond1").value == 1) 
    {
    document.getElementById("speed_cond2").value = 1;
    }
    else
    {
    document.getElementById("speed_cond2").value = 2;
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

function ph_condition() 
{
    if (document.getElementById("ph_cond1").value == 1) 
    {
    document.getElementById("ph_cond2").value = 1;
    }
    else
    {
    document.getElementById("ph_cond2").value = 2;
    }
}

function Form_Validation_For_Singe()
{

    if(document.getElementById("intensity_cond1").value == "")
    {
        missing_alert("intensity_cond1");
        return false;
    }
    if(document.getElementById("intensity_value1").value == "")
    {
        missing_alert("intensity_value1");
        return false;
    }
    if(isNaN(document.getElementById("intensity_value1").value))
    {
        number_alert("intensity_value1");
        return false;
    }
    if(document.getElementById("intensity_value2").value == "")
    {
        missing_alert("intensity_value2");
        return false;
    }
    if(isNaN(document.getElementById("intensity_value2").value))
    {
        number_alert("intensity_value2");
        return false;
    }
    if(document.getElementById("intensity_cond1").value == 1 && (parseFloat(document.getElementById("intensity_value2").value)) <= (parseFloat(document.getElementById("intensity_value1").value)))
    {
        warning_alert("Should be Bigger", "intensity_value2");
        return false;
    }
    if(document.getElementById("intensity_cond1").value == 2 && (parseFloat(document.getElementById("intensity_value2").value)) < (parseFloat(document.getElementById("intensity_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "intensity_value2");
        return false;
    }
    if(document.getElementById("intensity_cond2").value == "")
    {
        missing_alert("intensity_cond2");
        return false;
    }


    //start speed
    if(document.getElementById("speed_cond1").value == "")
    {
        missing_alert("speed_cond1");
        return false;
    }
    if(document.getElementById("speed_value1").value == "")
    {
        missing_alert("speed_value1");
        return false;
    }
    if(isNaN(document.getElementById("speed_value1").value))
    {
        number_alert("speed_value1");
        return false;
    }
    if(document.getElementById("speed_value2").value == "")
    {
        missing_alert("speed_value2");
        return false;
    }
    if(isNaN(document.getElementById("speed_value2").value))
    {
        number_alert("speed_value2");
        return false;
    }
    if(document.getElementById("speed_cond1").value == 1 && (parseFloat(document.getElementById("speed_value2").value)) <= (parseFloat(document.getElementById("speed_value1").value)))
    {
        warning_alert("Should be Bigger", "speed_value2");
        return false;
    }
    if(document.getElementById("speed_cond1").value == 2 && (parseFloat(document.getElementById("speed_value2").value)) < (parseFloat(document.getElementById("speed_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "speed_value2");
        return false;
    }
    if(document.getElementById("speed_cond2").value == "")
    {
        missing_alert("speed_cond2");
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
    if(isNaN(document.getElementById("temp_value1").value))
    {
        number_alert("temp_value1");
        return false;
    }
    if(document.getElementById("temp_value2").value == "")
    {
        missing_alert("temp_value2");
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
    if(document.getElementById("temp_cond2").value == "")
    {
        missing_alert("temp_cond2");
        return false;
    }

    //start ph
    if(document.getElementById("ph_cond1").value == "")
    {
        missing_alert("ph_cond1");
        return false;
    }
    if(document.getElementById("ph_value1").value == "")
    {
        missing_alert("ph_value1");
        return false;
    }
    if(isNaN(document.getElementById("ph_value1").value))
    {
        number_alert("ph_value1");
        return false;
    }
    if(document.getElementById("ph_value2").value == "")
    {
        missing_alert("ph_value2");
        return false;
    }
    if(isNaN(document.getElementById("ph_value2").value))
    {
        number_alert("ph_value2");
        return false;
    }
    if(document.getElementById("ph_cond1").value == 1 && (parseFloat(document.getElementById("ph_value2").value)) <= (parseFloat(document.getElementById("ph_value1").value)))
    {
        warning_alert("Should be Bigger", "ph_value2");
        return false;
    }
    if(document.getElementById("ph_cond1").value == 2 && (parseFloat(document.getElementById("ph_value2").value)) < (parseFloat(document.getElementById("ph_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "ph_value2");
        return false;
    }
    if(document.getElementById("ph_cond2").value == "")
    {
        missing_alert("ph_cond2");
        return false;
    }
}