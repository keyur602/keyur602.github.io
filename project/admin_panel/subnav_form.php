<?php
    ob_start();
        include('header.php');
    // include('parmition.php');
        $name = $_SESSION['name'];

    $par = "select * from admin_data where `name`='$name'";
    $par1=mysqli_query($con,$par);
    $par2=mysqli_fetch_array($par1);

    if ($par2['logtip'] != 'admin') {
        $pars = "select * from addtable where `name`='subnav'";
        $pars1=mysqli_query($con,$pars);
        $pars2=mysqli_fetch_array($pars1);

        if($pars2['status']!='1'){
            // echo $pars2['status'];
            header('location:index.php');
        }         
    }

    if (isset($_POST['submit'])) 
    {
            
        $name=$_POST['name'];
        $url=$_POST['url'];
        $nav=$_POST['nev'];


        if (!empty($_GET['ad_id'])) 
        {
            $sql = "UPDATE `subnav` SET `name` = '$name', `url` = '$url',`navid` = '$nav'  where `subnav_id`='$id'";

            mysqli_query($con,$sql);

            }
            else
            {
                $sql = "INSERT INTO `subnav` (`name`, `url`, `navid`) VALUES ('$name', '$url', '$nav')";
                mysqli_query($con,$sql);
            }
        }
    if (!empty($_GET['ad_id'])) 
        {
            $id = $_GET['ad_id'];   
            $que="select * from subnav where `subnav_id`='$id'";
            $que1=mysqli_query($con,$que);
            $que2=mysqli_fetch_array($que1);
            // print_r($que2);

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
                                <strong>Add subnav</strong>
                            </div>
                            <div class="card-body card-block">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="titel" name="name" placeholder="Enter name" class="form-control" value="<?php if(!empty($que2['name'])){echo $que2['name'];}?>">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">url</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="contents" name="url" placeholder="Enter url" class="form-control" value="<?php if(!empty($que2['url'])){echo $que2['url'];}?>">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <?php
                                        $nav="select * from nav";
                                        $nav1=mysqli_query($con,$nav);
                                    ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Nev</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="nev" id="nav" class="form-control">
                                                <option value=""> --- select nev --- </option>
                                                <?php while ($nav2=mysqli_fetch_array($nav1)) { ?>
                                                    <option value="<?php echo $nav2['nav_id']; ?>"><?php echo $nav2['nev']; ?></option>
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
                                <a class="btn btn-primary btn-sm" href="subnav_form.php">Reset</a>
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