    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
	<!-- jQuery ui-->
    <script src="../../build/jquery/jquery-ui.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- Dropzone.js -->
    <script src="../../vendors/dropzone/dist/min/dropzone.min.js"></script>
    <!-- Chart.js -->
    <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../../vendors/Flot/jquery.flot.js"></script>
    <script src="../../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../../vendors/starrr/dist/starrr.js"></script>
    <!-- Sweet Alert JS -->
    <script src="../../vendors/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Datatables -->
    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.js"></script>
    <script src="../../build/js/sweetalert_custom.js"></script>
    <script src='../user/user_profile_edit_form_validation.js'></script>
    <script src='../user/user_pass_change_form_validation.js'></script>

    <script type="text/javascript">

        function sending_data_of_user_profile_edit_form_for_updating_in_database()
        {
            var validation = Edit_Form_Validation();

            if(validation == false)
            {
                return false;
            }

            var form = document.forms.namedItem("user_profile_edit_form");
            var form_data = new FormData(form);

            if (window.XMLHttpRequest)
            {
                var xmlhttp = new XMLHttpRequest();
            }
            else
            {
                var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.open("POST","../user/user_profile_updating.php",true);
            xmlhttp.send(form_data);  
            xmlhttp.onreadystatechange = function()
            {
                if (xmlhttp.readyState != 4) // Means data is not received from server.
                {

                }
                if (xmlhttp.readyState == 4)
                {
                    var data = xmlhttp.responseText;
                    if(data == "User update is failed!")
                    {
                        fail_alert_2(data,"user_id","Sorry!");
                    }
                    else
                    {
                        var url = window.location.href;
                        if(url.search("dashboard") >= 0)
                            success_alert(data,"dashboard.php","Success!");
                        else
                            success_alert(data,"../home/dashboard.php","Success!");
                    }
                }
            }

        } // End of function sending_data_of_user_profile_edit_form_for_updating_in_database()

        function sending_data_of_user_pass_change_form_for_updating_in_database()
        {
            var validation = Password_Form_Validation();

            if(validation == false)
            {
                return false;
            }

            var form = document.forms.namedItem("user_pass_change_form");
            var form_data = new FormData(form);

            if (window.XMLHttpRequest)
            {
                var xmlhttp = new XMLHttpRequest();
            }
            else
            {
                var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.open("POST","../user/user_password_changing.php",true);
            xmlhttp.send(form_data);  
            xmlhttp.onreadystatechange = function()
            {
                if (xmlhttp.readyState != 4) // Means data is not received from server.
                {

                }
                if (xmlhttp.readyState == 4)
                {
                    var data = xmlhttp.responseText;
                    if(data == "Password Change is failed!")
                    {
                        fail_alert_2(data,"old_password","Sorry!");
                    }
                    else
                    {
                        var url = window.location.href;
                        if(url.search("dashboard") >= 0)
                            success_alert(data,"dashboard.php","Success!");
                        else
                            success_alert(data,"../home/dashboard.php","Success!");
                    }
                }
            }

        } // End of function sending_data_of_user_pass_change_form_for_updating_in_database()

        function profile_view_function(user_id) 
        {
            var xmlhttp;

            if (window.XMLHttpRequest) 
            {
                xmlhttp = new XMLHttpRequest();
            }
            else 
            {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.open("POST", "../user/finding_user.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("user_id=" + user_id);

            xmlhttp.onreadystatechange = function () {

                if (xmlhttp.readyState != 4) // Means data is not received from server.
                {
                }
                if (xmlhttp.readyState == 4) 
                {
                    var data = xmlhttp.responseText;
                    document.getElementById("user_profile_view").innerHTML = data;
                }

            }
        }

        function user_pass_view_function() 
        {
            var id = document.getElementById("user_pass_change_view").value;
            var xmlhttp;

            if (window.XMLHttpRequest) 
            {
                xmlhttp = new XMLHttpRequest();
            }
            else 
            {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.open("POST", "../user/finding_user_password.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("id=" + id);

            xmlhttp.onreadystatechange = function () {

                if (xmlhttp.readyState != 4) // Means data is not received from server.
                {
                }
                if (xmlhttp.readyState == 4) 
                {
                    var data = xmlhttp.responseText;
                    document.getElementById("user_pass_view").innerHTML = data;
                }

            }
        }
    
        function undo_disable()
        {
            $("#new_first_name").removeAttr("disabled");
            $("#new_last_name").removeAttr("disabled");
            $("#new_middle_name").removeAttr("disabled");
            $("#new_user_id").removeAttr("disabled");
            $("#new_email").removeAttr("disabled");
            $("#new_contact_no").removeAttr("disabled");
            $("#new_department").removeAttr("disabled");
            $("#new_designation").removeAttr("disabled");
            $("#new_user_type").removeAttr("disabled");
            $("#new_status").removeAttr("disabled");
            $("#user_edit_btn").css("display", "none");
            $("#user_edit_cancel_btn").css("display", "initial");
            $("#user_profile_update_btn").css("display", "initial");
        }
    
        function redo_disable()
        {
            $("#user_edit_cancel_btn").css("display", "none");
            $("#user_profile_update_btn").css("display", "none");
            $("#user_edit_btn").css("display", "initial");
            $("#new_first_name").attr("disabled", "disabled");
            $("#new_last_name").attr("disabled", "disabled");
            $("#new_middle_name").attr("disabled", "disabled");
            $("#new_user_id").attr("disabled", "disabled");
            $("#new_email").attr("disabled", "disabled");
            $("#new_contact_no").attr("disabled", "disabled");
            $("#new_department").attr("disabled", "disabled");
            $("#new_designation").attr("disabled", "disabled");
            $("#new_user_type").attr("disabled", "disabled");
            $("#new_status").attr("disabled", "disabled");
        }

    </script>