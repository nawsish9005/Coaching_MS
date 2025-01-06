<?php
session_start();
require_once("../../inc/db_con_log_chk.php");
require_once('../includes/header.php');
?>

</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

    <!-- Left side column. contains the logo and sidebar -->
    <?php
    include('../includes/head-section.php');
    include('../includes/sidebar.php');
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Requisition</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="container">
                            <a href="add_new_requisition.php">
                                <button class="btn btn-primary"> + Add New</button>
                            </a>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date Of Receive</th>
                                    <th>Date Of Requisition</th>
                                    <th>Requisition No</th>
                                    <th>Buyer Name</th>
                                    <th>Unit</th>
                                    <th>Machine</th>
                                    <th>Item</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $sql = "SELECT * from `file_integration_for_import`.`requisition` ORDER BY id DESC";
                                //$sql = "SELECT * FROM user_privilege WHERE user_id = '$user_id' AND password = '$password'";
                                $result = mysql_query($sql, $con);
                                $sl = 0;
                                //var_dump(mysql_fetch_assoc($result));
                                $sl = 0;
                                while ($row = mysql_fetch_assoc($result)) {


                                    $unit_id = $row['unit'];;
                                    $sql_for_unit = "SELECT * from `file_integration_for_import`.`unit` WHERE id = $unit_id";
                                    $unit_result = mysql_query($sql_for_unit, $con);
                                    while ($row_unit = mysql_fetch_assoc($unit_result)) {
                                        $unit_name = $row_unit['name'];
                                    }

                                    $dealing_officer_id = $row['dealing_officer'];;
                                    $sql_for_dealing_officer = "SELECT * from `file_integration_for_import`.`dealing_office` WHERE id = $dealing_officer_id";
                                    $dealing_officer_result = mysql_query($sql_for_dealing_officer, $con);
                                    while ($dealing_officer_unit = mysql_fetch_assoc($dealing_officer_result)) {
                                        $dealing_officer_name = $dealing_officer_unit['name'];
                                    }


                                    ?>

                                    <tr>
                                        <td><?php echo ++$sl ?></td>
                                        <td><?php echo $row['date_of_requisition']; ?> </td>
                                        <td><?php echo $row['date_of_receive']; ?> </td>
                                       <!-- <td><?php echo $row['requisition_no']; ?> </td>-->
                                        <td>
                                            <button type="button" id="requisition_view<?php echo $sl?>" value="<?php echo $row['requisition_no']; ?>"
                                                    onclick="pdf_load_function(<?php echo $sl ?>)" class="btn btn-default"
                                                    data-toggle="modal" data-target="#modal-default-app">
                                                <?php echo $row['requisition_no']; ?>
                                            </button>
                                        </td>
                                        <td><?php echo $dealing_officer_name ?> </td>
                                        <td><?php echo $unit_name ?> </td>
                                        <td><?php echo $row['machine']; ?> </td>
                                        <td><?php echo $row['item']; ?> </td>
                                        <td>
                                            <div class="btn-group">
                                               <!-- <button type="button" class="btn btn-info">Action</button> -->
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                        data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href='requisition_details.php?id=<?php echo $row['id'] ?>'>Details</a>
                                                    </li>
                                                    <li>
                                                        <a href='edit_requisition.php?id=<?php echo $row['id'] ?>'>Edit</a>
                                                    </li>
                                                    <li><a href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>

                                    </tr>

                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- modal For Requisition View -->
<div class="modal fade" id="modal-default-app">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Requisition</h4>
            </div>
            <div class="modal-body" id="requisition_pdf_view">
                <!--<object  data="<?php echo "1" ?>" type="application/pdf" width="100%" height="600px">
                        <p>Alternative text - include a link <a href="<?php echo "uploads/15165121831approved pi.pdf" ?>">to the PDF!</a></p>
                    </object>-->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <!-- /.modal -->
</div>
<!-- modal For Requisition View  Ends-->

<!-- jQuery 3 -->
<script src="../includes/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../includes/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../includes/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../includes/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../includes/bower_components/datatables.net-bs/FixedColumns-3.2.4/js/dataTables.fixedColumns.min.js"></script>
<script src="../includes/bower_components/datatables.net-bs/FixedHeader-3.1.3/js/dataTables.fixedHeader.min.js"></script>
<!-- <script src="../includes/bower_components/datatables.net-bs/Scroller-1.4.4/js/dataTables.scroller.min.js"></script> -->
<!-- SlimScroll -->
<script src="../includes/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../includes/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../includes/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../includes/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            'paging': true,
            'lengthChange': true,
            'ordering': true,
            'info': true,
            'scrollX': true,
            "scrollY":  "370px",
            "scrollCollapse": true,
            "fixedColumns": {
                leftColumns: 4,
                rightColumns: 0,
            },
            "columnDefs": [
                { width: 250, targets: 4 },
                { width: 250, targets: 5 },
                { width: 250, targets: 6 },
                { width: 600, targets: 7 }
            ],
        });
    });
</script>

<script>
    function pdf_load_function(serial){
        var requisition_no = document.getElementById("requisition_view"+serial).value;
        //alert(requisition_no);
        var xmlhttp;

        if (window.XMLHttpRequest)
        {
            xmlhttp = new XMLHttpRequest();
        }
        else
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.open("POST", "finding_requisition.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("requisition_no=" + requisition_no );

        xmlhttp.onreadystatechange = function ()
        {

            if (xmlhttp.readyState != 4) // Means data is not received from server.
            {
            }
            if (xmlhttp.readyState == 4)
            {

                var data = xmlhttp.responseText;

                //alert(data);

                document.getElementById("requisition_pdf_view").innerHTML = data;
            }

        }
    }
</script>

</body>
</html>
