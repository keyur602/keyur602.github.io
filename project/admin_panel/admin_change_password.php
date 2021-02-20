    <?php
        ob_start();
        include('header.php');
        include('parmition.php');

       $id = $hedqu2['id'];
       $ol = $hedqu2['password'];

    if (isset($_POST['submit'])) 
    {
        $old =md5($_POST['opassword']);
        $new =md5($_POST['npassword']);
        $coni =md5($_POST['cpassword']);
            if ($old == $ol) 
            {
              if ($new != $old) 
                {
                    if ($coni == $new) 
                    {
                        $sql = "UPDATE `admin_data` SET `password` = '$coni'  where `id`='$id'";
                        mysqli_query($con,$sql);
                        header('location:logout.php');
                    } 
                    else 
                    {
                        $erorcon ="Confirm password is notmech to your New password"; 
                    }
                }
                else 
                {
                    $erornew ="New password is mech to your Old password";    
                }
            } 
            else 
            {
                $erorold ="Old password is notmech to your password";
            }    
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
                                <strong>Update Admin password</strong>
                            </div>
                            <div class="card-body card-block">
                                <form method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Old Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password" name="opassword" placeholder="Enter Old Password" class="form-control">
                                            <?php if (!empty($erorold)) {  ?>
                                                <small class="help-block form-text alert alert-danger"><?php  echo $erorold; ?></small>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">New Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password" name="npassword" placeholder="Enter New Password" class="form-control">
                                            <?php if (!empty($erornew)) {  ?>           
                                                <small class="help-block form-text alert alert-danger"><?php echo $erornew; ?></small>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Confirm Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password" name="cpassword" placeholder="Enter Confirm Password" class="form-control">
                                            <?php if (!empty($erorcon)) {  ?>           
                                                <small class="help-block form-text alert alert-danger"><?php echo $erorcon; ?></small>
                                            <?php } ?>   
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
