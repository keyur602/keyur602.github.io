<?php
    ob_start();
    include('header.php');
    // include('parmition.php');
    $name = $_SESSION['name'];

    $par = "select * from admin_data where `name`='$name'";
    $par1=mysqli_query($con,$par);
    $par2=mysqli_fetch_array($par1);

    if ($par2['logtip'] != 'admin') {
            header('location:index.php');         
    }
    
    // $number=$_SESSION['number'];

    if (isset($_POST['submit'])) 
    {

        $name=$_POST['name'];
        $tablename=$_POST['tablename'];
        $tableurl=$_POST['tableurl'];
        $formname=$_POST['formname'];
        $formurl=$_POST['formurl'];
        
            $sql = "INSERT INTO `addtable` (`name`,`tablename`, `tableurl`, `formname`, `formurl`) VALUES ('$name','$tablename','$tableurl','$formname','$formurl')";
        
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
                            <strong>Add addtable</strong>
                        </div>
                        <div class="card-body card-block">
                            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name" name="name" placeholder="Enter Table Name" class="form-control">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Table Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="tablename" name="tablename" placeholder="Enter Table Name" class="form-control">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Table Url</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="tableurl" name="tableurl" placeholder="Enter Table Url" class="form-control">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">form Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="formname" name="formname" placeholder="Enter form Name" class="form-control">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
   

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">form Url</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="formurl" name="formurl" placeholder="Enter form Url" class="form-control">
                                        <small class="form-text text-muted"></small>
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