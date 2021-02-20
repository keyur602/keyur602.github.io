<?php
    session_start();

    include('dblink.php');

    if (isset($_POST['submit'])) 
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $edu=@$_POST['edu']?implode(',',$_POST['edu']):'';
        $gender = @$_POST['gender'];
        $image = $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];

        move_uploaded_file($_FILES['image']['tmp_name'], "images/newimages/$image");
        $array_image = array("image/jpg","image/jpeg","image/png","image/svg");


        if ($fname == '') {
            $fname_error ="name is riqird";
        }
        else if (strlen($fname) < 3) {
            $fname_error ="name is min velu 3";
         }
        else if (strlen($fname) > 20) {
            $fname_error ="name is max velu 20";
         }
         else if ($lname == '') {
            $lname_error ="name is riqird";
        }
        else if (strlen($lname) < 3) {
            $lname_error ="name is min velu 3";
         }
        else if (strlen($lname) > 20) {
            $lname_error ="name is max velu 20";
         }
        else if ($phone == '') {
            $phon_error ="phone number is riqird";    
        } 
        else if (!preg_match('/^[0-9]{10}+$/', $phone)) {
            $phon_error ="Enter valid phone number";    
        }
        elseif ($email == '') {
            $email_error="Email is riqird";
         }
        elseif ($pass == '') {
            $pass_error="password is riqird";
         }
         elseif (strlen($pass) < 8) {
            $pass_error="password is min velu 8";
         }
         elseif (strlen($pass) > 20) {
            $pass_error="password is max velu 20";
         }
        else if ($edu == '')
        {
            $edu_error = "Select Any One Education Minimum";
        } 
         else if($gender == '')
        {
            $gender_error = "Select Any One Gender";
        }
        else if ($image == '')
        {
            $image_error ="select Image";
        }
        else if(!in_array($image_type, $array_image))
        {
            $image_error = "select valid format";
        }
        else
        {   
            $name = $fname." ".$lname;
            $pass = md5($_POST['password']);

            $que = "INSERT INTO `admin_data`(`name` , `phone` ,`email` ,`password` ,`education` ,`gender` ,`image` ,`logtip`)VALUES('$name' ,'$phone' ,'$email' ,'$pass' ,'$edu' ,'$gender' ,'$image' ,'meneger')";
            if (mysqli_query($con,$que)) {

                header("location:admin_login.php");

            }
            else
            {

                $errors = "red";
            }
        }
    }
   
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<style type="text/css">
    label{
        margin-right: 5px;
    }
    .card-footer{
        width: 100%;
        display: flex;
    }
    .card-footer button{
        width: 25%;
        margin: 0 15px;
        display: block;
    }
    .card-footer a{
        width: 25%;
        margin: 0 15px;
        display: block;
    }
</style>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                   <div class="card-body card-block">
                    <?php if(!empty($errors)){ ?>
                            <!-- <small class="form-text text-muted" role="alert"> -->
                                <div class="sufee-alert alert with-close alert-info alert-dismissible fade show">
                                        <?php echo "$errors"; ?>
                                        
                                    </div>
                                <!-- </small> -->
                    <?php } ?>
                                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="text-input" class=" form-control-label">First name</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="fname" name="fname" placeholder="Enter First Name" class="form-control" value="<?php if(!empty($_POST['fname'])){ echo $fname ; } ?>">
                                            <?php if (!empty($fname_error)) { ?>
                                                <small class="text-danger "><?php echo "* $fname_error !!"; ?></small>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="text-input" class=" form-control-label">Last name</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="lname" name="lname" placeholder="Enter Last Name" class="form-control"  value="<?php if(!empty($_POST['lname'])){ echo $lname ; } ?>">
                                            <?php if (!empty($lname_error)) { ?>
                                                <small class="text-danger "><?php echo "* $lname_error !!"; ?></small>
                                            <?php } ?>
                                        </div>
                                    </div>

                                     <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="text-input" class=" form-control-label">Phone </label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="phone" name="phone" placeholder="Enter Phone Number" class="form-control" value="<?php if(!empty($_POST['phone'])){ echo $phone ; } ?>">
                                            <?php if (!empty($phon_error)) { ?>
                                                <small class="text-danger "><?php echo "* $phon_error !!"; ?></small>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="email-input" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" value="<?php if(!empty($_POST['email'])){ echo $email ; } ?>">
                                            <?php if (!empty($email_error)) { ?>
                                                <small class="text-danger "><?php echo "* $email_error !!"; ?></small>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="password-input" class=" form-control-label">Password</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control" value="<?php if(!empty($_POST['password'])){ echo $pass ; } ?>">
                                            <?php if (!empty($pass_error)) { ?>
                                                <small class="text-danger "><?php echo "* $pass_error !!"; ?></small>
                                            <?php } ?>
                                        </div>
                                    </div>

            <?php $ho = @explode(',',$edu); ?>

                                    
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Education</label>
                                        </div>
                                        <div class="col col-md-8">
                                            <div class="form-check-inline form-check">
                                                    <input type="checkbox" name="edu[]" value="10th" <?php if(isset($edu)){ if(in_array('10th',$ho)){ echo "checked"; } } ?> class="form-check-input">
                                                <label for="inline-checkbox1" class="form-check-label ">
                                                    10th 
                                                </label>
                                                    <input type="checkbox" name="edu[]" value="12th" <?php if(isset($edu)){ if(in_array('12th',$ho)){ echo "checked"; } } ?> class="form-check-input">
                                                <label for="inline-checkbox2" class="form-check-label ">
                                                    12th 
                                                </label>
                                                    <input type="checkbox" name="edu[]" value="graduate" <?php if(isset($edu)){ if(in_array('graduate',$ho)){ echo "checked"; } } ?> class="form-check-input">
                                                <label for="inline-checkbox3" class="form-check-label ">
                                                    Graduate
                                                </label>
                                            </div>
<pre><?php if (!empty($edu_error)) { ?><small class="text-danger "><?php echo " * $edu_error !!"; ?></small><?php } ?>
</pre>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-4"><label class=" form-control-label">Gender</label></div>
                                        <div class="col col-md-8">
                                            <div class="form-check-inline form-check">
                                                    <input type="radio" name="gender" value="male" class="form-check-input" <?php if (isset($gender)) { if($gender == 'male') {echo "checked"; }} ?>>
                                                <label for="inline-radio1" class="form-check-label ">
                                                    Male
                                                </label>
                                                    <input type="radio" name="gender" value="female" class="form-check-input" <?php if (isset($gender)) { if($gender == 'female') {echo "checked"; }} ?> >
                                                <label for="inline-radio2" class="form-check-label ">
                                                    Female
                                                </label>
                                            </div>
<pre><?php if (!empty($gender_error)) { ?><small class="text-danger "><?php echo "* $gender_error !!"; ?></small><?php } ?></pre>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="file-input" class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="file" id="image" name="image" class="form-control-file" <?php if(!empty($_FILES['image']['name'])){ echo $image ; } ?> >
                                        <?php if (!empty($image_error)) { ?>
                                                <small class="text-danger "><?php echo "* $image_error !!"; ?></small>
                                        <?php } ?>
                                    </div> 
                                        </div>
                                    
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Submit</button> 
                                <a class="btn btn-primary btn-sm" href="admin_login.php">Reset</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
