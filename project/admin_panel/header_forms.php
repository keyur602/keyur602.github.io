<?php
    ob_start();
    include('header.php');
    include('parmition.php');
    

    if (isset($_POST['submit'])) 
    {

        $tablenames=$_POST['hed'];
        
            $sql = "INSERT INTO `hed` (`hed`) VALUES ('$tablenames')";
        
        mysqli_query($con,$sql);

    }
   
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
                                    <li><a href="admin-forms-basic.php">Forms</a></li>
                                    <li class="active">Basic</li>
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
                    <div class="col-lg-6">
                        <div class="card">
                        <div class="card-header">
                            <strong>Add header titel</strong>
                        </div>
                        <div class="card-body card-block">
                            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Table Name</label>
                                    </div>
                                        <input type="text" id="hed" name="hed" placeholder="Enter Table Name" class="form-control">
                                    </div>
                                </div>
                                       
                        </div>
                            <div class="card-footer">
                                <?php if (empty($_GET['ad_id'])) {?>

                                    <input type="submit" name="submit" class="btn btn-success btn-sm"> 
                                <?php }else{ ?>
                                    <input type="submit" name="submit" class="btn btn-success btn-sm"> 
                                <?php } ?>    
                                    <a class="btn btn-primary btn-sm" href="tables.php">Reset</a>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php
        include('footer.php');
    ?>