<?php 
    ob_start();
    
    include('header.php');
    
    if (!empty($_GET['ad_id'])) 
    {
        $id=$_GET['ad_id'];
        $q="delete from hed where `hed_id`='$id'"; 
        mysqli_query($con,$q);
    }
   if (!empty($_GET['sdid'])) 
    {   
        if ($_GET['status']=='deacitve') 
        {
           $id = $_GET['sdid'];
           $st="update hed set `status`='1' where `hed_id`='$id'";
           mysqli_query($con,$st);
        }
        else if ($_GET['status']=='acitve')
        {
            $id = $_GET['sdid'];
            $st="update hed set `status`='0' where `hed_id`='$id'";
            mysqli_query($con,$st);   
        }
    }


    $query = "select * from hed";
    $query1 = mysqli_query($con,$query);


?>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li><a href="admin-tables-data.php">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>hed_id</th>
                                            <th>Name</th>
                                      
                                            <th>status</th>
                                            <th>Action</th>   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($deta = mysqli_fetch_array($query1)) { ?>
                                            <tr>
                                                <td><?php echo $deta['hed_id']; ?></td>
                                                <td><?php echo $deta['hed']; ?></td>
                                                <td>
                                                    <?php if ($deta['status']==0) { ?>
                                                   <a class="btn btn-danger btn-sm" href="hed.php?status=deacitve&sdid=<?php echo $deta['hed_id']?>">deacitve</a>
                                                   <?php } elseif ($deta['status']==1){ ?>
                                                   <a class="btn btn-primary btn-sm" href="hed.php?status=acitve&sdid=<?php echo $deta['hed_id']?>">acitve</a>
                                                   <?php }else{ ?>
                                                   <a class="btn btn-success btn-sm" href="hed.php">Admin</a>
                                                   <?php } ?>

                                                </td>
                                                <td>
                                                    <a class="btn btn-danger btn-sm" href="hed.php?ad_id=<?php echo $deta['hed_id']; ?>">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>
    <?php 
        include('footer.php');
     ?>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
    </script>
