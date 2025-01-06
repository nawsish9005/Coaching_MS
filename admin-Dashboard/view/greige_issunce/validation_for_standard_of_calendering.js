

function Form_Validation_For_Calendering()
{
    if(isNaN(document.getElementById("cf_rubbing_dry_value1").value))
    {
        number_alert("cf_rubbing_dry_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_rubbing_dry_value2").value))
    {
        number_alert("cf_rubbing_dry_value2");
        return false;
    }
    if(document.getElementById("cf_rubbing_dry_cond1").value == 1 && (parseFloat(document.getElementById("cf_rubbing_dry_value2").value)) <= (parseFloat(document.getElementById("cf_rubbing_dry_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_rubbing_dry_value2");
        return false;
    }
    if(document.getElementById("cf_rubbing_dry_cond1").value == 2 && (parseFloat(document.getElementById("cf_rubbing_dry_value2").value)) < (parseFloat(document.getElementById("cf_rubbing_dry_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_rubbing_dry_value2");
        return false;
    }


    //start Color Fastness to Rubbing Wet
    if(isNaN(document.getElementById("cf_rubbing_wet_value1").value))
    {
        number_alert("cf_rubbing_wet_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_rubbing_wet_value2").value))
    {
        number_alert("cf_rubbing_wet_value2");
        return false;
    }
    if(document.getElementById("cf_rubbing_wet_cond1").value == 1 && (parseFloat(document.getElementById("cf_rubbing_wet_value2").value)) <= (parseFloat(document.getElementById("cf_rubbing_wet_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_rubbing_wet_value2");
        return false;
    }
    if(document.getElementById("cf_rubbing_wet_cond1").value == 2 && (parseFloat(document.getElementById("cf_rubbing_wet_value2").value)) < (parseFloat(document.getElementById("cf_rubbing_wet_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_rubbing_wet_value2");
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


    //start Dimensional Change to Dry Cleaning Warp
    if(isNaN(document.getElementById("dry_cleaning_warp_value1").value))
    {
        number_alert("dry_cleaning_warp_value1");
        return false;
    }
    if(isNaN(document.getElementById("dry_cleaning_warp_value2").value))
    {
        number_alert("dry_cleaning_warp_value2");
        return false;
    }
    if(document.getElementById("dry_cleaning_warp_cond1").value == 1 && (parseFloat(document.getElementById("dry_cleaning_warp_value2").value)) <= (parseFloat(document.getElementById("dry_cleaning_warp_value1").value)))
    {
        warning_alert("Should be Bigger", "dry_cleaning_warp_value2");
        return false;
    }
    if(document.getElementById("dry_cleaning_warp_cond1").value == 2 && (parseFloat(document.getElementById("dry_cleaning_warp_value2").value)) < (parseFloat(document.getElementById("dry_cleaning_warp_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "dry_cleaning_warp_value2");
        return false;
    }


    //start Dimensional Change to Dry Cleaning Weft
    if(isNaN(document.getElementById("dry_cleaning_weft_value1").value))
    {
        number_alert("dry_cleaning_weft_value1");
        return false;
    }
    if(isNaN(document.getElementById("dry_cleaning_weft_value2").value))
    {
        number_alert("dry_cleaning_weft_value2");
        return false;
    }
    if(document.getElementById("dry_cleaning_weft_cond1").value == 1 && (parseFloat(document.getElementById("dry_cleaning_weft_value2").value)) <= (parseFloat(document.getElementById("dry_cleaning_weft_value1").value)))
    {
        warning_alert("Should be Bigger", "dry_cleaning_weft_value2");
        return false;
    }
    if(document.getElementById("dry_cleaning_weft_cond1").value == 2 && (parseFloat(document.getElementById("dry_cleaning_weft_value2").value)) < (parseFloat(document.getElementById("dry_cleaning_weft_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "dry_cleaning_weft_value2");
        return false;
    }


    //start Yarn Count for Warp
    if(document.getElementById("yarn_count_warp_cond1").value == "")
    {
        missing_alert("yarn_count_warp_cond1");
        return false;
    }
    if(document.getElementById("yarn_count_warp_value1").value == "")
    {
        missing_alert("yarn_count_warp_value1");
        return false;
    }
    if(isNaN(document.getElementById("yarn_count_warp_value1").value))
    {
        number_alert("yarn_count_warp_value1");
        return false;
    }
    if(document.getElementById("yarn_count_warp_value2").value == "")
    {
        missing_alert("yarn_count_warp_value2");
        return false;
    }
    if(isNaN(document.getElementById("yarn_count_warp_value2").value))
    {
        number_alert("yarn_count_warp_value2");
        return false;
    }
    if(document.getElementById("yarn_count_warp_cond1").value == 1 && (parseFloat(document.getElementById("yarn_count_warp_value2").value)) <= (parseFloat(document.getElementById("yarn_count_warp_value1").value)))
    {
        warning_alert("Should be Bigger", "yarn_count_warp_value2");
        return false;
    }
    if(document.getElementById("yarn_count_warp_cond1").value == 2 && (parseFloat(document.getElementById("yarn_count_warp_value2").value)) < (parseFloat(document.getElementById("yarn_count_warp_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "yarn_count_warp_value2");
        return false;
    }
    if(document.getElementById("yarn_count_warp_cond2").value == "")
    {
        missing_alert("yarn_count_warp_cond2");
        return false;
    }


    //start Yarn Count for Weft
    if(document.getElementById("yarn_count_weft_cond1").value == "")
    {
        missing_alert("yarn_count_weft_cond1");
        return false;
    }
    if(document.getElementById("yarn_count_weft_value1").value == "")
    {
        missing_alert("yarn_count_weft_value1");
        return false;
    }
    if(isNaN(document.getElementById("yarn_count_weft_value1").value))
    {
        number_alert("yarn_count_weft_value1");
        return false;
    }
    if(document.getElementById("yarn_count_weft_value2").value == "")
    {
        missing_alert("yarn_count_weft_value2");
        return false;
    }
    if(isNaN(document.getElementById("yarn_count_weft_value2").value))
    {
        number_alert("yarn_count_weft_value2");
        return false;
    }
    if(document.getElementById("yarn_count_weft_cond1").value == 1 && (parseFloat(document.getElementById("yarn_count_weft_value2").value)) <= (parseFloat(document.getElementById("yarn_count_weft_value1").value)))
    {
        warning_alert("Should be Bigger", "yarn_count_weft_value2");
        return false;
    }
    if(document.getElementById("yarn_count_weft_cond1").value == 2 && (parseFloat(document.getElementById("yarn_count_weft_value2").value)) < (parseFloat(document.getElementById("yarn_count_weft_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "yarn_count_weft_value2");
        return false;
    }
    if(document.getElementById("yarn_count_weft_cond2").value == "")
    {
        missing_alert("yarn_count_weft_cond2");
        return false;
    }


    //start Number of Threads Warp
    if(document.getElementById("number_thread_warp_cond1").value == "")
    {
        missing_alert("number_thread_warp_cond1");
        return false;
    }
    if(document.getElementById("number_thread_warp_value1").value == "")
    {
        missing_alert("number_thread_warp_value1");
        return false;
    }
    if(isNaN(document.getElementById("number_thread_warp_value1").value))
    {
        number_alert("number_thread_warp_value1");
        return false;
    }
    if(document.getElementById("number_thread_warp_value2").value == "")
    {
        missing_alert("number_thread_warp_value2");
        return false;
    }
    if(isNaN(document.getElementById("number_thread_warp_value2").value))
    {
        number_alert("number_thread_warp_value2");
        return false;
    }
    if(document.getElementById("number_thread_warp_cond1").value == 1 && (parseFloat(document.getElementById("number_thread_warp_value2").value)) <= (parseFloat(document.getElementById("number_thread_warp_value1").value)))
    {
        warning_alert("Should be Bigger", "number_thread_warp_value2");
        return false;
    }
    if(document.getElementById("number_thread_warp_cond1").value == 2 && (parseFloat(document.getElementById("number_thread_warp_value2").value)) < (parseFloat(document.getElementById("number_thread_warp_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "number_thread_warp_value2");
        return false;
    }
    if(document.getElementById("number_thread_warp_cond2").value == "")
    {
        missing_alert("number_thread_warp_cond2");
        return false;
    }


    //start Number of Threads weft
    if(document.getElementById("number_thread_weft_cond1").value == "")
    {
        missing_alert("number_thread_weft_cond1");
        return false;
    }
    if(document.getElementById("number_thread_weft_value1").value == "")
    {
        missing_alert("number_thread_weft_value1");
        return false;
    }
    if(isNaN(document.getElementById("number_thread_weft_value1").value))
    {
        number_alert("number_thread_weft_value1");
        return false;
    }
    if(document.getElementById("number_thread_weft_value2").value == "")
    {
        missing_alert("number_thread_weft_value2");
        return false;
    }
    if(isNaN(document.getElementById("number_thread_weft_value2").value))
    {
        number_alert("number_thread_weft_value2");
        return false;
    }
    if(document.getElementById("number_thread_weft_cond1").value == 1 && (parseFloat(document.getElementById("number_thread_weft_value2").value)) <= (parseFloat(document.getElementById("number_thread_weft_value1").value)))
    {
        warning_alert("Should be Bigger", "number_thread_weft_value2");
        return false;
    }
    if(document.getElementById("number_thread_weft_cond1").value == 2 && (parseFloat(document.getElementById("number_thread_weft_value2").value)) < (parseFloat(document.getElementById("number_thread_weft_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "number_thread_weft_value2");
        return false;
    }
    if(document.getElementById("number_thread_weft_cond2").value == "")
    {
        missing_alert("number_thread_weft_cond2");
        return false;
    }


    //start Number of Threads weft
    if(document.getElementById("number_thread_weft_cond1").value == "")
    {
        missing_alert("number_thread_weft_cond1");
        return false;
    }
    if(document.getElementById("number_thread_weft_value1").value == "")
    {
        missing_alert("number_thread_weft_value1");
        return false;
    }
    if(isNaN(document.getElementById("number_thread_weft_value1").value))
    {
        number_alert("number_thread_weft_value1");
        return false;
    }
    if(document.getElementById("number_thread_weft_value2").value == "")
    {
        missing_alert("number_thread_weft_value2");
        return false;
    }
    if(isNaN(document.getElementById("number_thread_weft_value2").value))
    {
        number_alert("number_thread_weft_value2");
        return false;
    }
    if(document.getElementById("number_thread_weft_cond1").value == 1 && (parseFloat(document.getElementById("number_thread_weft_value2").value)) <= (parseFloat(document.getElementById("number_thread_weft_value1").value)))
    {
        warning_alert("Should be Bigger", "number_thread_weft_value2");
        return false;
    }
    if(document.getElementById("number_thread_weft_cond1").value == 2 && (parseFloat(document.getElementById("number_thread_weft_value2").value)) < (parseFloat(document.getElementById("number_thread_weft_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "number_thread_weft_value2");
        return false;
    }
    if(document.getElementById("number_thread_weft_cond2").value == "")
    {
        missing_alert("number_thread_weft_cond2");
        return false;
    }


    //start Mass per Unit per Area
    if(document.getElementById("mass_per_unit_per_area_cond1").value == "")
    {
        missing_alert("mass_per_unit_per_area_cond1");
        return false;
    }
    if(document.getElementById("mass_per_unit_per_area_value1").value == "")
    {
        missing_alert("mass_per_unit_per_area_value1");
        return false;
    }
    if(isNaN(document.getElementById("mass_per_unit_per_area_value1").value))
    {
        number_alert("mass_per_unit_per_area_value1");
        return false;
    }
    if(document.getElementById("mass_per_unit_per_area_value2").value == "")
    {
        missing_alert("mass_per_unit_per_area_value2");
        return false;
    }
    if(isNaN(document.getElementById("mass_per_unit_per_area_value2").value))
    {
        number_alert("mass_per_unit_per_area_value2");
        return false;
    }
    if(document.getElementById("mass_per_unit_per_area_cond1").value == 1 && (parseFloat(document.getElementById("mass_per_unit_per_area_value2").value)) <= (parseFloat(document.getElementById("mass_per_unit_per_area_value1").value)))
    {
        warning_alert("Should be Bigger", "mass_per_unit_per_area_value2");
        return false;
    }
    if(document.getElementById("mass_per_unit_per_area_cond1").value == 2 && (parseFloat(document.getElementById("mass_per_unit_per_area_value2").value)) < (parseFloat(document.getElementById("mass_per_unit_per_area_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "mass_per_unit_per_area_value2");
        return false;
    }
    if(document.getElementById("mass_per_unit_per_area_cond2").value == "")
    {
        missing_alert("mass_per_unit_per_area_cond2");
        return false;
    }


    //start Surface Fuzzing & to Pilling
    if(isNaN(document.getElementById("surface_pilling_value1").value))
    {
        number_alert("surface_pilling_value1");
        return false;
    }
    if(isNaN(document.getElementById("surface_pilling_value2").value))
    {
        number_alert("surface_pilling_value2");
        return false;
    }
    if(document.getElementById("surface_pilling_cond1").value == 1 && (parseFloat(document.getElementById("surface_pilling_value2").value)) <= (parseFloat(document.getElementById("surface_pilling_value1").value)))
    {
        warning_alert("Should be Bigger", "surface_pilling_value2");
        return false;
    }
    if(document.getElementById("surface_pilling_cond1").value == 2 && (parseFloat(document.getElementById("surface_pilling_value2").value)) < (parseFloat(document.getElementById("surface_pilling_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "surface_pilling_value2");
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


    //start Seam Strength Warp
    if(isNaN(document.getElementById("seam_strength_warp_value1").value))
    {
        number_alert("seam_strength_warp_value1");
        return false;
    }
    if(isNaN(document.getElementById("seam_strength_warp_value2").value))
    {
        number_alert("seam_strength_warp_value2");
        return false;
    }
    if(document.getElementById("seam_strength_warp_cond1").value == 1 && (parseFloat(document.getElementById("seam_strength_warp_value2").value)) <= (parseFloat(document.getElementById("seam_strength_warp_value1").value)))
    {
        warning_alert("Should be Bigger", "seam_strength_warp_value2");
        return false;
    }
    if(document.getElementById("seam_strength_warp_cond1").value == 2 && (parseFloat(document.getElementById("seam_strength_warp_value2").value)) < (parseFloat(document.getElementById("seam_strength_warp_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "seam_strength_warp_value2");
        return false;
    }


    //start Seam Strength Weft
    if(isNaN(document.getElementById("seam_strength_weft_value1").value))
    {
        number_alert("seam_strength_weft_value1");
        return false;
    }
    if(isNaN(document.getElementById("seam_strength_weft_value2").value))
    {
        number_alert("seam_strength_weft_value2");
        return false;
    }
    if(document.getElementById("seam_strength_weft_cond1").value == 1 && (parseFloat(document.getElementById("seam_strength_weft_value2").value)) <= (parseFloat(document.getElementById("seam_strength_weft_value1").value)))
    {
        warning_alert("Should be Bigger", "seam_strength_weft_value2");
        return false;
    }
    if(document.getElementById("seam_strength_weft_cond1").value == 2 && (parseFloat(document.getElementById("seam_strength_weft_value2").value)) < (parseFloat(document.getElementById("seam_strength_weft_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "seam_strength_weft_value2");
        return false;
    }


}