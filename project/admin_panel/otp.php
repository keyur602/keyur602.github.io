<?php
    include('dblink.php');
    session_start();

    $votp = $_SESSION['votp'];
    if (empty($_SESSION['votp'])) {
        header("location:logout.php");
    }
$erroes =" * You Enter Invalid OTP Or Next Time New OTP In Your Mail !! ";
    if (isset($_POST['Otp'])) 
    {
      $sotp=$_POST['otp'];
        if ($sotp == $votp) 
        {
            header("location:change_password.php");
        } 
        else 
        {
            
            $erroe =" * invalid Otp !! ";
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
<body class="bg-dark">

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.php">
                    <img class="align-content" src="images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form method="post">
                    <div class="form-group">
                        <label>Otp </label>
                        <input type="text" name="otp" class="form-control" placeholder="Otp">
                    </div>
                        <div class="alert alert-warning">
                            <?php echo $erroes ;?>
                        </div>
                    <?php if (isset($erroe)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $erroe ;?>
                        </div>
                    <?php } ?>
                    <progress value="0" max="60" id="progressBar"></progress>
                    <div id="countdown"></div>
                    <button type="submit" name="Otp" class="btn btn-success btn-flat m-b-30 m-t-30">Otp</button>
                    <!-- <div class="register-link m-t-15 text-center">
                        <p>Don't have account ? <a href="admin_login.php"> Sign Up Here</a></p>
                    </div> -->
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
<script>
var timeleft = 60;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    window.location='logout.php';
  }
  document.getElementById("progressBar").value = 60 - timeleft;
  timeleft -= 1;  
}, 1000);

// let redirectTimeout = setTimeout(() => {
//     window.location.href = "logout.php";
// }, 4000);

// // display the time left until the redirect
// setInterval(() => {
//     document.querySelector("#countdown").innerHTML = `Time left until redirect ${getTimeout(redirectTimeout)}`;
// },1);


// (function(){
//         window.activeCountdowns = [];
//         window.setCountdown = function (code, delay, callback, interval) {
//             var timeout = delay;
//             var timeoutId = setTimeout(function(){
//                 clearCountdown(timeoutId);
//                 return code();
//             }, delay);
//             window.activeCountdowns.push(timeoutId);
//             setTimeout(function countdown(){
//                 var key = window.activeCountdowns.indexOf(timeoutId);
//                 if (key < 0) return;
//                 timeout -= interval;
//                 setTimeout(countdown, interval);
//                 return callback(timeout);
//             }, interval);
//             return timeoutId;
//         };
//         window.clearCountdown = function (timeoutId) {
//             clearTimeout(timeoutId);
//             var key = window.activeCountdowns.indexOf(timeoutId);
//             if (key < 0) return;
//             window.activeCountdowns.splice(key, 1);
//         };
//     })();

//     //example
//     var t = setCountdown(function () {
//         console.log('done');
//     }, 15000, function (i) {
//         console.log(i / 1000);
//     }, 1000);

// function interpolate( start, end, pos ) {
//   return start + ( pos * (end - start) );
// }

// function animate( dom, interval, delay ) {

//       interval = interval || 1000;
//       delay    = delay    || 10;

//   var start    = Number(new Date());

//   if ( typeof dom === "string" ) {
//     dom = document.getElementById( dom );
//   }

//   function step() {

//     var now     = Number(new Date()),
//         elapsed = now - start,
//         pos     = elapsed / interval,
//         value   = ~~interpolate( 0, 500, pos ); // 0-500px (progress bar)

//     dom.style.width = value + "px";

//     if ( elapsed < interval )
//       setTimeout( step, delay );
//   }

//   setTimeout( step, delay );
// }

</script>