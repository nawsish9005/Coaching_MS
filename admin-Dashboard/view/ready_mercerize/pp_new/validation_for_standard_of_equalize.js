
function whiteness_condition() 
{
    if (document.getElementById("whiteness_cond1").value == 1) 
    {
    document.getElementById("whiteness_cond2").value = 1;
    }
    else
    {
    document.getElementById("whiteness_cond2").value = 2;
    }
}

function bowing_and_skew_condition() 
{
    if (document.getElementById("bowing_and_skew_cond1").value == 1) 
    {
    document.getElementById("bowing_and_skew_cond2").value = 1;
    }
    else
    {
    document.getElementById("bowing_and_skew_cond2").value = 2;
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

function Form_Validation_For_Equalize()
{

    //start whiteness
    if(document.getElementById("whiteness_cond1").value == "")
    {
        missing_alert("whiteness_cond1");
        return false;
    }
    if(document.getElementById("whiteness_value1").value == "")
    {
        missing_alert("whiteness_value1");
        return false;
    }
    if(isNaN(document.getElementById("whiteness_value1").value))
    {
        number_alert("whiteness_value1");
        return false;
    }
    if(document.getElementById("whiteness_value2").value == "")
    {
        missing_alert("whiteness_value2");
        return false;
    }
    if(isNaN(document.getElementById("whiteness_value2").value))
    {
        number_alert("whiteness_value2");
        return false;
    }
    if(document.getElementById("whiteness_cond1").value == 1 && (parseFloat(document.getElementById("whiteness_value2").value)) <= (parseFloat(document.getElementById("whiteness_value1").value)))
    {
        warning_alert("Should be Bigger", "whiteness_value2");
        return false;
    }
    if(document.getElementById("whiteness_cond1").value == 2 && (parseFloat(document.getElementById("whiteness_value2").value)) < (parseFloat(document.getElementById("whiteness_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "whiteness_value2");
        return false;
    }
    if(document.getElementById("whiteness_cond2").value == "")
    {
        missing_alert("whiteness_cond2");
        return false;
    }

    //start bowing_and_skew
    if(document.getElementById("bowing_and_skew_cond1").value == "")
    {
        missing_alert("bowing_and_skew_cond1");
        return false;
    }
    if(document.getElementById("bowing_and_skew_value1").value == "")
    {
        missing_alert("bowing_and_skew_value1");
        return false;
    }
    if(isNaN(document.getElementById("bowing_and_skew_value1").value))
    {
        number_alert("bowing_and_skew_value1");
        return false;
    }
    if(document.getElementById("bowing_and_skew_value2").value == "")
    {
        missing_alert("bowing_and_skew_value2");
        return false;
    }
    if(isNaN(document.getElementById("bowing_and_skew_value2").value))
    {
        number_alert("bowing_and_skew_value2");
        return false;
    }
    if(document.getElementById("bowing_and_skew_cond1").value == 1 && (parseFloat(document.getElementById("bowing_and_skew_value2").value)) <= (parseFloat(document.getElementById("bowing_and_skew_value1").value)))
    {
        warning_alert("Should be Bigger", "bowing_and_skew_value2");
        return false;
    }
    if(document.getElementById("bowing_and_skew_cond1").value == 2 && (parseFloat(document.getElementById("bowing_and_skew_value2").value)) < (parseFloat(document.getElementById("bowing_and_skew_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "bowing_and_skew_value2");
        return false;
    }
    if(document.getElementById("bowing_and_skew_cond2").value == "")
    {
        missing_alert("bowing_and_skew_cond2");
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