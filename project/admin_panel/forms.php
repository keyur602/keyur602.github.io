<?php
    ob_start();
    include('header.php');
    include('parmition.php');
    

    if (isset($_POST['submit'])) 
    {

        $hed_id=$_POST['hed_id'];
        $tablenames=$_POST['tablename'];
        $tableurl=$_POST['tableurl'];
        
            $sql = "INSERT INTO `hedtab` (`hed_id`, `name`, `url`) VALUES ('$hed_id','$tablenames','$tableurl')";
        
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

                                <?php
                                        $nav="select * from hed";
                                        $nav1=mysqli_query($con,$nav);
                                    ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Header</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="hed_id" id="nav" class="form-control">
                                                <option value=""> --- select header --- </option>
                                                <?php while ($nav2=mysqli_fetch_array($nav1)) { ?>
                                                    <option value="<?php echo $nav2['hed_id']; ?>"><?php echo $nav2['hed']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small class="help-block form-text"></small>
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