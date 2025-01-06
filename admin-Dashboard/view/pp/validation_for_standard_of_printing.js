
function rubbing_condition() 
{
    if (document.getElementById("rubbing_cond1").value == 1) 
    {
    document.getElementById("rubbing_cond2").value = 1;
    }
    else
    {
    document.getElementById("rubbing_cond2").value = 2;
    }
}

function Form_Validation_For_Printing()
{

    //start rubbing
    if(document.getElementById("rubbing_cond1").value == "")
    {
        missing_alert("rubbing_cond1");
        return false;
    }
    if(document.getElementById("rubbing_value1").value == "")
    {
        missing_alert("rubbing_value1");
        return false;
    }
    if(isNaN(document.getElementById("rubbing_value1").value))
    {
        number_alert("rubbing_value1");
        return false;
    }
    if(document.getElementById("rubbing_value2").value == "")
    {
        missing_alert("rubbing_value2");
        return false;
    }
    if(isNaN(document.getElementById("rubbing_value2").value))
    {
        number_alert("rubbing_value2");
        return false;
    }
    if(document.getElementById("rubbing_cond1").value == 1 && (parseFloat(document.getElementById("rubbing_value2").value)) <= (parseFloat(document.getElementById("rubbing_value1").value)))
    {
        warning_alert("Should be Bigger", "rubbing_value2");
        return false;
    }
    if(document.getElementById("rubbing_cond1").value == 2 && (parseFloat(document.getElementById("rubbing_value2").value)) < (parseFloat(document.getElementById("rubbing_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "rubbing_value2");
        return false;
    }
    if(document.getElementById("rubbing_cond2").value == "")
    {
        missing_alert("rubbing_cond2");
        return false;
    }
}