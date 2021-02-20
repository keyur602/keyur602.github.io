<?php
    ob_start();
        include('header.php');
    include('parmition.php');

    if (isset($_POST['submit'])) 
    {
            
        $titel=$_POST['titel'];
        $contents=$_POST['contents'];
        $scontent=$_POST['scontent'];
        $image =$_FILES['image']['name'];

        move_uploaded_file($_FILES['image']['tmp_name'],"images/newimages/$image");

        if (!empty($_GET['ad_id'])) 
        {
            $id=$_GET['ad_id'];
            $qu="select * from about2 where`about2_id`='$id'";
            $qu1=mysqli_query($con,$qu);
            $qu2=mysqli_fetch_array($qu1);


                    if($image == '')
                    {
                        $image = $qu2['image'];
                    }
                    else
                    {
                        $img = $qu2['image'];
                        @unlink("images/newimages/$img");
                    }

        $sql = "UPDATE `about2` SET `titel` = '$titel', `content` = '$contents', `scontent` ='$scontent', `image` = '$image'  where `about2_id`='$id'";

        mysqli_query($con,$sql);

        }
        else
        {
            $sql = "INSERT INTO `about2` (`titel`, `content`, `image`, `scontent`) VALUES ('$titel', '$contents', '$image', '$scontent')";
            mysqli_query($con,$sql);
        }
    }
    if (!empty($_GET['ad_id'])) 
        {
            $id = $_GET['ad_id'];   
            $que="select * from about2 where `about2_id`='$id'";
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
                                <strong>Add about2</strong>
                            </div>
                            <div class="card-body card-block">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Titel</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="titel" name="titel" placeholder="Enter Titel" class="form-control" value="<?php if(!empty($que2['titel'])){echo $que2['titel'];}?>">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>

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
                                            <label for="text-input" class=" form-control-label">Content</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="scontent" name="scontent" placeholder="Enter scontent" class="form-control" value="<?php if(!empty($que2['scontent'])){echo $que2['scontent'];}?>">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                     
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="image" name="image" class="form-control-file">
                                        </div>
                                    </div> 
                                    
                            </div>
                            <div class="card-footer">
                            <?php if (empty($_GET['ad_id'])) {?>

                                <input type="submit" name="submit" class="btn btn-success btn-sm"> 
                            <?php }else{ ?>
                                <input type="submit" name="submit" class="btn btn-success btn-sm"> 
                            <?php } ?>    
                                <a class="btn btn-primary btn-sm" href="about2-forms.php">Reset</a>
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