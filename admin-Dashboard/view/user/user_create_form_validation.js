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
function check_password(param)
{
	if(param.match(/[a-z]/g) == null)
	{
		return "Must contain atleast one lowercase letter!";
	}
	else if(param.match(/[A-Z]/g) == null)
	{
		return "Must contain atleast one upperrcase letter!";
	}
	else if(param.match(/[0-9]/g) == null)
	{
		return "Must contain atleast one number!";
	}
	else if(param.length < 6)
	{
		return "Must contain atleast 6 characters!";
	}
	else
	{
		return "OK";
	}
}


function Form_Validation()
{

	if($.trim($("#first_name").val()) == "")
	{
  		missing_alert("first_name");
  		return false;
	}
	if(!check_letters($.trim($("#first_name").val())))
	{
		warning_alert("User Name should contain only letters.", "first_name");
		return false;
	}
	if($.trim($("#last_name").val()) == "")
	{
  		missing_alert("last_name");
  		return false;
	}
	if(!check_letters($.trim($("#last_name").val())))
	{
		warning_alert("User Name should contain only letters.", "last_name");
		return false;
	}
	if($.trim($("#user_id").val()) == "")
	{
  		missing_alert("user_id");
  		return false;
	}
	if(!check_letters($.trim($("#user_id").val())))
	{
		warning_alert("User Name should contain only alphanumeric characters.", "user_id");
		return false;
	}
	if($.trim($("#password").val()) == "")
	{
  		missing_alert("password");
  		return false;
	}
	if(check_password($.trim($("#password").val())) != "OK")
	{
  		warning_alert(check_password($.trim($("#password").val())), "password");
  		return false;
	}
	if($.trim($("#password").val()) != $.trim($("#con_password").val()))
	{
		warning_alert("Password did not match with Confirm Password!", "con_password");
		return false;
	}
	if($.trim($("#email").val()) == "")
	{
  		missing_alert("email");
  		return false;
	}
	if($.trim($("#contact_no").val()) == "")
	{
  		missing_alert("contact_no");
  		return false;
	}
	if(!check_numeric($.trim($("#contact_no").val())))
	{
		warning_alert("Contact No. should contain only numeric characters.", "contact_no");
		return false;
	}
	if($.trim($("#department").val()) == "")
	{
  		missing_alert("department");
  		return false;
	}
	if($.trim($("#designation").val()) == "")
	{
  		missing_alert("designation");
  		return false;
	}

}