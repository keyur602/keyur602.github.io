<?php
    ob_start();
        include('header.php');
    include('parmition.php');

    if (isset($_POST['submit'])) 
    {
            
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $name=$fname." ".$lname;
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $city=$_POST['city'];
        $gender=$_POST['gender'];
        $edu=@$_POST['edu']?implode(',',$_POST['edu']):'';
        $image =$_FILES['image']['name'];

        move_uploaded_file($_FILES['image']['tmp_name'],"images/newimages/$image");




        $sql = "INSERT INTO `admin_data` (`name`, `phone`, `email`, `password`, `city`, `gender`, `education`, `image`) VALUES ('$name','$phone','$email','$password','$city','$gender','$edu','$image')";

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
                                <strong>Insert Admin</strong>
                            </div>
                            <div class="card-body card-block">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">First name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="fname" name="fname" placeholder="Enter First Name" class="form-control">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Last name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="lname" name="lname" placeholder="Enter Last Name" class="form-control">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                     <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Phone </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="phone" name="phone" placeholder="Enter Phone Number" class="form-control">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control">
                                            <small class="help-block form-text"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control">
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
                                                    <option value="<?php echo($v) ?>"><?php echo($v) ?></option>
                                                <?php } ?>
                                            </select>
                                            <small class="help-block form-text"></small>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Gender</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                    <input type="radio" name="gender" value="male" class="form-check-input">
                                                <label for="inline-radio1" class="form-check-label ">
                                                    Male
                                                </label>
                                                    <input type="radio" name="gender" value="female" class="form-check-input">
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
                                                    <input type="checkbox" name="edu[]" value="10th" class="form-check-input">
                                                <label for="inline-checkbox1" class="form-check-label ">
                                                    10th
                                                </label>
                                                    <input type="checkbox" name="edu[]" value="12th" class="form-check-input">
                                                <label for="inline-checkbox2" class="form-check-label ">
                                                    12th
                                                </label>
                                                    <input type="checkbox" name="edu[]" value="graduate" class="form-check-input">
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
                                        </div>
                                    </div> 
                                    
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-success btn-sm"> 
                                <a class="btn btn-primary btn-sm" href="admin-forms-basic.php">Reset</a>
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