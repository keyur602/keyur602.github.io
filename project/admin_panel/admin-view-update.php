<?php
    ob_start();
        include('header.php');
    include('parmition.php');
        

    if (isset($_POST['submit'])) 
    {
        $image1 =$_FILES['image']['name'];

        move_uploaded_file($_FILES['image']['tmp_name'],"images/newimages/$image1");
       

        if (!empty($_GET['ad_id'])) 
        {
            $id=$_GET['ad_id'];
            $qu="select * from admin_data where`id`='$id'";
            $qu1=mysqli_query($con,$qu);
            $qu2=mysqli_fetch_array($qu1);


                    if($image1 == '')
                    {
                        $image1 = $qu2['image'];
                    }
                    else
                    {
                        $img = $qu2['image'];
                        @unlink("images/newimages/$img");
                    }

        $sql = "UPDATE `admin_data` SET `image` = '$image1'  where `id`='$id'";

        mysqli_query($con,$sql);

        }
    }   

        if (!empty($_GET['ad_id'])) 
        {
            $id = $_GET['ad_id'];   
            $que="select * from admin_data where `id`='$id'";
            $que1=mysqli_query($con,$que);
            $que2=mysqli_fetch_array($que1);
            $username = explode(' ',$que2['name']);
            $h=explode(',', $que2['education']);

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
                                <strong>Update Admin data</strong>
                            </div>
                            <div class="card-body card-block">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="image" name="image" class="form-control-file">
                                            <img src="images/newimages/<?php echo $que2['image']; ?>" height="100px" width="100px">
                                        </div>
                                    </div>                                   
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="submit" value="updete" class="btn btn-success btn-sm"> 
                                <a class="btn btn-primary btn-sm" href="admin-tables-data.php">Reset</a>
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
