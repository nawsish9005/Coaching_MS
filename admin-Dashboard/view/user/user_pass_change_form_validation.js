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


function Password_Form_Validation()
{

	if($.trim($("#old_password").val()) == "")
	{
  		missing_alert("old_password");
  		return false;
	}
	/*if(check_password($.trim($("#old_password").val())) != "OK")
	{
  		warning_alert(check_password($.trim($("#old_password").val())), "old_password");
  		return false;
	}*/
	if($.trim($("#new_password").val()) == "")
	{
  		missing_alert("new_password");
  		return false;
	}
	if(check_password($.trim($("#new_password").val())) != "OK")
	{
  		warning_alert(check_password($.trim($("#new_password").val())), "new_password");
  		return false;
	}
	if($.trim($("#con_password").val()) == "")
	{
  		missing_alert("con_password");
  		return false;
	}
	if(check_password($.trim($("#con_password").val())) != "OK")
	{
  		warning_alert(check_password($.trim($("#con_password").val())), "con_password");
  		return false;
	}
	if($.trim($("#new_password").val()) != $.trim($("#con_password").val()))
	{
		warning_alert("Password did not match with Confirm Password!", "con_password");
		return false;
	}

}