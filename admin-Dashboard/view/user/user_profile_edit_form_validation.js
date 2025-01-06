function check_letters(param)
{
	var regex = /^[A-Za-z\s\.]+$/;
	return regex.test(param);
}

function check_alphanumeric(param)
{
	var regex = /^[a-zA-Z0-9]+$/;
	return regex.test(param);
}

function check_numeric(param)
{
	var regex = /^[0-9]+$/;
	return regex.test(param);
}


function Edit_Form_Validation()
{

	if($.trim($("#new_first_name").val()) == "")
	{
  		missing_alert("new_first_name");
  		return false;
	}
	if(!check_letters($.trim($("#new_first_name").val())))
	{
		warning_alert("User Name should contain only letters.", "new_first_name");
		return false;
	}
	if($.trim($("#new_last_name").val()) == "")
	{
  		missing_alert("new_last_name");
  		return false;
	}
	if(!check_letters($.trim($("#new_last_name").val())))
	{
		warning_alert("User Name should contain only letters.", "new_last_name");
		return false;
	}
	if($.trim($("#new_user_id").val()) == "")
	{
  		missing_alert("new_user_id");
  		return false;
	}
	if(!check_letters($.trim($("#new_user_id").val())))
	{
		warning_alert("new_User Name should contain only alphanumeric characters.", "new_user_id");
		return false;
	}
	if($.trim($("#new_email").val()) == "")
	{
  		missing_alert("new_email");
  		return false;
	}
	if($.trim($("#new_contact_no").val()) == "")
	{
  		missing_alert("new_contact_no");
  		return false;
	}
	if(!check_numeric($.trim($("#new_contact_no").val())))
	{
		warning_alert("Contact No. should contain only numeric characters.", "new_contact_no");
		return false;
	}
	/*if($.trim($("#new_department").val()) == "")
	{
  		missing_alert("new_department");
  		return false;
	}
	if($.trim($("#new_designation").val()) == "")
	{
  		missing_alert("new_designation");
  		return false;
	}*/
}