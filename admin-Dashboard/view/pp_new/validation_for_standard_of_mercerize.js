
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

function absorbency_condition() 
{
    if (document.getElementById("absorbency_cond1").value == 1) 
    {
    document.getElementById("absorbency_cond2").value = 1;
    }
    else
    {
    document.getElementById("absorbency_cond2").value = 2;
    }
}


function sizing_condition() 
{
    if (document.getElementById("sizing_cond1").value == 1) 
    {
    document.getElementById("sizing_cond2").value = 1;
    }
    else
    {
    document.getElementById("sizing_cond2").value = 2;
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

function Form_Validation_For_Mercetize()
{

    // //start whiteness
    // if(document.getElementById("whiteness_cond1").value == "")
    // {
    //     missing_alert("whiteness_cond1");
    //     return false;
    // }
    // if(document.getElementById("whiteness_value1").value == "")
    // {
    //     missing_alert("whiteness_value1");
    //     return false;
    // }
    // if(isNaN(document.getElementById("whiteness_value1").value))
    // {
    //     number_alert("whiteness_value1");
    //     return false;
    // }
    // if(document.getElementById("whiteness_value2").value == "")
    // {
    //     missing_alert("whiteness_value2");
    //     return false;
    // }
    // if(isNaN(document.getElementById("whiteness_value2").value))
    // {
    //     number_alert("whiteness_value2");
    //     return false;
    // }
    // if(document.getElementById("whiteness_cond1").value == 1 && (parseFloat(document.getElementById("whiteness_value2").value)) <= (parseFloat(document.getElementById("whiteness_value1").value)))
    // {
    //     warning_alert("Should be Bigger", "whiteness_value2");
    //     return false;
    // }
    // if(document.getElementById("whiteness_cond1").value == 2 && (parseFloat(document.getElementById("whiteness_value2").value)) < (parseFloat(document.getElementById("whiteness_value1").value)))
    // {
    //     warning_alert("Should be Bigger or Equal", "whiteness_value2");
    //     return false;
    // }
    // if(document.getElementById("whiteness_cond2").value == "")
    // {
    //     missing_alert("whiteness_cond2");
    //     return false;
    // }

    // //start absorbency
    // if(document.getElementById("absorbency_cond1").value == "")
    // {
    //     missing_alert("absorbency_cond1");
    //     return false;
    // }
    // if(document.getElementById("absorbency_value1").value == "")
    // {
    //     missing_alert("absorbency_value1");
    //     return false;
    // }
    // if(isNaN(document.getElementById("absorbency_value1").value))
    // {
    //     number_alert("absorbency_value1");
    //     return false;
    // }
    // if(document.getElementById("absorbency_value2").value == "")
    // {
    //     missing_alert("absorbency_value2");
    //     return false;
    // }
    // if(isNaN(document.getElementById("absorbency_value2").value))
    // {
    //     number_alert("absorbency_value2");
    //     return false;
    // }
    // if(document.getElementById("absorbency_cond1").value == 1 && (parseFloat(document.getElementById("absorbency_value2").value)) <= (parseFloat(document.getElementById("absorbency_value1").value)))
    // {
    //     warning_alert("Should be Bigger", "absorbency_value2");
    //     return false;
    // }
    // if(document.getElementById("absorbency_cond1").value == 2 && (parseFloat(document.getElementById("absorbency_value2").value)) < (parseFloat(document.getElementById("absorbency_value1").value)))
    // {
    //     warning_alert("Should be Bigger or Equal", "absorbency_value2");
    //     return false;
    // }
    // if(document.getElementById("absorbency_cond2").value == "")
    // {
    //     missing_alert("absorbency_cond2");
    //     return false;
    // }


    // //start sizing
    // if(document.getElementById("sizing_cond1").value == "")
    // {
    //     missing_alert("sizing_cond1");
    //     return false;
    // }
    // if(document.getElementById("sizing_value1").value == "")
    // {
    //     missing_alert("sizing_value1");
    //     return false;
    // }
    // if(isNaN(document.getElementById("sizing_value1").value))
    // {
    //     number_alert("sizing_value1");
    //     return false;
    // }
    // if(document.getElementById("sizing_value2").value == "")
    // {
    //     missing_alert("sizing_value2");
    //     return false;
    // }
    // if(isNaN(document.getElementById("sizing_value2").value))
    // {
    //     number_alert("sizing_value2");
    //     return false;
    // }
    // if(document.getElementById("sizing_cond1").value == 1 && (parseFloat(document.getElementById("sizing_value2").value)) <= (parseFloat(document.getElementById("sizing_value1").value)))
    // {
    //     warning_alert("Should be Bigger", "sizing_value2");
    //     return false;
    // }
    // if(document.getElementById("sizing_cond1").value == 2 && (parseFloat(document.getElementById("sizing_value2").value)) < (parseFloat(document.getElementById("sizing_value1").value)))
    // {
    //     warning_alert("Should be Bigger or Equal", "sizing_value2");
    //     return false;
    // }
    // if(document.getElementById("sizing_cond2").value == "")
    // {
    //     missing_alert("sizing_cond2");
    //     return false;
    // }



    // //start ph
    // if(document.getElementById("ph_cond1").value == "")
    // {
    //     missing_alert("ph_cond1");
    //     return false;
    // }
    // if(document.getElementById("ph_value1").value == "")
    // {
    //     missing_alert("ph_value1");
    //     return false;
    // }
    // if(isNaN(document.getElementById("ph_value1").value))
    // {
    //     number_alert("ph_value1");
    //     return false;
    // }
    // if(document.getElementById("ph_value2").value == "")
    // {
    //     missing_alert("ph_value2");
    //     return false;
    // }
    // if(isNaN(document.getElementById("ph_value2").value))
    // {
    //     number_alert("ph_value2");
    //     return false;
    // }
    // if(document.getElementById("ph_cond1").value == 1 && (parseFloat(document.getElementById("ph_value2").value)) <= (parseFloat(document.getElementById("ph_value1").value)))
    // {
    //     warning_alert("Should be Bigger", "ph_value2");
    //     return false;
    // }
    // if(document.getElementById("ph_cond1").value == 2 && (parseFloat(document.getElementById("ph_value2").value)) < (parseFloat(document.getElementById("ph_value1").value)))
    // {
    //     warning_alert("Should be Bigger or Equal", "ph_value2");
    //     return false;
    // }
    // if(document.getElementById("ph_cond2").value == "")
    // {
    //     missing_alert("ph_cond2");
    //     return false;
    // }
}