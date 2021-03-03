<?php
    ob_start();
    include('header.php');
    // include('parmition.php');
    $name = $_SESSION['name'];

    $par = "select * from admin_data where `name`='$name'";
    $par1=mysqli_query($con,$par);
    $par2=mysqli_fetch_array($par1);

    if ($par2['logtip'] != 'admin') {
        $pars = "select * from addtable where `name`='other post'";
        $pars1=mysqli_query($con,$pars);
        $pars2=mysqli_fetch_array($pars1);

        if($pars2['status']!='1'){
            // echo $pars2['status'];
            header('location:index.php');
        }         
    }
    
    $names = $hedqu2['name'];
    if (isset($_POST['submit'])) 
    {
        $name=$names;     
        $contents=$_POST['contents'];
        $cont=$_POST['cont'];

       
        if (!empty($_GET['ad_id'])) 
        {
            $id=$_GET['ad_id'];

            $sql = "UPDATE `otherpost` SET `content` = '$contents', `cont` = '$cont'  where `otherpost_id`='$id'";
            mysqli_query($con,$sql);

        }
        else
        {
            $sql = "INSERT INTO `otherpost` (`name`, `content`, `cont`) VALUES ('$name', '$contents', '$cont')";
            mysqli_query($con,$sql);
        }
    }
    if (!empty($_GET['ad_id'])) 
        {
            $id = $_GET['ad_id'];   
            $que="select * from otherpost where `otherpost_id`='$id'";
            $que1=mysqli_query($con,$que);
            $que2=mysqli_fetch_array($que1);
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
                                <strong>Add otherpost</strong>
                            </div>
                            <div class="card-body card-block">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal">

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Content</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="contents" name="contents" placeholder="Enter contents" class="form-control" value="<?php if(!empty($que2['content'])){echo $que2['content'];}?>">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">contry</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="cont" name="cont" placeholder="Enter contry" class="form-control" value="<?php if(!empty($que2['cont'])){echo $que2['cont'];}?>">
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
                                <a class="btn btn-primary btn-sm" href="otherpost-forms.php">Reset</a>
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