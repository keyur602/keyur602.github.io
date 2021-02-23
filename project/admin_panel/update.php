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
    

    if (isset($_POST['submit'])) 
    {
            
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $name1=$fname." ".$lname;
        $phone1=$_POST['phone'];
        $email1=$_POST['email'];
        $city1=$_POST['city'];
        $gender1=$_POST['gender'];
        $edu1=@$_POST['edu']?implode(',',$_POST['edu']):'';
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

        $sql = "UPDATE `admin_data` SET `name` = '$name1', `phone` = '$phone1', `email` = '$email1', `city` = '$city1', `gender` = '$gender1', `education` = '$edu1', `image` = '$image1'  where `id`='$id'";

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
                                            <label for="text-input" class=" form-control-label">First name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="fname" name="fname" placeholder="Enter First Name" class="form-control" value="<?php if(isset($username[0])){ echo $username[0]; } ?>">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Last name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="lname" name="lname" placeholder="Enter Last Name" class="form-control" value="<?php if(isset($username[1])){ echo $username[1]; } ?>">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                     <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Phone </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="phone" name="phone" placeholder="Enter Phone Number" class="form-control" value="<?php if(!empty($que2['phone'])){echo $que2['phone'];}?>">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" value="<?php if(!empty($que2['email'])){echo $que2['email'];}?>">
                                            <small class="help-block form-text"></small>
                                        </div>
                                    </div>

                                    <?php $city = array("surat","navsari","bharuch","vadodra","una"); ?>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select City</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="city" id="city" class="form-control">
                                                <option value=""> --- select City --- </option>
                                                <?php foreach ($city as $v) { ?>
                                                    <option value="<?php echo($v) ?>"<?php if(isset($que2['city'])){if($que2['city']==$v){ echo "selected";}} ?>><?php echo($v); ?></option>
                                                <?php } ?>
                                            </select>
                                            <small class="help-block form-text"></small>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Gender</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                    <input type="radio" name="gender" value="male" class="form-check-input" <?php if (isset($que2['gender'])){ if ($que2['gender']=='male') { echo "checked"; }}?>>
                                                <label for="inline-radio1" class="form-check-label ">
                                                    Male
                                                </label>
                                                    <input type="radio" name="gender" value="female" class="form-check-input" <?php if (isset($que2['gender'])){ if ($que2['gender']=='female') { echo "checked"; }}?>>
                                                <label for="inline-radio2" class="form-check-label ">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                  <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Education</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                    <input type="checkbox" name="edu[]" value="10th" class="form-check-input" <?php if(isset($h)){if(in_array('10th',$h)){echo "checked";}}?>>
                                                <label for="inline-checkbox1" class="form-check-label ">
                                                    10th
                                                </label>
                                                    <input type="checkbox" name="edu[]" value="12th" class="form-check-input" <?php if(isset($h)){if(in_array('12th',$h)){echo "checked";}}?>>
                                                <label for="inline-checkbox2" class="form-check-label ">
                                                    12th
                                                </label>
                                                    <input type="checkbox" name="edu[]" value="graduate" class="form-check-input" <?php if(isset($h)){if(in_array('graduate',$h)){echo "checked";}}?>>
                                                <label for="inline-checkbox3" class="form-check-label ">
                                                    Graduate
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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
