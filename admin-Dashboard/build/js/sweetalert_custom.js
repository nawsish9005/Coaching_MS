function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function id_to_capitalize_string(id)
{
	var changed_id = id.replace(/_/g, " ");
	return toTitleCase(changed_id);
}

function capitalize(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}

function warning_alert(text, focus_id, title)
{
	title = (title === undefined) ? "Warning!" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>"+text+"<span>",
		html: true,
		type: "warning"

	},
	function()
	{
		
		if(focus_id != "")
		{
			window.setTimeout(function ()
			{
			    document.getElementById(focus_id).focus();
			}, 0);
		}
		
	});
}

function missing_alert(focus_id, title)
{
	var text = id_to_capitalize_string(focus_id);
	title = (title === undefined) ? "Information Missing!" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>Please Provide "+text+".<span>",
		html: true,
		type: "warning"

	},
	function()
	{
		
		if(focus_id != "")
		{
			window.setTimeout(function ()
			{
			    document.getElementById(focus_id).focus();
			}, 0);
		}
		
	});
}

function missing_alert_2(focus_id, init_val_id, title)
{
	var text = id_to_capitalize_string(focus_id);
	title = (title === undefined) ? "Information Missing!" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>Please Provide "+text+".<span>",
		html: true,
		type: "warning"

	},
	function()
	{
		
		if(focus_id != "")
		{
			window.setTimeout(function ()
			{
			    document.getElementById(init_val_id).value = "";
			    document.getElementById(focus_id).focus();
			}, 0);
		}
		
	});
}

function number_alert(focus_id, title)
{
	var text = id_to_capitalize_string(focus_id);
	title = (title === undefined) ? "Invalid Datatype!" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>"+text+" Should Be Numeric.<span>",
		html: true,
		type: "warning"

	},
	function()
	{
		
		if(focus_id != "")
		{
			window.setTimeout(function ()
			{
			    document.getElementById(focus_id).value = "";
			    document.getElementById(focus_id).focus();
			}, 0);
		}
		
	});
}

function success_alert(text, url, title)
{
	title = (title === undefined) ? "Attention!!!" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>"+text+"<span>",
		html: true,
		type: "success",
		showCancelButton: false,
		confirmButtonText: "Ok",
		closeOnConfirm: false
	},
	function()
	{
		window.location.href = url;
	});
}


function fail_alert(text, url, title)
{
	title = (title === undefined) ? "Attention!!!" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>"+text+"<span>",
		html: true,
		type: "error",
		showCancelButton: false,
		confirmButtonText: "Ok",
		closeOnConfirm: false
	},
	function()
	{
		window.location.href = url;
	});
}

function fail_alert_2(text, focus_id, title)
{
	title = (title === undefined) ? "Failed!" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>"+text+"<span>",
		html: true,
		type: "warning"

	},
	function()
	{
		
		if(focus_id != "")
		{
			window.setTimeout(function ()
			{
			    document.getElementById(focus_id).focus();
			}, 0);
		}
		
	});
}

function info_alert(text, title)
{
	title = (title === undefined) ? "Attention!!!" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>"+text+"<span>",
		html: true,
		type: "info"

	});
}

function info_alert_2(text, url, title)
{
	title = (title === undefined) ? "Attention!!!" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>"+text+"<span>",
		html: true,
		type: "info"
	},
	function()
	{
		window.location.href = url;
	});
}

function error_alert(text, title)
{
	title = (title === undefined) ? "Sorry" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>"+text+"<span>",
		html: true,
		type: "error"

	});
}

function delete_prompt(func_name, sno)
{
	swal(
	{
		title: "Are you sure?",
		text: "You will not be able to recover this data!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, Delete It!",
		cancelButtonText: "No, Cancel!",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm)
	{
		if(isConfirm)
		{
			
			window[func_name]('delete',sno);
			swal("Deleted", "Your data is deleted successfully. :)", "success");
		}
		else
		{
			swal("Cancelled", "Your data is safe. :)", "error");
		}
	});
}

function missing_alert_for_class(focus_class, serial, title)
{
	var text = id_to_capitalize_string(focus_class);
	title = (title === undefined) ? "Information Missing!" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>Please Provide "+text+".<span>",
		html: true,
		type: "warning"

	},
	function()
	{
		
		if(focus_class != "")
		{
			window.setTimeout(function ()
			{
			    document.getElementsByClassName(focus_class)[serial].focus();
			}, 0);
		}
		
	});
}

function number_alert_for_class(focus_class, serial, title)
{
	var text = id_to_capitalize_string(focus_class);
	title = (title === undefined) ? "Invalid Datatype!" : title;
	swal(
		{

		title: title,
		text: "<span style='color:#ff0000'>"+text+" Should Be Numeric.<span>",
		html: true,
		type: "warning"

	},
	function()
	{
		
		if(focus_class != "")
		{
			window.setTimeout(function ()
			{
			    document.getElementsByClassName(focus_class)[serial].value = "";
			    document.getElementsByClassName(focus_class)[serial].focus();
			}, 0);
		}
		
	});
}




