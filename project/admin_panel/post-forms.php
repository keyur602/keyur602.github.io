    <?php
        include('header.php');
        $name = $_SESSION['name'];

    $par = "select * from admin_data where `name`='$name'";
    $par1=mysqli_query($con,$par);
    $par2=mysqli_fetch_array($par1);

    if ($par2['logtip'] != 'admin') {
        $pars = "select * from addtable where `name`='Post'";
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
        $fname = $names;
        if (empty($_GET['ad_id'])) {
            $date = $_POST['date'];
        }
        $titel=$_POST['titel'];
        $contents=$_POST['contents'];
        $scontents=$_POST['scontents'];
        $lcontents=$_POST['lcontents'];
        $image =$_FILES['image']['name'];

        move_uploaded_file($_FILES['image']['tmp_name'],"images/newimages/$image");

        if (!empty($_GET['ad_id'])) 
        {
            $id=$_GET['ad_id'];
            $qu="select * from post where`post_id`='$id'";
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

        $sql = "UPDATE `post` SET `titel` = '$titel', `content` = '$contents', `scontent` = '$scontents', `lcontent` = '$lcontents', `image` = '$image'  where `post_id`='$id'";

        if (mysqli_query($con,$sql)) {
                    $error="success";
                } else{
                    $error="not success"; 
                }   
        }
        else
        {
            $sql = "INSERT INTO `post` (`fname`, `date`, `titel`, `content`,`scontent`, `lcontent`, `image`) VALUES ('$fname', '$date', '$titel', '$contents', '$scontents', '$lcontents', '$image')";
            if (mysqli_query($con,$sql)) {
                    $error="success";
                } else{
                    $error="not success"; 
                }   
        }
    }
    if (!empty($_GET['ad_id'])) 
        {
            $id = $_GET['ad_id'];   
            $que="select * from post where `post_id`='$id'";
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
                                <?php if (!empty($error)) { ?>
                                    <span class="alert alert-success">
                                    <?php echo $error; ?>
                                    </span>
                                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add post</strong>
                            </div>
                            <div class="card-body card-block">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                        
                                <?php if (empty($_GET['ad_id'])) { ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Date</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" name="date" class="form-control">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                <?php } ?>

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
                                            <label for="text-input" class=" form-control-label">Enter Subject</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="contents" name="contents" placeholder="Enter contents" class="form-control" value="<?php if(!empty($que2['content'])){echo $que2['content'];}?>">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Secend Content</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="contents" name="scontents" placeholder="Enter contents" class="form-control" value="<?php if(!empty($que2['scontent'])){echo $que2['scontent'];}?>">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">LastContent</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="contents" name="lcontents" placeholder="Enter contents" class="form-control" value="<?php if(!empty($que2['lcontent'])){echo $que2['lcontent'];}?>">
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
                                <a class="btn btn-primary btn-sm" href="post-forms.php">Reset</a>
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