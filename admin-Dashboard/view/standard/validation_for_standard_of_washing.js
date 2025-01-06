

function Form_Validation_For_Washing()
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


    // //start pH
    // if(document.getElementById("washing_ph_cond1").value == "")
    // {
    //     missing_alert("washing_ph_cond1");
    //     return false;
    // }
    // if(document.getElementById("washing_ph_value1").value == "")
    // {
    //     missing_alert("washing_ph_value1");
    //     return false;
    // }
    // if(isNaN(document.getElementById("washing_ph_value1").value))
    // {
    //     number_alert("washing_ph_value1");
    //     return false;
    // }
    // if(document.getElementById("washing_ph_value2").value == "")
    // {
    //     missing_alert("washing_ph_value2");
    //     return false;
    // }
    // if(isNaN(document.getElementById("washing_ph_value2").value))
    // {
    //     number_alert("washing_ph_value2");
    //     return false;
    // }
    // if(document.getElementById("washing_ph_cond1").value == 1 && (parseFloat(document.getElementById("washing_ph_value2").value)) <= (parseFloat(document.getElementById("washing_ph_value1").value)))
    // {
    //     warning_alert("Should be Bigger", "washing_ph_value2");
    //     return false;
    // }
    // if(document.getElementById("washing_ph_cond1").value == 2 && (parseFloat(document.getElementById("washing_ph_value2").value)) < (parseFloat(document.getElementById("washing_ph_value1").value)))
    // {
    //     warning_alert("Should be Bigger or Equal", "washing_ph_value2");
    //     return false;
    // }
    // if(document.getElementById("washing_ph_cond2").value == "")
    // {
    //     missing_alert("washing_ph_cond2");
    //     return false;
    // }


    //start Color Fastness to Dry Cleaning Color Change
    if(isNaN(document.getElementById("cf_dry_cleaning_c_change_value1").value))
    {
        number_alert("cf_dry_cleaning_c_change_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_dry_cleaning_c_change_value2").value))
    {
        number_alert("cf_dry_cleaning_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_dry_cleaning_c_change_cond1").value == 1 && (parseFloat(document.getElementById("cf_dry_cleaning_c_change_value2").value)) <= (parseFloat(document.getElementById("cf_dry_cleaning_c_change_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_dry_cleaning_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_dry_cleaning_c_change_cond1").value == 2 && (parseFloat(document.getElementById("cf_dry_cleaning_c_change_value2").value)) < (parseFloat(document.getElementById("cf_dry_cleaning_c_change_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_dry_cleaning_c_change_value2");
        return false;
    }


    //start Color Fastness to Dry Cleaning Staining
    if(isNaN(document.getElementById("cf_dry_cleaning_staining_value1").value))
    {
        number_alert("cf_dry_cleaning_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_dry_cleaning_staining_value2").value))
    {
        number_alert("cf_dry_cleaning_staining_value2");
        return false;
    }
    if(document.getElementById("cf_dry_cleaning_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_dry_cleaning_staining_value2").value)) <= (parseFloat(document.getElementById("cf_dry_cleaning_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_dry_cleaning_staining_value2");
        return false;
    }
    if(document.getElementById("cf_dry_cleaning_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_dry_cleaning_staining_value2").value)) < (parseFloat(document.getElementById("cf_dry_cleaning_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_dry_cleaning_staining_value2");
        return false;
    }


    //start Color Fastness to Washing Color Change
    if(isNaN(document.getElementById("cf_washing_c_change_value1").value))
    {
        number_alert("cf_washing_c_change_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_washing_c_change_value2").value))
    {
        number_alert("cf_washing_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_washing_c_change_cond1").value == 1 && (parseFloat(document.getElementById("cf_washing_c_change_value2").value)) <= (parseFloat(document.getElementById("cf_washing_c_change_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_washing_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_washing_c_change_cond1").value == 2 && (parseFloat(document.getElementById("cf_washing_c_change_value2").value)) < (parseFloat(document.getElementById("cf_washing_c_change_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_washing_c_change_value2");
        return false;
    }


    //start Color Fastness to Washing Staining
    if(isNaN(document.getElementById("cf_washing_staining_value1").value))
    {
        number_alert("cf_washing_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_washing_staining_value2").value))
    {
        number_alert("cf_washing_staining_value2");
        return false;
    }
    if(document.getElementById("cf_washing_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_washing_staining_value2").value)) <= (parseFloat(document.getElementById("cf_washing_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_washing_staining_value2");
        return false;
    }
    if(document.getElementById("cf_washing_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_washing_staining_value2").value)) < (parseFloat(document.getElementById("cf_washing_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_washing_staining_value2");
        return false;
    }


    //start Color Fastness to Perspiration (Acid) Color Change
    if(isNaN(document.getElementById("cf_perspiration_acis_c_change_value1").value))
    {
        number_alert("cf_perspiration_acis_c_change_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_perspiration_acis_c_change_value2").value))
    {
        number_alert("cf_perspiration_acis_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_perspiration_acis_c_change_cond1").value == 1 && (parseFloat(document.getElementById("cf_perspiration_acis_c_change_value2").value)) <= (parseFloat(document.getElementById("cf_perspiration_acis_c_change_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_perspiration_acis_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_perspiration_acis_c_change_cond1").value == 2 && (parseFloat(document.getElementById("cf_perspiration_acis_c_change_value2").value)) < (parseFloat(document.getElementById("cf_perspiration_acis_c_change_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_perspiration_acis_c_change_value2");
        return false;
    }


    //start Color Fastness to Perspiration (Acid) Staining
    if(isNaN(document.getElementById("cf_perspiration_acis_staining_value1").value))
    {
        number_alert("cf_perspiration_acis_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_perspiration_acis_staining_value2").value))
    {
        number_alert("cf_perspiration_acis_staining_value2");
        return false;
    }
    if(document.getElementById("cf_perspiration_acis_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_perspiration_acis_staining_value2").value)) <= (parseFloat(document.getElementById("cf_perspiration_acis_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_perspiration_acis_staining_value2");
        return false;
    }
    if(document.getElementById("cf_perspiration_acis_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_perspiration_acis_staining_value2").value)) < (parseFloat(document.getElementById("cf_perspiration_acis_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_perspiration_acis_staining_value2");
        return false;
    }


    //start Color Fastness to Perspiration (Alkali) Color Change
    if(isNaN(document.getElementById("cf_perspiration_alkali_c_change_value1").value))
    {
        number_alert("cf_perspiration_alkali_c_change_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_perspiration_alkali_c_change_value2").value))
    {
        number_alert("cf_perspiration_alkali_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_perspiration_alkali_c_change_cond1").value == 1 && (parseFloat(document.getElementById("cf_perspiration_alkali_c_change_value2").value)) <= (parseFloat(document.getElementById("cf_perspiration_alkali_c_change_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_perspiration_alkali_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_perspiration_alkali_c_change_cond1").value == 2 && (parseFloat(document.getElementById("cf_perspiration_alkali_c_change_value2").value)) < (parseFloat(document.getElementById("cf_perspiration_alkali_c_change_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_perspiration_alkali_c_change_value2");
        return false;
    }


    //start Color Fastness to Perspiration (Alkali) Staining
    if(isNaN(document.getElementById("cf_perspiration_alkali_staining_value1").value))
    {
        number_alert("cf_perspiration_alkali_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_perspiration_alkali_staining_value2").value))
    {
        number_alert("cf_perspiration_alkali_staining_value2");
        return false;
    }
    if(document.getElementById("cf_perspiration_alkali_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_perspiration_alkali_staining_value2").value)) <= (parseFloat(document.getElementById("cf_perspiration_alkali_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_perspiration_alkali_staining_value2");
        return false;
    }
    if(document.getElementById("cf_perspiration_alkali_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_perspiration_alkali_staining_value2").value)) < (parseFloat(document.getElementById("cf_perspiration_alkali_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_perspiration_alkali_staining_value2");
        return false;
    }


    //start Color Fastness to Water Color Change
    if(isNaN(document.getElementById("cf_water_c_change_value1").value))
    {
        number_alert("cf_water_c_change_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_water_c_change_value2").value))
    {
        number_alert("cf_water_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_water_c_change_cond1").value == 1 && (parseFloat(document.getElementById("cf_water_c_change_value2").value)) <= (parseFloat(document.getElementById("cf_water_c_change_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_water_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_water_c_change_cond1").value == 2 && (parseFloat(document.getElementById("cf_water_c_change_value2").value)) < (parseFloat(document.getElementById("cf_water_c_change_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_water_c_change_value2");
        return false;
    }


    //start Color Fastness to Water Staining
    if(isNaN(document.getElementById("cf_water_staining_value1").value))
    {
        number_alert("cf_water_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_water_staining_value2").value))
    {
        number_alert("cf_water_staining_value2");
        return false;
    }
    if(document.getElementById("cf_water_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_water_staining_value2").value)) <= (parseFloat(document.getElementById("cf_water_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_water_staining_value2");
        return false;
    }
    if(document.getElementById("cf_water_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_water_staining_value2").value)) < (parseFloat(document.getElementById("cf_water_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_water_staining_value2");
        return false;
    }


    //start Color Fastness to Water Sotting Staining
    if(isNaN(document.getElementById("cf_water_sotting_staining_value1").value))
    {
        number_alert("cf_water_sotting_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_water_sotting_staining_value2").value))
    {
        number_alert("cf_water_sotting_staining_value2");
        return false;
    }
    if(document.getElementById("cf_water_sotting_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_water_sotting_staining_value2").value)) <= (parseFloat(document.getElementById("cf_water_sotting_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_water_sotting_staining_value2");
        return false;
    }
    if(document.getElementById("cf_water_sotting_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_water_sotting_staining_value2").value)) < (parseFloat(document.getElementById("cf_water_sotting_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_water_sotting_staining_value2");
        return false;
    }


    //start Color Fastness to Water Wetting Staining
    if(isNaN(document.getElementById("cf_water_wetting_staining_value1").value))
    {
        number_alert("cf_water_wetting_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_water_wetting_staining_value2").value))
    {
        number_alert("cf_water_wetting_staining_value2");
        return false;
    }
    if(document.getElementById("cf_water_wetting_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_water_wetting_staining_value2").value)) <= (parseFloat(document.getElementById("cf_water_wetting_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_water_wetting_staining_value2");
        return false;
    }
    if(document.getElementById("cf_water_wetting_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_water_wetting_staining_value2").value)) < (parseFloat(document.getElementById("cf_water_wetting_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_water_wetting_staining_value2");
        return false;
    }


    //start Color Fastness to Hydrolysis of Reactive Dyes Color Change
    if(isNaN(document.getElementById("cf_hyd_reactive_dyes_c_change_value1").value))
    {
        number_alert("cf_hyd_reactive_dyes_c_change_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_hyd_reactive_dyes_c_change_value2").value))
    {
        number_alert("cf_hyd_reactive_dyes_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_hyd_reactive_dyes_c_change_cond1").value == 1 && (parseFloat(document.getElementById("cf_hyd_reactive_dyes_c_change_value2").value)) <= (parseFloat(document.getElementById("cf_hyd_reactive_dyes_c_change_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_hyd_reactive_dyes_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_hyd_reactive_dyes_c_change_cond1").value == 2 && (parseFloat(document.getElementById("cf_hyd_reactive_dyes_c_change_value2").value)) < (parseFloat(document.getElementById("cf_hyd_reactive_dyes_c_change_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_hyd_reactive_dyes_c_change_value2");
        return false;
    }



    //start Color Fastness to Hydrolysis of Reactive Dyes Staining
    if(isNaN(document.getElementById("cf_hyd_reactive_dyes_staining_value1").value))
    {
        number_alert("cf_hyd_reactive_dyes_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_hyd_reactive_dyes_staining_value2").value))
    {
        number_alert("cf_hyd_reactive_dyes_staining_value2");
        return false;
    }
    if(document.getElementById("cf_hyd_reactive_dyes_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_hyd_reactive_dyes_staining_value2").value)) <= (parseFloat(document.getElementById("cf_hyd_reactive_dyes_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_hyd_reactive_dyes_staining_value2");
        return false;
    }
    if(document.getElementById("cf_hyd_reactive_dyes_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_hyd_reactive_dyes_staining_value2").value)) < (parseFloat(document.getElementById("cf_hyd_reactive_dyes_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_hyd_reactive_dyes_staining_value2");
        return false;
    }


    //start Color Fastness to Oidative Bleach Damage Color Change
    if(isNaN(document.getElementById("cf_oidative_damage_c_change_value1").value))
    {
        number_alert("cf_oidative_damage_c_change_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_oidative_damage_c_change_value2").value))
    {
        number_alert("cf_oidative_damage_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_oidative_damage_c_change_cond1").value == 1 && (parseFloat(document.getElementById("cf_oidative_damage_c_change_value2").value)) <= (parseFloat(document.getElementById("cf_oidative_damage_c_change_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_oidative_damage_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_oidative_damage_c_change_cond1").value == 2 && (parseFloat(document.getElementById("cf_oidative_damage_c_change_value2").value)) < (parseFloat(document.getElementById("cf_oidative_damage_c_change_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_oidative_damage_c_change_value2");
        return false;
    }


    //start Color Fastness to Phenolic Yellowing Staining
    if(isNaN(document.getElementById("cf_phenolic_staining_value1").value))
    {
        number_alert("cf_phenolic_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_phenolic_staining_value2").value))
    {
        number_alert("cf_phenolic_staining_value2");
        return false;
    }
    if(document.getElementById("cf_phenolic_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_phenolic_staining_value2").value)) <= (parseFloat(document.getElementById("cf_phenolic_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_phenolic_staining_value2");
        return false;
    }
    if(document.getElementById("cf_phenolic_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_phenolic_staining_value2").value)) < (parseFloat(document.getElementById("cf_phenolic_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_phenolic_staining_value2");
        return false;
    }


    //start Color Fastness to PVC Migration Staining
    if(isNaN(document.getElementById("cf_pvc_migration_staining_value1").value))
    {
        number_alert("cf_pvc_migration_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_pvc_migration_staining_value2").value))
    {
        number_alert("cf_pvc_migration_staining_value2");
        return false;
    }
    if(document.getElementById("cf_pvc_migration_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_pvc_migration_staining_value2").value)) <= (parseFloat(document.getElementById("cf_pvc_migration_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_pvc_migration_staining_value2");
        return false;
    }
    if(document.getElementById("cf_pvc_migration_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_pvc_migration_staining_value2").value)) < (parseFloat(document.getElementById("cf_pvc_migration_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_pvc_migration_staining_value2");
        return false;
    }


    //start Color Fastness to Saliva Color Change
    if(isNaN(document.getElementById("cf_saliva_c_change_value1").value))
    {
        number_alert("cf_saliva_c_change_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_saliva_c_change_value2").value))
    {
        number_alert("cf_saliva_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_saliva_c_change_cond1").value == 1 && (parseFloat(document.getElementById("cf_saliva_c_change_value2").value)) <= (parseFloat(document.getElementById("cf_saliva_c_change_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_saliva_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_saliva_c_change_cond1").value == 2 && (parseFloat(document.getElementById("cf_saliva_c_change_value2").value)) < (parseFloat(document.getElementById("cf_saliva_c_change_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_saliva_c_change_value2");
        return false;
    }


    //start Color Fastness to Saliva Staining
    if(isNaN(document.getElementById("cf_saliva_staining_value1").value))
    {
        number_alert("cf_saliva_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_saliva_staining_value2").value))
    {
        number_alert("cf_saliva_staining_value2");
        return false;
    }
    if(document.getElementById("cf_saliva_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_saliva_staining_value2").value)) <= (parseFloat(document.getElementById("cf_saliva_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_saliva_staining_value2");
        return false;
    }
    if(document.getElementById("cf_saliva_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_saliva_staining_value2").value)) < (parseFloat(document.getElementById("cf_saliva_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_saliva_staining_value2");
        return false;
    }


    //start Color Fastness to Chlorinated Water Color Change
    if(isNaN(document.getElementById("cf_chlorinated_water_c_change_value1").value))
    {
        number_alert("cf_chlorinated_water_c_change_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_chlorinated_water_c_change_value2").value))
    {
        number_alert("cf_chlorinated_water_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_chlorinated_water_c_change_cond1").value == 1 && (parseFloat(document.getElementById("cf_chlorinated_water_c_change_value2").value)) <= (parseFloat(document.getElementById("cf_chlorinated_water_c_change_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_chlorinated_water_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_chlorinated_water_c_change_cond1").value == 2 && (parseFloat(document.getElementById("cf_chlorinated_water_c_change_value2").value)) < (parseFloat(document.getElementById("cf_chlorinated_water_c_change_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_chlorinated_water_c_change_value2");
        return false;
    }


    //start Color Fastness to Chlorinated Water Staining
    if(isNaN(document.getElementById("cf_chlorinated_water_staining_value1").value))
    {
        number_alert("cf_chlorinated_water_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_chlorinated_water_staining_value2").value))
    {
        number_alert("cf_chlorinated_water_staining_value2");
        return false;
    }
    if(document.getElementById("cf_chlorinated_water_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_chlorinated_water_staining_value2").value)) <= (parseFloat(document.getElementById("cf_chlorinated_water_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_chlorinated_water_staining_value2");
        return false;
    }
    if(document.getElementById("cf_chlorinated_water_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_chlorinated_water_staining_value2").value)) < (parseFloat(document.getElementById("cf_chlorinated_water_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_chlorinated_water_staining_value2");
        return false;
    }


    //start Color Fastness to Cholorine Bleach Color Change
    if(isNaN(document.getElementById("cf_cholorine_bleach_c_change_value1").value))
    {
        number_alert("cf_cholorine_bleach_c_change_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_cholorine_bleach_c_change_value2").value))
    {
        number_alert("cf_cholorine_bleach_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_cholorine_bleach_c_change_cond1").value == 1 && (parseFloat(document.getElementById("cf_cholorine_bleach_c_change_value2").value)) <= (parseFloat(document.getElementById("cf_cholorine_bleach_c_change_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_cholorine_bleach_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_cholorine_bleach_c_change_cond1").value == 2 && (parseFloat(document.getElementById("cf_cholorine_bleach_c_change_value2").value)) < (parseFloat(document.getElementById("cf_cholorine_bleach_c_change_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_cholorine_bleach_c_change_value2");
        return false;
    }


    //start Color Fastness to Cholorine Bleach Staining 
    if(isNaN(document.getElementById("cf_cholorine_bleach_staining_value1").value))
    {
        number_alert("cf_cholorine_bleach_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_cholorine_bleach_staining_value2").value))
    {
        number_alert("cf_cholorine_bleach_staining_value2");
        return false;
    }
    if(document.getElementById("cf_cholorine_bleach_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_cholorine_bleach_staining_value2").value)) <= (parseFloat(document.getElementById("cf_cholorine_bleach_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_cholorine_bleach_staining_value2");
        return false;
    }
    if(document.getElementById("cf_cholorine_bleach_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_cholorine_bleach_staining_value2").value)) < (parseFloat(document.getElementById("cf_cholorine_bleach_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_cholorine_bleach_staining_value2");
        return false;
    }


    //start Color Fastness to Peroxide Bleach Color Change
    if(isNaN(document.getElementById("cf_peroxide_bleach_c_change_value1").value))
    {
        number_alert("cf_peroxide_bleach_c_change_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_peroxide_bleach_c_change_value2").value))
    {
        number_alert("cf_peroxide_bleach_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_peroxide_bleach_c_change_cond1").value == 1 && (parseFloat(document.getElementById("cf_peroxide_bleach_c_change_value2").value)) <= (parseFloat(document.getElementById("cf_peroxide_bleach_c_change_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_peroxide_bleach_c_change_value2");
        return false;
    }
    if(document.getElementById("cf_peroxide_bleach_c_change_cond1").value == 2 && (parseFloat(document.getElementById("cf_peroxide_bleach_c_change_value2").value)) < (parseFloat(document.getElementById("cf_peroxide_bleach_c_change_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_peroxide_bleach_c_change_value2");
        return false;
    }


    //start Color Fastness to Peroxide Bleach Staining
    if(isNaN(document.getElementById("cf_peroxide_bleach_staining_value1").value))
    {
        number_alert("cf_peroxide_bleach_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cf_peroxide_bleach_staining_value2").value))
    {
        number_alert("cf_peroxide_bleach_staining_value2");
        return false;
    }
    if(document.getElementById("cf_peroxide_bleach_staining_cond1").value == 1 && (parseFloat(document.getElementById("cf_peroxide_bleach_staining_value2").value)) <= (parseFloat(document.getElementById("cf_peroxide_bleach_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cf_peroxide_bleach_staining_value2");
        return false;
    }
    if(document.getElementById("cf_peroxide_bleach_staining_cond1").value == 2 && (parseFloat(document.getElementById("cf_peroxide_bleach_staining_value2").value)) < (parseFloat(document.getElementById("cf_peroxide_bleach_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cf_peroxide_bleach_staining_value2");
        return false;
    }



    //start Cross Staining
    if(isNaN(document.getElementById("cross_staining_value1").value))
    {
        number_alert("cross_staining_value1");
        return false;
    }
    if(isNaN(document.getElementById("cross_staining_value2").value))
    {
        number_alert("cross_staining_value2");
        return false;
    }
    if(document.getElementById("cross_staining_cond1").value == 1 && (parseFloat(document.getElementById("cross_staining_value2").value)) <= (parseFloat(document.getElementById("cross_staining_value1").value)))
    {
        warning_alert("Should be Bigger", "cross_staining_value2");
        return false;
    }
    if(document.getElementById("cross_staining_cond1").value == 2 && (parseFloat(document.getElementById("cross_staining_value2").value)) < (parseFloat(document.getElementById("cross_staining_value1").value)))
    {
        warning_alert("Should be Bigger or Equal", "cross_staining_value2");
        return false;
    }
}